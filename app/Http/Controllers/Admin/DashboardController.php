<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Trainer;
use App\Models\User;
use App\Models\WorkoutEnrollment;
use Illuminate\Support\Facades\Artisan;
use Modules\Language\app\Models\Language;
use Modules\Order\app\Models\Order;
use Modules\Subscription\app\Models\SubscriptionHistory;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function dashboard()
    {

        checkAdminHasPermissionAndThrowException('dashboard.view');

        $totalEnrollments = WorkoutEnrollment::count();
        $activeSubscriptions = SubscriptionHistory::whereDate('end_date', '>', now())->count();
        $awards = Award::count();
        $services = Service::count();
        $trainers = Trainer::count();

        $last30DaysOrders = Order::where('order_status', '!=', 'pending')->orWhere('order_status', '!=', 'rejected')->orWhere('order_status', '!=', 'cancelled')->where('created_at', '>=', \Carbon\Carbon::now()->subDays(30))->count();

        $totalOrders = Order::where('order_status', '!=', 'pending')->orWhere('order_status', '!=', 'rejected')->orWhere('order_status', '!=', 'cancelled')->count();

        $totalCustomers = Order::select('user_id')->groupBy('user_id')->get()->count();
        $totalIncomes = Order::where('payment_status', 'success')->sum('total_amount');
        $data['recentOrders'] = Order::orderBy('id', 'desc')->take(5)->get();
        $data['latestCustomers'] = User::orderBy('id', 'desc')->take(5)->get();

        $data['subscriptionIncome'] = SubscriptionHistory::sum('total_amount');

        $data['orderIncome'] = Order::where('payment_status', 'success')
            ->selectRaw('SUM(order_amount + delivery_fee + tax - discount) as total_income')
            ->value('total_income');

        $data['enrollmentIncome'] = Payment::whereNotNull('enrollment_id')->where('payment_status', 'success')->sum('total_amount');


        return view('admin.dashboard', compact('data', 'last30DaysOrders', 'totalIncomes', 'totalCustomers', 'totalOrders', 'totalEnrollments', 'activeSubscriptions', 'awards', 'services', 'trainers'));
    }

    public function setLanguage()
    {
        $lang = Language::whereCode(request('code'))->first();

        if (session()->has('lang')) {
            session()->forget('lang');
            session()->forget('text_direction');
            Artisan::call('optimize:clear');
        }
        if ($lang) {
            session()->put('lang', $lang->code);
            session()->put('text_direction', $lang->direction);

            Artisan::call('optimize:clear');
            $notification = __('Language Changed Successfully');
            $notification = ['message' => $notification, 'alert-type' => 'success'];

            return redirect()->back()->with($notification);
        }

        Artisan::call('optimize:clear');

        session()->put('lang', config('app.locale'));

        $notification = __('Language Changed Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }
}
