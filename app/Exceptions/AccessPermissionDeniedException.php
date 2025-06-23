<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AccessPermissionDeniedException extends Exception
{
    public function render($request): Redirector|RedirectResponse|JsonResponse
    {
        if ($request->expectsJson()) {
            return response()->json([
                'alert-type' => 'error',
                'message' => __('Permission Denied, You can not perform this action!'),
            ], 403);
        }

        return redirect()->back()->with([
            'alert-type' => 'error',
            'message' => __('Permission Denied, You can not perform this action!'),
        ]);
    }
}
