<?php

namespace Modules\Order\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\MailSenderTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Order\app\Models\Order;
use Modules\Order\app\Services\OrderService;

class OrderController extends Controller
{
    use MailSenderTrait;
    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->middleware(['auth', 'verified']);
        $this->orderService = $orderService;
    }
    public function index()
    {
        checkAdminHasPermissionAndThrowException('order.history');
        $orders = $this->orderService->getOrders()->latest();
        if (request('par-page')) {
            $orders = $orders->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $orders = $orders->paginate(20);
        }

        $orders->appends(request()->query());
        $title = __('Order History');

        return view('order::index', ['orders' => $orders, 'title' => $title]);
    }

    public function pending_order()
    {
        checkAdminHasPermissionAndThrowException('order.history');
        $orders = $this->orderService->getOrders()->where('delivery_status', 1)->latest();
        if (request('par-page')) {
            $orders = $orders->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $orders = $orders->paginate(20);
        }
        $orders->appends(request()->query());
        $title = __('Pending Order');

        return view('order::index', ['orders' => $orders, 'title' => $title]);
    }

    public function progressOrder()
    {
        checkAdminHasPermissionAndThrowException('order.history');
        $orders = $this->orderService->getOrders()->where('delivery_status', 3)->latest();
        if (request('par-page')) {
            $orders = $orders->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $orders = $orders->paginate(20);
        }
        $orders->appends(request()->query());
        $title = __('Progress Orders');
        return view('order::index', compact('orders', 'title'));
    }
    public function onTheWay()
    {
        checkAdminHasPermissionAndThrowException('order.history');
        $orders = $this->orderService->getOrders()->where('delivery_status', 4)->latest();
        if (request('par-page')) {
            $orders = $orders->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $orders = $orders->paginate(20);
        }
        $orders->appends(request()->query());
        $title = __('On The Way');
        return view('order::index', compact('orders', 'title'));
    }
    public function deliveredOrder()
    {
        checkAdminHasPermissionAndThrowException('order.history');
        $orders = $this->orderService->getOrders()->where('delivery_status', 5)->latest();
        if (request('par-page')) {
            $orders = $orders->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $orders = $orders->paginate(20);
        }
        $orders->appends(request()->query());
        $title = __('Delivered Orders');
        return view('order::index', compact('orders', 'title'));
    }

    public function declinedOrder()
    {
        checkAdminHasPermissionAndThrowException('order.history');
        $orders = $this->orderService->getOrders()->where('delivery_status', 6)->latest();
        if (request('par-page')) {
            $orders = $orders->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $orders = $orders->paginate(20);
        }
        $orders->appends(request()->query());
        $title = __('Rejected Orders');
        return view('order::index', compact('orders', 'title'));
    }

    public function cashOnDelivery()
    {
        checkAdminHasPermissionAndThrowException('order.history');
        $orders = $this->orderService->getOrders()->where('payment_method', 'cod')->latest();
        if (request('par-page')) {
            $orders = $orders->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $orders = $orders->paginate(20);
        }
        $orders->appends(request()->query());
        $title = __('Cash On Delivery');
        return view('order::index', compact('orders', 'title'));
    }

    public function show($id)
    {
        checkAdminHasPermissionAndThrowException('order.view');
        $order = Order::with('orderDetails', 'user')->find($id);
        return view('order::show-order', compact('order'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('order.update');
        $rules = [
            'order_status' => 'required',
            'payment_status' => 'required',
        ];
        $this->validate($request, $rules);

        $order = Order::find($id);
        if ($request->order_status == 0) {
            $order->order_status = 0;
            $order->save();
        } else if ($request->order_status == 1) {
            $order->order_status = 1;
            $order->order_approval_date = date('Y-m-d');
            $order->save();
        } else if ($request->order_status == 2) {
            $order->order_status = 2;
            $order->order_delivered_date = date('Y-m-d');
            $order->save();
        } else if ($request->order_status == 3) {
            $order->order_status = 3;
            $order->order_completed_date = date('Y-m-d');
            $order->save();
        } else if ($request->order_status == 4) {
            $order->order_status = 4;
            $order->order_declined_date = date('Y-m-d');
            $order->save();
        }

        if ($request->payment_status == 0) {
            $order->payment_status = 0;
            $order->save();
        } elseif ($request->payment_status == 1) {
            $order->payment_status = 1;
            $order->payment_approval_date = date('Y-m-d');
            $order->save();
        }

        $notification = __('Order Status Updated successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function orderStatus(Request $request)
    {
        checkAdminHasPermissionAndThrowException('order.update');
        $request->validate([
            'status' => 'required',
            'payment' => 'required',
        ]);

        try {
            $order = $this->orderService->getOrder($request->orderId);
            $this->orderService->orderStatus($request, $order);
            return response()->json(['success' => 'Order Status Updated Successfully']);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return response()->json(['error' => 'Order Status Not Updated']);
        }
    }


    public function destroy($id)
    {
        checkAdminHasPermissionAndThrowException('order.delete');
        DB::beginTransaction();
        try {
            $order = $this->orderService->getOrder($id);
            $this->orderService->destroy($order);
            DB::commit();
            $notification = __('Delete successfully');
            $notification = array('message' => $notification, 'alert-type' => 'success');
            return redirect()->route('admin.orders')->with($notification);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollback();
            return back()->with(array('message' => __('Something Went Wrong'), 'alert-type' => 'error'));
        }
    }
    public function pending_payment()
    {
        checkAdminHasPermissionAndThrowException('order.payment.history');
        $orders = $this->orderService->getOrders()->where('payment_status', 'pending')->latest()->paginate(20);
        $title = __('Pending Payment');
        return view('order::index', compact('orders', 'title'));
    }

    public function rejected_payment()
    {
        checkAdminHasPermissionAndThrowException('order.payment.history');
        $orders = $this->orderService->getOrders()->where('payment_status', 'rejected')->latest()->paginate(20);
        $title = __('Rejected Payment');
        return view('order::index', compact('orders', 'title'));
    }
    public function order_payment_reject(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('order.payment.update');
        $request->validate([
            'subject' => 'required',
            'description' => 'required',
        ], [
            'subject.required' => __('Subject is required'),
            'description.required' => __('Description is required'),
        ]);

        $order = Order::findOrFail($id);
        $order->payment_status = 'rejected';
        $order->save();

        $user = User::findOrFail($order->user_id);

        $this->sendPaymentRejectMailFromTrait($request->subject, $request->description, $user);

        $notification = __('Payment rejected successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function order_payment_approved(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('order.payment.update');
        $request->validate([
            'subject' => 'required',
            'description' => 'required',
        ], [
            'subject.required' => __('Subject is required'),
            'description.required' => __('Description is required'),
        ]);

        $order = Order::findOrFail($id);
        $order->payment_status = 'success';
        $order->save();

        $user = User::findOrFail($order->user_id);

        $this->sendPaymentRejectMailFromTrait($request->subject, $request->description, $user);

        $notification = __('Payment approved successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }
}
