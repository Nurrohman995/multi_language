<?php

namespace App\Http\Middleware;

use Closure;

class locale
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
        $locale = $request->session()->get('locale');
        if ($locale !== null && array_key_exists($locale, config('app.locales'))) {
            \App::setLocale($locale);
        }
        return $next($request);
    }
}
