<?php

namespace App\Http\Controllers\Auth;

use App\Enums\SocialiteDriverType;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\MemberService;
use App\Traits\NewUserCreateTrait;
use App\Traits\SetConfigTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    use NewUserCreateTrait, SetConfigTrait;

    public function __construct()
    {
        $driver = request('driver', null);
        if ($driver == SocialiteDriverType::GOOGLE->value) {
            self::setGoogleLoginInfo();
        }
    }

    public function redirectToDriver($driver)
    {
        if (in_array($driver, SocialiteDriverType::getAll())) {
            return Socialite::driver($driver)->redirect();
        }
        $notification = __('Invalid Social Login Type!');
        $notification = ['message' => $notification, 'alert-type' => 'error'];

        return redirect()->back()->with($notification);
    }

    public function handleDriverCallback($driver, MemberService $memberService)
    {
        if (!in_array($driver, SocialiteDriverType::getAll())) {
            $notification = __('Invalid Social Login Type!');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }
        try {

            $provider_name = SocialiteDriverType::from($driver)->value;
            $callbackUser = Socialite::driver($provider_name)->stateless()->user();

            $user = User::where('email', $callbackUser->getEmail())->first();
            if ($user) {
                $findDriver = $user
                    ->socialite()
                    ->where(['provider_name' => $provider_name, 'provider_id' => $callbackUser->getId()])
                    ->first();

                if ($findDriver) {
                    $user = User::find($findDriver->user_id);
                    if ($user->status == UserStatus::ACTIVE->value) {
                        if ($user->is_banned == UserStatus::UNBANNED->value) {
                            if (app()->isProduction() && $user->email_verified_at == null) {
                                $notification = __('Please verify your email');
                                $notification = ['message' => $notification, 'alert-type' => 'error'];
                                return redirect()
                                    ->back()
                                    ->with($notification);
                            }
                            if ($findDriver) {
                                Auth::guard('web')->login($user, true);
                                if (!$user?->member) {
                                    $memberService->storeMember($user, ['status' => 1]);
                                }
                                $notification = __('Logged in Successfully');
                                $notification = ['message' => $notification, 'alert-type' => 'success'];
                                if (str_contains(redirect()->intended()->getTargetUrl(), 'admin/dashboard')) {
                                    return to_route('website.user.dashboard')->with($notification);
                                }
                                return redirect()
                                    ->intended(route('website.user.dashboard'))
                                    ->with($notification);
                            }
                        } else {
                            $notification = __('Inactive account');
                            $notification = ['message' => $notification, 'alert-type' => 'error'];
                            return redirect()
                                ->back()
                                ->with($notification);
                        }
                    } else {
                        $notification = __('Inactive account');
                        $notification = ['message' => $notification, 'alert-type' => 'error'];
                        return redirect()
                            ->back()
                            ->with($notification);
                    }
                } else {
                    $socialite = $this->createNewUser(user: $user, callbackUser: $callbackUser, provider_name: $provider_name);

                    if ($socialite) {
                        Auth::guard('web')->login($user, true);
                        $notification = __('Login Successfully');
                        $notification = ['message' => $notification, 'alert-type' => 'success'];

                        if (str_contains(redirect()->intended()->getTargetUrl(), 'admin/dashboard')) {
                            return to_route('website.user.dashboard')->with($notification);
                        }
                        return redirect()
                            ->intended(route('website.user.dashboard'))
                            ->with($notification);
                    }

                    $notification = __('Login Failed');
                    $notification = ['message' => $notification, 'alert-type' => 'error'];
                    return redirect()
                        ->back()
                        ->with($notification);
                }
            } else {
                if ($callbackUser) {
                    $socialite = $this->createNewUser(null, callbackUser: $callbackUser, provider_name: $provider_name);
                    $user = User::where('email', $callbackUser->getEmail())->first();
                    if ($socialite) {
                        Auth::guard('web')->login($user, true);

                        $notification = __('Logged in Successfully');
                        $notification = ['message' => $notification, 'alert-type' => 'success'];
                        if (str_contains(redirect()->intended()->getTargetUrl(), 'admin/dashboard')) {
                            return to_route('website.user.dashboard')->with($notification);
                        }
                        return redirect()
                            ->intended(route('website.user.dashboard'))
                            ->with($notification);
                    }

                    $notification = __('Login Failed');
                    $notification = ['message' => $notification, 'alert-type' => 'error'];
                    return redirect()
                        ->back()
                        ->with($notification);
                }

                $notification = __('Login Failed');
                $notification = ['message' => $notification, 'alert-type' => 'error'];
                return redirect()
                    ->back()
                    ->with($notification);
            }
        } catch (Exception $e) {
            return to_route('login');
        }
    }
}
