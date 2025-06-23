<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Classes;
use App\Models\Wishlist;
use App\Services\AddressService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Order\app\Models\Order;
use Modules\Subscription\app\Models\SubscriptionPlan;

class UserController extends Controller
{
    public function __construct(private AddressService $addressService)
    {
        $this->middleware('auth:web');
    }
    public function dashboard(): View
    {
        $user = auth('web')->user();
        $member = $user->member;
        $currentPlan = $member?->subscriptionHistory;

        $totalOrders = $user->orders()->count();
        $enrollmentCount = $user->workouts()->count();
        return view('website.user.dashboard', compact('member', 'currentPlan', 'totalOrders', 'enrollmentCount'));
    }

    public function editProfile(): View
    {
        $member = auth('web')->user()->member;
        return view('website.user.edit-profile', compact('member'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = auth("web")->user();

        $member = $user->member;

        if ($member) {
            $member->update([
                'gender' => $request->gender,
                'dob' => $request->dob ? now()->parse($request->dob) : null,
                'height' => $request->height,
                'weight' => $request->weight,
                'chest' => $request->chest,
                'blood_group' => $request->blood_group,
                'phone' => $request->phone,
                'emergency_contact' => $request->emergency_contact,
                'emergency_phone' => $request->emergency_phone,
                'emergency_relation' => $request->emergency_relation,
            ]);
        }

        $user->name = $request->name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        $notification = __('Profile updated successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return back()->with($notification);
    }

    public function address()
    {
        $addresses = Auth::user()->addresses;

        return view('website.user.address', compact('addresses'));
    }
    public function newAddress()
    {
        $states = $this->addressService->getStates();
        return view('website.user.new-address', compact('states'));
    }

    public function editAddress(string $id)
    {
        $address = Address::find($id);
        $states = $this->addressService->getStates();
        $cities = $this->addressService->getCities($address->state_id);
        return view('website.user.edit-address', compact('address', 'states', 'cities'));
    }

    public function deleteAddress(string $id)
    {
        $address = Address::find($id);

        if ($address) {
            $address->delete();
        }

        $notification = ['message' => __('Address deleted successfully'), 'alert-type' => 'success'];

        return back()->with($notification);
    }
    public function orders(): View
    {
        $user = Auth::user();

        $orders = $user->orders()->orderBy('id', 'desc')->paginate(20);
        return view('website.user.orders', compact('orders'));
    }

    public function orderDetails($id): View | RedirectResponse
    {
        $order = Order::where('order_id', $id)->first();

        if ($order) {
            return view('website.user.order-invoice', compact('order'));
        }

        $notification = ['message' => __('Order not found'), 'alert-type' => 'error'];
        return redirect()->back()->with($notification);
    }
    public function orderPrint($id): View
    {
        $order = Order::where('order_id', $id)->first();
        if (!$order) {
            $notification = ['message' => __('Order not found'), 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }
        return view('website.user.order-print', compact('order'));
    }
    public function wishlist(): View
    {
        $wishlists = auth('web')->user()->wishlists()->with('product')->paginate(20);
        return view('website.user.wishlist', compact('wishlists'));
    }

    public function wishlistStore(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
        ]);
        $wishlist = Wishlist::where('user_id', auth()->id())->where('product_id', $request->id)->first();
        if ($wishlist) {
            $notification = __('Product Already added');
            $notification = array('message' => $notification, 'alert' => 'warning');
            return response()->json($notification);
        }
        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $request->id,
        ]);
        $wishlist = auth('web')->user()->wishlists;

        $notification = __('Product added to wishlist');
        $notification = array('message' => $notification, 'alert' => 'success', 'wishlist' => $wishlist);
        return response()->json($notification);
    }
    public function wishlistRemove(string $id)
    {
        $wishlist = Wishlist::find($id);
        if ($wishlist) {
            $wishlist->delete();
        }
        $list = auth('web')->user()->wishlists;

        $notification = ['message' => __('Product removed from wishlist'), 'success' => true, 'wishlist' => $list];
        return response()->json($notification);
    }
    public function plan(): View
    {
        $plans = SubscriptionPlan::where('status', 1)->get();
        $member = auth('web')->user()->member;
        $currentPlan = $member?->subscriptionHistory;

        return view('website.user.plan', compact('plans', 'currentPlan'));
    }
    public function reviews(): View
    {
        return view('website.user.reviews');
    }
    public function changePassword(): View
    {
        return view('website.user.change-password');
    }
    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:4|confirmed',
        ]);

        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            // The passwords matches
            $notification = __("Your current password does not matches with the password.");
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        if (strcmp($request->current_password, $request->password) == 0) {
            // Current password and new password same
            $notification = __("New Password cannot be same as your current password.");
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        $notification = __("Password successfully changed!");
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function uploadUserAvatar(Request $request)
    {
        $user = Auth::guard('web')->user();
        if ($request->file('image')) {

            $old_image = $user->image;
            $image = file_upload($request->image, $old_image, 'uploads/custom-images/');

            $user->image = $image;
            $user->save();
        }

        $notification = __('Update Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function subscriptionHistory()
    {
        $subscriptionHistories = auth('web')?->user()->member?->subscriptions()->orderBy('id', 'desc')->paginate(20);
        return view('website.user.subscriptions', compact('subscriptionHistories'));
    }

    public function subscriptionDetails($id)
    {
        $subscriptionHistory = auth('web')->user()->member->subscriptions()->where('id', $id)->first();
        if (!$subscriptionHistory) {
            $notification = ['message' => __('Subscription not found'), 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }
        return view('website.user.subscription-invoice', compact('subscriptionHistory'));
    }

    public function subscriptionInvoice($id)
    {
        $subscriptionHistory = auth('web')->user()->member->subscriptions()->where('id', $id)->first();
        if (!$subscriptionHistory) {
            $notification = ['message' => __('Subscription not found'), 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }
        return view('website.user.subscription-invoice-print', compact('subscriptionHistory'));
    }

    public function workoutClass(): View
    {
        if (auth('web')->user()->user_type == 'trainer') {
            $classes = auth()->user()?->trainer?->workoutClasses()->whereDate('date', '>=', now())->orderBy('date', 'asc')->orderBy('start_at', 'asc')->paginate(20);
            return view('website.user.workout-class', compact('classes'));
        } else {
            abort(404);
        }
    }

    public function studentList(): View
    {
        $students = auth()->user()?->trainer->enrolledStudents()->paginate(20);

        return view('website.user.student-list', compact('students'));
    }

    public function workoutList(): View
    {
        $workouts = auth()->user()?->enrollments()->orderBy('id', 'desc')->paginate(20);

        return view('website.user.enrolled-workout', compact('workouts'));
    }


    public function workoutClassDetails($id)
    {
        $class = Classes::find($id);
        if (!$class) {
            $notification = ['message' => __('Class not found'), 'alert-type' => 'error'];
            return response()->json($notification);
        }
        $view = view('components.website.workout-class', compact('class'))->render();
        return response()->json([
            'success' => true,
            'data' => $view
        ]);
    }

    function updateWorkoutClass(Request $request, $id)
    {

        $class = Classes::find($id);
        if (!$class) {
            $notification = ['message' => __('Class not found'), 'alert-type' => 'error'];
            return back()->with($notification);
        }

        $classTranslation = $class->getTranslation(getSessionLanguage());

        $classTranslation->name = $request->name;

        $classTranslation->save();

        $class->date = now()->parse($request->date);
        $class->day = now()->parse($request->date)->format('l');
        $class->start_at = now()->parse($request->start_at);
        $class->end_at = now()->parse($request->end_at);
        $class->save();
        $notification = ['message' => __('Class status updated successfully'), 'alert-type' => 'success'];
        return back()->with($notification);
    }
}
