<?php

namespace Modules\Wallet\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Wallet\app\Jobs\WalletPaymentApprovalJob;
use Modules\Wallet\app\Jobs\WalletPaymentRejectJob;
use Modules\Wallet\app\Models\WalletHistory;

class WalletController extends Controller
{
    public function index()
    {
        $wallet_histories = WalletHistory::latest()->get();

        $title = __('Wallet History');

        return view('wallet::admin.index', ['wallet_histories' => $wallet_histories, 'title' => $title]);
    }

    public function pending_wallet_payment()
    {
        $wallet_histories = WalletHistory::where('payment_status', 'pending')->latest()->get();

        $title = __('Pending Wallet Payment');

        return view('wallet::admin.index', ['wallet_histories' => $wallet_histories, 'title' => $title]);
    }

    public function rejected_wallet_payment()
    {
        $wallet_histories = WalletHistory::where('payment_status', 'rejected')->latest()->get();

        $title = __('Pending Wallet Payment');

        return view('wallet::admin.index', ['wallet_histories' => $wallet_histories, 'title' => $title]);
    }

    public function show($id)
    {
        $wallet_history = WalletHistory::findOrFail($id);

        return view('wallet::admin.show', ['wallet_history' => $wallet_history]);
    }

    public function destroy($id)
    {
        $wallet_history = WalletHistory::findOrFail($id);
        $wallet_history->delete();

        $notification = __('Payment delete successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->route('admin.wallet-history')->with($notification);
    }

    public function rejected_wallet_request(Request $request, $id)
    {

        $request->validate([
            'subject' => 'required',
            'description' => 'required',
        ], [
            'subject.required' => __('Subject is required'),
            'description.required' => __('Description is required'),
        ]);

        $wallet_history = WalletHistory::findOrFail($id);
        $wallet_history->payment_status = 'rejected';
        $wallet_history->save();

        $user = User::findOrFail($wallet_history->user_id);
        dispatch(new WalletPaymentRejectJob($request->subject, $request->description, $user));

        $notification = __('Wallet request rejected successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function approved_wallet_request(Request $request, $id)
    {

        $wallet_history = WalletHistory::findOrFail($id);
        $wallet_history->payment_status = 'success';
        $wallet_history->save();

        $user = User::findOrFail($wallet_history->user_id);

        $wallet_balance = $user->wallet_balance;
        $wallet_balance += $wallet_history->amount;
        $user->wallet_balance = $wallet_balance;
        $user->save();

        dispatch(new WalletPaymentApprovalJob($user));

        $notification = __('Wallet payment approval successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }
}
