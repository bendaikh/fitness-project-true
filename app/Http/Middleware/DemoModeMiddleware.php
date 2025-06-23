<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoModeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (strtoupper(config('app.app_mode')) !== 'LIVE') {
            // Define an array of routes that are allowed in non-LIVE mode
            $allowedRoutes = [
                'login',
                'register',
                'user-register',
                'user-login',
                'user-verification',
                'logout',
                'admin.login',
                'admin.store-login',
                'admin.logout',
                'website.user.wishlist.remove'
            ];

            if ($request->routeIs(...$allowedRoutes) || $request->method() == 'GET') {
                return $next($request);
            }

            // Check if the request is an AJAX request
            if ($request->ajax() || $request->isXmlHttpRequest()) {
                return response()->json([
                    'status' => 'error',
                    'message' => __('In Demo Mode you can not perform this action')
                ], 403);
            }

            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => __('In Demo Mode you can not perform this action'),
            ]);
        }

        return $next($request);
    }
}
