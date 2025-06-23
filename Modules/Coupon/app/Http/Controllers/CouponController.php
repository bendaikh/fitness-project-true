<?php

namespace Modules\Coupon\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Coupon\app\Models\Coupon;
use Modules\Coupon\app\Models\CouponHistory;

class CouponController extends Controller
{
    public function index()
    {
        checkAdminHasPermissionAndThrowException('coupon.view');
        $coupons = Coupon::where(['author_id' => 0])->latest()->paginate(20);

        return view('coupon::index', compact('coupons'));
    }

    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('coupon.store');
        $rules = [
            'coupon_code' => 'required|unique:coupons',
            'discount' => 'required|numeric',
            'offer_type' => 'required|numeric',
            'max_quantity' => 'required|numeric',
            'expired_date' => 'required',
        ];
        $customMessages = [
            'coupon_code.required' => __('Coupon code is required'),
            'coupon_code.unique' => __('Coupon already exist'),
            'discount.required' => __('Discount is required'),
            'offer_type.required' => __('Offer type is required'),
            'max_quantity.required' => __('Max quantity is required'),
            'expired_date.required' => __('Expired date is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $roles = auth()->user()->roles->pluck('name')->toArray();
        $role = in_array('seller', $roles);

        $coupon = new Coupon();
        $coupon->author_id = $role ? auth()->user()->id :  0;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->discount = $request->discount;
        $coupon->offer_type = $request->offer_type;
        $coupon->min_price = $request->min_price;
        $coupon->max_quantity = $request->max_quantity;
        $coupon->expired_date = $request->expired_date;
        $coupon->status = $request->status;
        $coupon->save();

        $notification = __('Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('coupon.update');
        $rules = [
            'coupon_code' => 'required|unique:coupons,coupon_code,' . $id,
            'discount' => 'required|numeric',
            'offer_type' => 'required|numeric',
            'max_quantity' => 'required|numeric',
            'expired_date' => 'required',
        ];
        $customMessages = [
            'coupon_code.required' => __('Coupon code is required'),
            'coupon_code.unique' => __('Coupon already exist'),
            'discount.required' => __('Discount is required'),
            'offer_type.required' => __('Offer type is required'),
            'max_quantity.required' => __('Max quantity is required'),
            'expired_date.required' => __('Expired date is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $coupon = Coupon::find($id);
        $coupon->coupon_code = $request->coupon_code;
        $coupon->discount = $request->discount;
        $coupon->offer_type = $request->offer_type;
        $coupon->min_price = $request->min_price;
        $coupon->max_quantity = $request->max_quantity;
        $coupon->expired_date = $request->expired_date;
        $coupon->status = $request->status;
        $coupon->save();

        $notification = __('Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        checkAdminHasPermissionAndThrowException('coupon.delete');
        $coupon = Coupon::find($id);
        $coupon->delete();

        $notification = __('Deleted Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function coupon_history()
    {
        checkAdminHasPermissionAndThrowException('coupon.history');
        $coupon_histories = CouponHistory::where(['author_id' => 0])->latest()->paginate(20);

        return view('coupon::history', ['coupon_histories' => $coupon_histories]);
    }

    public function status($id)
    {
        checkAdminHasPermissionAndThrowException('coupon.update');
        $coupon = Coupon::find($id);
        $coupon->status = $coupon->status == 'active' ? 'inactive' : 'active';
        $coupon->save();

        return response()->json(['success' => true, 'message' => __('Status updated successfully')]);
    }
}
