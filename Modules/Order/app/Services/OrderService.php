<?php

namespace Modules\Order\app\Services;

use App\Models\Product;
use App\Models\User;
use App\Models\Variant;
use App\Traits\MailSenderTrait;
use Illuminate\Http\Request;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use Modules\GlobalSetting\app\Models\Setting;
use Modules\Order\app\Models\Order;
use Modules\Order\app\Models\OrderDetails;

class OrderService
{
    use MailSenderTrait;
    protected Order $order;
    protected OrderDetails $orderDetails;
    public function __construct(Order $order, OrderDetails $orderDetails)
    {
        $this->order = $order;
        $this->orderDetails = $orderDetails;
    }
    public function getOrders()
    {
        $orders = $this->order->with('user');
        if (request('keyword')) {
            $orders = $orders->where(function ($query) {
                $query->where('order_id', 'like', '%' . request('keyword') . '%')
                    ->orWhereHas('user', function ($q) {
                        $q->where('name', 'like', '%' . request('keyword') . '%');
                    });
            });
        }

        if (request('order_by')) {
            $orders = $orders->orderBy('id', request('order_by'));
        }


        return $orders;
    }

    public function getOrder($id): ?Order
    {
        return $this->order->where('order_id', $id)->first();
    }
    public function storeOrder(Request $request, $user, $cart, $placeFrom = 'web')
    {
        $currency = allCurrencies()->where('currency_code', session('payable_currency'))->first();
        $order = new Order();
        $order->order_id = substr(rand(0, time()), 0, 10);
        $order->user_id = $user != null ?  $user->id : null;
        $order->walk_in_customer = $user != null ?  0 : 1;
        $order->address_id = $placeFrom == 'web' ?  session('delivery_address') : $request->address_id;
        $order->billing_id = session('billing_address');
        $order->tax = $placeFrom == 'web' ? session('tax_amount') : $request->order_tax;
        $order->discount = $placeFrom == 'web' ? session('coupon_price') : $request->order_discount;
        $order->order_delivery_date = $request->order_delivery_date;
        $order->total_amount = $placeFrom == 'web' ? session('total_amount') : $request->order_total_fee;
        $order->currency_rate = $currency->currency_rate;
        $order->currency_name = $currency->currency_name;
        $order->currency_icon = $currency->currency_icon;
        $order->order_amount = $placeFrom == 'web' ? session('sub_total') :  $request->order_sub_total;
        $order->payment_details = $placeFrom == 'pos' ?? $request->order_payment_details;
        $order->payment_method = $placeFrom == 'web' ? $request->payment_method :  $request->order_payment_method;
        $order->delivery_method = $placeFrom == 'web' ? (session('delivery_address') ? 1 : 2) :  $request->order_delivery_method;

        if ($placeFrom == 'pos') {
            $order->payment_status = $order->payment_method == 'cod' ? 'pending' : 'success';
            $order->order_status = 'success';
            $order->delivery_status = 2;
            $order->created_by = auth('admin')->user()->id;
            $order->delivery_fee = $request->order_delivery_fee;
        } else {
            $order->payment_status = 'pending';
            $order->order_status = 'pending';
            $order->delivery_status = 1;
            $order->transaction_id = $request->invoice_id;
            $order->invoice_id = $request->invoice_id;
            $order->delivery_fee = session('delivery_fee');
        }


        if ($order->walk_in_customer == 1 && $request->order_delivery_method == 1) {
            $address = session('delivery_address');
            $order->address = $address['address'];
            $order->phone = $address['phone'];
            $order->customer_name = $address['first_name'] . ' ' . $address['last_name'];
        }

        if ($order->walk_in_customer == 1 && $request->order_delivery_method == 2) {
            $order->delivery_status = 5;
        }

        $order->save();

        if ($user != null) {
            $this->sendOrderSuccessMail($user, $order,);
        }
        foreach ($cart as $item) {
            $variant = isset($item['variant']) ?  Variant::where('sku', $item['sku'])->first() : null;
            $orderDetails = new OrderDetails();
            $orderDetails->order_id = $order->id;
            $orderDetails->product_id = $item['id'];
            $orderDetails->product_name = $item['name'];
            $orderDetails->product_sku = $item['sku'];
            $orderDetails->variant_id = $variant != null ? $variant->id : null;
            $orderDetails->price = $item['price'];
            $orderDetails->quantity = $item['qty'];
            $orderDetails->total = $item['sub_total'];
            $orderDetails->attributes = $variant != null ? $item['variant']['attribute'] : null;
            $orderDetails->status = 1;
            $orderDetails->save();


            // update product qty
            $product = Product::where('id', $item['id'])->first();
            $product->stock = remove_comma($product->stock) - $item['qty'];
            $product->save();
        }

        return $order;
    }

    public function orderStatus(Request $request, Order $order)
    {

        $order->delivery_status = $request->status;

        $order->payment_status = $request->payment;

        if ($request->status == 5) {
            $order->order_status = 'success';

            if ($order->payment_status == 'pending') {
                $order->payment_status = 'success';
            }
        }
        if ($request->status == 6) {
            $order->order_status = 'cancelled';
            $order->payment_status = 'rejected';
            $order->delivery_cancel_note = $request->cancel_note;
        }
        $order->save();
    }

    public function destroy(Order $order)
    {

        $orderProducts = $order->orderDetails;
        foreach ($orderProducts as $orderProduct) {
            $orderProduct->delete();
        }
        $order->delete();
    }

    public function sendOrderSuccessMail($user, $order)
    {
        $template = EmailTemplate::where('name', 'Order Successfully')->first();
        $payment_status = $order->payment_status == 'success' ? 'Paid' : 'Unpaid';
        $subject = $template->subject;
        $message = $template->message;
        $message = str_replace('{{user_name}}', $user->name, $message);
        $message = str_replace('{{total_amount}}', currency($order->total_amount), $message);
        $message = str_replace('{{payment_method}}', $order->payment_method, $message);
        $message = str_replace('{{payment_status}}', $payment_status, $message);
        $message = str_replace('{{order_status}}', 'Pending', $message);
        $message = str_replace('{{order_date}}', $order->created_at->format('d F, Y'), $message);

        $setting = cache('setting');


        $adminTemplate = EmailTemplate::where('name', 'Admin Order Confirmation')->first();
        $adminSubject = $adminTemplate->subject;
        $adminMessage = $adminTemplate->message;
        $adminMessage = str_replace('{{total_amount}}', currency($order->total_amount), $adminMessage);
        $adminMessage = str_replace('{{payment_method}}', $order->payment_method, $adminMessage);
        $adminMessage = str_replace('{{payment_status}}', $payment_status, $adminMessage);
        $adminMessage = str_replace('{{order_status}}', 'Pending', $adminMessage);
        $adminMessage = str_replace('{{order_date}}', $order->created_at->format('d F, Y'), $adminMessage);



        $admin = (object)['subject' => $adminSubject, 'description' => $adminMessage, 'mail' => $setting?->contact_message_receiver_mail];

        $this->sendOrderSuccessMailFromTrait($subject, $message, $user, $admin);
    }
}
