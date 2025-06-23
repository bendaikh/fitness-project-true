<?php
namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class AdminExceptionHandler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        // Check if the request is for the admin panel
        if ($request->is('admin/*')) {
            // Handle 500 Internal Server errors
            if ($exception instanceof HttpException && $exception->getStatusCode() === 500) {
                return response()->view('errors.500', [], 500);
            }
        }

        return parent::render($request, $exception);
    }
}
