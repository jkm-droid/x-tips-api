<?php

namespace App\Http\Middleware;

use App\Exceptions\CustomException;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return JsonResponse|RedirectResponse|void
     * @throws CustomException
     */
    protected function redirectTo($request)
    {
        if($request->is('api/*'))
        {
            throw new CustomException("Unauthorized request",406);
        }

        if (! $request->expectsJson()) {
            if (Auth::guard('admin')->check()) {
                return redirect()->route('admin.show.login');
            }else
                return response()->json([
                    'message'=>'Not authorized'
                ]);
        }
    }
}
