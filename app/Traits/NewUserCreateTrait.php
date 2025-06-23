<?php

namespace App\Traits;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

trait NewUserCreateTrait
{
    use MailSenderTrait;

    private function createNewUser($user, $callbackUser, $provider_name)
    {
        if (! $user) {
            $password = Str::password(10);
            $user = User::create([
                'name' => $callbackUser->name,
                'email' => $callbackUser->email,
                'status' => UserStatus::ACTIVE->value,
                'is_banned' => UserStatus::UNBANNED->value,
                'image' => $callbackUser->getAvatar(),
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'verification_token' => Str::random(100),
            ]);

            $this->sendSocialLoginDefaultPasswordFromTrait($user, $password);
        }

        $socialite = $user->socialite()->create([
            'provider_name' => $provider_name,
            'provider_id' => $callbackUser->getId(),
            'access_token' => $callbackUser->token ?? null,
            'refresh_token' => $callbackUser->refreshToken ?? null,
        ]);

        return $socialite;
    }
}
