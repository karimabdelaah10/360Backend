<?php

namespace App\Modules\BaseApp\Middleware;
use Closure;
use Jenssegers\Date\Date;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // URL format api/v1/{language}/
        $availableLocales = config("translatable.locales");
        $languageCode = $request->segment(3);
        $languageCode = strtolower($languageCode);

        if (!in_array($languageCode, $availableLocales)) {
            $languageCode = env('DEFAULT_LANGUAGE', 'en');
        }
        LaravelLocalization::setLocale($languageCode);
        Date::setLocale($languageCode);

        $request->route()->forgetParameter('language');
        return $next($request);
    }
}
