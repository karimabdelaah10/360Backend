<?php

namespace App\Modules\BaseApp\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class TypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $allowedTypes)
    {
        if ($user = Auth::user() ?? Auth::guard('api')->user()) {
            $allowedTypes = explode('|', $allowedTypes);
            if (in_array($user->type, $allowedTypes)) {
                return $next($request);
            }
        }

        // case api request
        if ($request->wantsJson() or $request->expectsJson()) {
            return response()->json(
                [
                    "errors" =>
                    [[
                        'status' => 403,
                        'title' => trans('app.You are not authorized to do this action'),
                        'detail' => trans('app.You are not authorized to do this action')
                    ]]
                ],
                403
            );
        }

        flash()->error(trans('app.You are not authorized to do this action'));
        return redirect('/');
    }
}
