<?php

namespace Modules\GlobalSetting\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use Modules\GlobalSetting\app\Models\Setting;

class EmailSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function email_config()
    {
        checkAdminHasPermissionAndThrowException('setting.view');
        $templates = EmailTemplate::all();

        return view('globalsetting::email.email_config', compact('templates'));
    }

    public function update_email_config(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $request->validate([
            'mail_sender_name'  => 'required',
            'mail_host'         => 'required',
            'mail_sender_email' => 'required',
            'mail_username'     => 'required',
            'mail_password'     => 'required',
            'mail_port'         => 'required',
            'mail_encryption'   => 'required',
        ], [
            'mail_sender_name.required'  => __('Sender name is required'),
            'mail_host.required'         => __('Mail host is required'),
            'mail_sender_email.required' => __('Email is required'),
            'mail_username.required'     => __('Smtp username is required'),
            'mail_password.unique'       => __('Smtp password is required'),
            'mail_port.required'         => __('Mail port is required'),
            'mail_encryption.required'   => __('Mail encryption is required'),
        ]);

        Setting::where('key', 'mail_sender_name')->update(['value' => $request->mail_sender_name]);
        Setting::where('key', 'mail_host')->update(['value' => $request->mail_host]);
        Setting::where('key', 'mail_sender_email')->update(['value' => $request->mail_sender_email]);
        Setting::where('key', 'mail_username')->update(['value' => $request->mail_username]);
        Setting::where('key', 'mail_password')->update(['value' => $request->mail_password]);
        Setting::where('key', 'mail_port')->update(['value' => $request->mail_port]);
        Setting::where('key', 'mail_encryption')->update(['value' => $request->mail_encryption]);

        $setting_config = new GlobalSettingController();
        $setting_config->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function edit_email_template($id)
    {
        checkAdminHasPermissionAndThrowException('setting.view');
        $template = EmailTemplate::where('id', $id)->first();
        if ($template->name == 'password_reset') {
            return view('globalsetting::email.template.password_reset', compact('template'));
        } elseif ($template->name == 'contact_mail') {
            return view('globalsetting::email.template.contact_mail', compact('template'));
        } elseif ($template->name == 'subscribe_notification') {
            return view('globalsetting::email.template.subscribe_notification', compact('template'));
        } elseif ($template->name == 'user_verification') {
            return view('globalsetting::email.template.user_verification', compact('template'));
        } elseif ($template->name == 'approved_refund') {
            return view('globalsetting::email.template.refund_approval', compact('template'));
        } elseif ($template->name == 'new_refund') {
            return view('globalsetting::email.template.new_refund', compact('template'));
        } elseif ($template->name == 'pending_wallet_payment') {
            return view('globalsetting::email.template.pending_wallet_payment', compact('template'));
        } elseif ($template->name == 'approved_withdraw') {
            return view('globalsetting::email.template.approved_withdraw', compact('template'));
        } elseif ($template->name == 'Order Successfully') {
            return view('globalsetting::email.template.order_success', compact('template'));
        } elseif ($template->name == 'Admin Order Confirmation') {
            return view('globalsetting::email.template.order_success', compact('template'));
        } elseif ($template->name == 'Order Cancel') {
            return view('globalsetting::email.template.order_cancel', compact('template'));
        } elseif ($template->name == 'Order Delivery') {
            return view('globalsetting::email.template.order_cancel', compact('template'));
        } elseif ($template->name == 'Payment Success') {
            return view('globalsetting::email.template.order_cancel', compact('template'));
        } elseif ($template->name == 'Workout Enrolled') {
            return view('globalsetting::email.template.workout_enroll', compact('template'));
        } elseif ($template->name == 'Member Registration') {
            return view('globalsetting::email.template.member_registration', compact('template'));
        } elseif ($template->name == 'Subscription Success') {
            return view('globalsetting::email.template.subscription_success', compact('template'));
        } elseif ($template->name == 'Subscription Expire') {
            return view('globalsetting::email.template.subscription_expire', compact('template'));
        } elseif ($template->name == 'Trial Subscription') {
            return view('globalsetting::email.template.trial_subscription', compact('template'));
        } elseif ($template->name == 'Assign Locker') {
            return view('globalsetting::email.template.assign_locker', compact('template'));
        } elseif ($template->name == 'Locker Status Change') {
            return view('globalsetting::email.template.locker_status', compact('template'));
        } elseif ($template->name == 'Remove Assign Locker') {
            return view('globalsetting::email.template.locker_status', compact('template'));
        } else {
            $notification = __('Something went wrong');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return redirect()->back()->with($notification);
        }
    }

    public function update_email_template(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $rules = [
            'subject' => 'required',
            'message' => 'required',
        ];
        $customMessages = [
            'subject.required' => __('Subject is required'),
            'message.required' => __('Message is required'),
        ];

        $request->validate($rules, $customMessages);

        $template = EmailTemplate::find($id);
        if ($template) {
            $template->subject = $request->subject;
            $template->message = $request->message;
            $template->save();
            $notification = __('Updated Successfully');
            $notification = ['message' => $notification, 'alert-type' => 'success'];

            return redirect()->route('admin.email-configuration')->with($notification);
        } else {
            $notification = __('Something went wrong');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return redirect()->back()->with($notification);
        }
    }
}
