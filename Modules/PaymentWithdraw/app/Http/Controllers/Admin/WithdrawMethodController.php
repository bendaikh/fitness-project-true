<?php

namespace Modules\PaymentWithdraw\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\PaymentWithdraw\app\Jobs\WithdrawApprovalJob;
use Modules\PaymentWithdraw\app\Models\WithdrawMethod;
use Modules\PaymentWithdraw\app\Models\WithdrawRequest;

class WithdrawMethodController extends Controller
{
    public function index(Request $request)
    {

        $query = WithdrawMethod::query();

        $query->when($request->filled('keyword'), function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('description', 'like', '%' . $request->keyword . '%')
                ->orWhere('min_amount', 'like', '%' . $request->keyword . '%')
                ->orWhere('max_amount', 'like', '%' . $request->keyword . '%')
                ->orWhere('withdraw_charge', 'like', '%' . $request->keyword . '%');
        });
        $query->when($request->filled('status'), function ($q) use ($request) {
            $q->where('status', $request->status);
        });

        $query->when($request->filled('user'), function ($q) use ($request) {
            $q->where('user_id', $request->user);
        });

        $query->when($request->filled('order_by'), function ($q) use ($request) {
            $q->orderBy('id', $request->order_by == 1 ? 'asc' : 'desc');
        });

        if ($request->filled('par-page')) {
            $methods = $request->get('par-page') == 'all' ? $query->get() : $query->paginate($request->get('par-page'))->withQueryString();
        } else {
            $methods = $query->paginate()->withQueryString();
        }

        // $methods = WithdrawMethod::all();

        return view('paymentwithdraw::admin.method.index', compact('methods'));
    }

    public function create()
    {
        return view('paymentwithdraw::admin.method.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'            => 'required',
            'minimum_amount'  => 'required|numeric',
            'maximum_amount'  => 'required|numeric',
            'withdraw_charge' => 'required|numeric',
            'description'     => 'required',
        ];
        $customMessages = [
            'name.required'            => __('Name is required'),
            'minimum_amount.required'  => __('Min amount is required'),
            'maximum_amount.required'  => __('Max amount is required'),
            'withdraw_charge.required' => __('Charge is required'),
            'description.required'     => __('Description is required'),
        ];
        $request->validate($rules, $customMessages);

        $method = new WithdrawMethod();
        $method->name = $request->name;
        $method->min_amount = $request->minimum_amount;
        $method->max_amount = $request->maximum_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->status = $request->status;
        $method->save();

        $notification = __('Create Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->route('admin.withdraw-method.index')->with($notification);
    }

    public function edit($id)
    {
        $method = WithdrawMethod::find($id);

        return view('paymentwithdraw::admin.method.edit', compact('method'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'name'            => 'required',
            'minimum_amount'  => 'required|numeric',
            'maximum_amount'  => 'required|numeric',
            'withdraw_charge' => 'required|numeric',
            'description'     => 'required',
        ];
        $customMessages = [
            'name.required'            => __('Name is required'),
            'minimum_amount.required'  => __('Min amount is required'),
            'maximum_amount.required'  => __('Max amount is required'),
            'withdraw_charge.required' => __('Charge is required'),
            'description.required'     => __('Description is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $method = WithdrawMethod::find($id);
        $method->name = $request->name;
        $method->min_amount = $request->minimum_amount;
        $method->max_amount = $request->maximum_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->status = $request->status;
        $method->save();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->route('admin.withdraw-method.index')->with($notification);
    }

    public function destroy($id)
    {

        $method = WithdrawMethod::find($id);
        $method->delete();

        $notification = __('Delete Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->route('admin.withdraw-method.index')->with($notification);
    }

    public function withdraw_list(Request $request)
    {

        $query = WithdrawRequest::query();
        $query->with('user');

        $query->when($request->filled('keyword'), function ($q) use ($request) {
            $q->where('method', 'like', '%' . $request->keyword . '%')
                ->orWhere('total_amount', 'like', '%' . $request->keyword . '%')
                ->orWhere('withdraw_amount', 'like', '%' . $request->keyword . '%')
                ->orWhere('withdraw_charge', 'like', '%' . $request->keyword . '%')
                ->orWhere('account_info', 'like', '%' . $request->keyword . '%');
        });

        $query->when($request->filled('status'), function ($q) use ($request) {
            $q->where('status', $request->status);
        });

        $query->when($request->filled('user'), function ($q) use ($request) {
            $q->where('user_id', $request->user);
        });

        $query->when($request->filled('order_by'), function ($q) use ($request) {
            $q->orderBy('id', $request->order_by == 1 ? 'asc' : 'desc');
        });

        if ($request->filled('par-page')) {
            $withdraws = $request->get('par-page') == 'all' ? $query->get() : $query->paginate($request->get('par-page'))->withQueryString();
        } else {
            $withdraws = $query->paginate()->withQueryString();
        }

        $title = __('Withdraw request');
        $users = User::select('name', 'id')->get();

        return view('paymentwithdraw::admin.index', compact('withdraws', 'title', 'users'));
    }

    public function pending_withdraw_list(Request $request)
    {
        $query = WithdrawRequest::query();
        $query->with('user')->where('status', 'pending');

        $query->when($request->filled('keyword'), function ($q) use ($request) {
            $q->where('method', 'like', '%' . $request->keyword . '%')
                ->orWhere('total_amount', 'like', '%' . $request->keyword . '%')
                ->orWhere('withdraw_amount', 'like', '%' . $request->keyword . '%')
                ->orWhere('withdraw_charge', 'like', '%' . $request->keyword . '%')
                ->orWhere('account_info', 'like', '%' . $request->keyword . '%');
        });

        $query->when($request->filled('user'), function ($q) use ($request) {
            $q->where('user_id', $request->user);
        });

        $query->when($request->filled('order_by'), function ($q) use ($request) {
            $q->orderBy('id', $request->order_by == 1 ? 'asc' : 'desc');
        });

        if ($request->filled('par-page')) {
            $withdraws = $request->get('par-page') == 'all' ? $query->get() : $query->paginate($request->get('par-page'))->withQueryString();
        } else {
            $withdraws = $query->paginate()->withQueryString();
        }

        $title = __('Pendig withdraw');
        $users = User::select('name', 'id')->get();

        return view('paymentwithdraw::admin.index', compact('withdraws', 'title', 'users'));
    }

    public function show_withdraw($id)
    {

        $withdraw = WithdrawRequest::find($id);

        return view('paymentwithdraw::admin.show', compact('withdraw'));
    }

    public function destroy_withdraw($id)
    {

        $withdraw = WithdrawRequest::findOrFail($id);
        $withdraw->delete();

        $notification = __('Delete Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->route('admin.withdraw-list')->with($notification);
    }

    public function approved_withdraw($id)
    {

        $withdraw = WithdrawRequest::find($id);
        $withdraw->status = 'approved';
        $withdraw->approved_date = date('Y-m-d');
        $withdraw->save();

        $user = User::findOrFail($withdraw->user_id);
        dispatch(new WithdrawApprovalJob($user));

        $notification = __('Withdraw request approval successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->route('admin.withdraw-list')->with($notification);
    }
}
