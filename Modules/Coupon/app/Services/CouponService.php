<?php


namespace Modules\Coupon\app\Services;

use Illuminate\Http\Request;
use Modules\Coupon\app\Models\Coupon;

class CouponService
{
    public function coupon(Request $request)
    {
        $rules = [
            'coupon' => 'required',
            'author_id' => 'required',
        ];
        $customMessages = [
            'coupon.required' => __('Coupon is required'),
            'author_id.required' => __('Author id is required'),
        ];

        $request->validate($rules, $customMessages);

        $coupon = Coupon::where(['coupon_code' => $request->coupon, 'status' => 'active'])->first();

        if ($request->coupon == null) {
            $notification = __('Coupon Field is required');
            return response()->json(['message' => $notification], 403);
        }

        $coupon = Coupon::where(['coupon_code' => $request->coupon, 'status' => 'active'])->first();

        if (!$coupon) {
            $notification = __('Invalid Code');
            return response()->json(['message' => $notification], 403);
        }
        if ($coupon->expired_date < date('Y-m-d')) {
            $notification = __('Coupon already expired');
            return response()->json(['message' => $notification], 403);
        }

        if ($coupon->apply_qty >=  $coupon->max_quantity) {
            $notification = __('Sorry! You can not apply this coupon');
            return response()->json(['message' => $notification], 403);
        }
        if ($coupon->min_price && $request->amount < $coupon->min_price) {
            $notification = __("Minimum purchase amount should be " . $coupon->min_price);
            return response()->json(['message' => $notification], 403);
        }

        return $coupon;
    }
}
