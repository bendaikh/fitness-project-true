<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;


class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (auth('web')->check() && (auth('web')->user()->is_banned == 'yes')) {
            Auth::guard('web')->logout();

            $sessionKeys = array_keys(Session::all());

            foreach ($sessionKeys as $key) {
                if (strpos($key, 'login_web_') !== false) {
                    // Remove the session variable
                    Session::forget($key);
                }
            }

            return redirect()->route('login')->with('error', 'Your Account is suspended, please contact Admin.');
        }

        return $next($request);
    }
}
