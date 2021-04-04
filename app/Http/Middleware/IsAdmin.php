<?php

namespace App\Http\Middleware;

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
        abort(403, 'Unauthorized action.');
    }
}
