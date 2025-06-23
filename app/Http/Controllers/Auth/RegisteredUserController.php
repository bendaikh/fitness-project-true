<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Rules\CustomRecaptcha;
use App\Traits\MailSenderTrait;
use App\Http\Controllers\Controller;
use App\Models\PagesUtility;
use App\Services\MemberService;
use App\Services\PageUtilityService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Traits\GetGlobalInformationTrait;
use Illuminate\Support\Facades\Cache;

class RegisteredUserController extends Controller
{
    use GetGlobalInformationTrait, MailSenderTrait;

    public function create(PageUtilityService $pageUtility): View
    {
        $utility = $pageUtility->getPageUtility();

        return view('auth.register', compact('utility'));
    }

    public function store(Request $request, MemberService $memberService): RedirectResponse
    {
        $setting = Cache::get('setting');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', 'min:4', 'max:100'],
            'g-recaptcha-response' => $setting->recaptcha_status == 'active' ? ['required', new CustomRecaptcha()] : '',
        ], [
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
            'email.unique' => __('Email already exist'),
            'password.required' => __('Password is required'),
            'password.confirmed' => __('Confirm password does not match'),
            'password.min' => __('You have to provide minimum 4 character password'),
            'g-recaptcha-response.required' => __('Please complete the recaptcha to submit the form'),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => 'active',
            'is_banned' => 'no',
            'password' => Hash::make($request->password),
            'verification_token' => Str::random(100),
        ]);


        $this->sendVerifyMailToUserFromTrait('single_user', $user);

        $notification = __('A verification link has been send to your mail, please verify and enjoy our service');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function custom_user_verification($token)
    {
        $user = User::where('verification_token', $token)->first();

        if ($user) {

            if ($user->email_verified_at != null) {
                $notification = __('Email already verified');
                $notification = ['message' => $notification, 'alert-type' => 'error'];

                return redirect()->route('login')->with($notification);
            }

            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->verification_token = null;
            $user->save();

            $notification = __('Verification Successfully, please try to login now');
            $notification = ['message' => $notification, 'alert-type' => 'success'];

            return redirect()->route('login')->with($notification);
        } else {
            $notification = __('Invalid token');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return redirect()->route('register')->with($notification);
        }
    }
}
