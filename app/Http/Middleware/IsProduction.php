<?php

namespace App\Http\Middleware;

use App\Modules\Config\Enums\ConfigsEnum;
use App\Modules\Config\Models\Config;
use Closure;
use Illuminate\Support\Facades\Response;

class IsProduction
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
        $underConstruction =Config::where('title',ConfigsEnum::UNDER_CONSTRUCTION)->first();
        if ($underConstruction && $underConstruction->value){
            return redirect(route('under_construction'));
        }
        return  $next($request);
    }
}
