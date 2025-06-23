<?php

namespace Modules\Subscription\app\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Enums\SubscriptionPlanType;
use App\Http\Controllers\Controller;
use App\Models\SubscriptionOption;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Modules\Subscription\app\Models\SubscriptionPlan;

class SubscriptionPlanController extends Controller
{
    use RedirectHelperTrait;
    public function index()
    {

        checkAdminHasPermissionAndThrowException('subscription.view');
        $plans = SubscriptionPlan::orderBy('serial', 'asc')->get();

        return view('subscription::admin.subscription_list', compact('plans'));
    }

    public function create()
    {
        checkAdminHasPermissionAndThrowException('subscription.create');
        $subscriptionTypes = SubscriptionPlanType::getAll();
        return view('subscription::admin.subscription_create', compact('subscriptionTypes'));
    }

    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('subscription.store');
        $request->validate([
            'plan_name' => 'required',
            'plan_price' => 'required|numeric',
            'expiration_date' => 'required',
            'serial' => 'required',
            'status' => 'required',
        ], [
            'plan_name.required' => __('Plan name is required'),
            'plan_price.required' => __('Plan price is required'),
            'plan_price.numeric' => __('Plan price should be numeric'),
            'expiration_date.required' => __('Expiration date is required'),
            'serial.required' => __('Serial is required'),
        ]);

        $plan = new SubscriptionPlan();
        $plan->plan_name = $request->plan_name;
        $plan->plan_price = $request->plan_price;
        $plan->yearly_price = $request->yearly_price;
        $plan->free_trial = $request->free_trial;
        $plan->expiration_date = $request->expiration_date;
        $plan->serial = $request->serial;
        $plan->status = $request->status;
        $plan->save();

        $notification = __('Create Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        cache()->forget('subscription_plans');
        return redirect()->route('admin.subscription-plan.edit', $plan->id)->with($notification);
    }

    public function show($id)
    {
        return view('subscription::show');
    }

    public function edit($id)
    {
        checkAdminHasPermissionAndThrowException('subscription.edit');

        $plan = SubscriptionPlan::find($id);
        $subscriptionTypes = SubscriptionPlanType::getAll();
        return view('subscription::admin.subscription_edit', compact('plan', 'subscriptionTypes'));
    }

    public function update(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('subscription.update');
        $request->validate([
            'plan_name' => 'required',
            'plan_price' => 'required|numeric',
            'expiration_date' => 'required',
            'serial' => 'required',
            'status' => 'required',
        ], [
            'plan_name.required' => __('Plan name is required'),
            'plan_price.required' => __('Plan price is required'),
            'plan_price.numeric' => __('Plan price should be numeric'),
            'expiration_date.required' => __('Expiration date is required'),
            'serial.required' => __('Serial is required'),
        ]);

        $plan = SubscriptionPlan::find($id);
        $plan->plan_name = $request->plan_name;
        $plan->plan_price = $request->plan_price;
        $plan->yearly_price = $request->yearly_price;
        $plan->free_trial = $request->free_trial;
        $plan->expiration_date = $request->expiration_date;
        $plan->serial = $request->serial;
        $plan->status = $request->status;

        $plan->save();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        cache()->forget('subscription_plans');

        return redirect()->route('admin.subscription-plan.index')->with($notification);
    }

    public function destroy($id)
    {
        checkAdminHasPermissionAndThrowException('subscription.delete');
        $plan = SubscriptionPlan::find($id);
        $plan->delete();

        $notification = __('Delete Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        cache()->forget('subscription_plans');
        return redirect()->route('admin.subscription-plan.index')->with($notification);
    }

    public function plan_option($id)
    {
        checkAdminHasPermissionAndThrowException('subscription.option.view');
        $planOption = SubscriptionOption::where('subscription_id', $id)->get();
        $plan = SubscriptionPlan::find($id);
        return view('subscription::admin.plan_option', compact('planOption', 'plan'));
    }

    public function store_plan_option(Request $request)
    {

        checkAdminHasPermissionAndThrowException('subscription.option.store');
        $request->validate([
            'name' => 'required',
            'plan_id' => 'required',
        ], [
            'name.required' => __('Option name is required'),
            'plan_id.required' => __('Subscription id is required'),
        ]);

        $planOption = SubscriptionOption::create([
            'subscription_id' => $request->plan_id,
            'name' => $request->name,
        ]);
        if ($planOption) {
            $notification = __('Create Successfully');
            $notification = ['message' => $notification, 'alert-type' => 'success'];
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.plan-option', ['id' => $request->plan_id], $notification);
        } else {
            $notification = __('Create Failed');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.plan-option', ['id' => $request->plan_id], $notification);
        }
    }
    public function update_plan_option(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('subscription.option.update');
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => __('Option name is required'),
        ]);

        $planOption = SubscriptionOption::find($id);
        $planOption->name = $request->name;
        $planOption->save();
        if ($planOption) {
            $notification = __('Update Successfully');
            $notification = ['message' => $notification, 'alert-type' => 'success'];
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.plan-option', ['id' => $planOption->subscription->id], $notification);
        } else {
            $notification = __('Update Failed');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.plan-option', ['id' => $planOption->subscription->id], $notification);
        }
    }

    public function delete_plan_option($id)
    {
        checkAdminHasPermissionAndThrowException('subscription.option.delete');
        $planOption = SubscriptionOption::find($id);
        $planOption->delete();
        if ($planOption) {
            $notification = __('Delete Successfully');
            $notification = ['message' => $notification, 'alert-type' => 'success'];
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.plan-option', ['id' => $planOption->subscription->id], $notification);
        } else {
            $notification = __('Delete Failed');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.plan-option', ['id' => $planOption->subscription->id], $notification);
        }
    }

    public function status($id)
    {
        checkAdminHasPermissionAndThrowException('subscription.update');
        $plan = SubscriptionPlan::find($id);
        $plan->status = $plan->status == 1 ? 0 : 1;
        $plan->save();
        return response()->json(['success' => true, 'message' => __('Status change successfully')]);
    }
}
