<?php

namespace App\Modules\Users\Middleware;

use Closure;
use App\Modules\Users\UserEnums;

class IsSuperAdmin
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($user = auth()->user()) {
            if ($user->type == UserEnums::SUPER_ADMIN_TYPE) {
                return $next($request);
            }
        }

        flash()->error(trans('app.You are not authorized to do this action'));
        return redirect('/');
    }
}
