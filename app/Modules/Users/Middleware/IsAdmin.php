<?php

namespace App\Modules\Users\Middleware;

use App\Modules\Users\Enums\UserEnum;
use Closure;

class IsAdmin
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
            if ($user->type  == UserEnum::SUPER_ADMIN || $user->type  == UserEnum::ADMIN) {
                return $next($request);
            }
        }

        flash()->error(trans('app.You are not authorized to do this action'));
        return redirect('/');
    }
}
