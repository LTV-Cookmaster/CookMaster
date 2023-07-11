<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageSwitch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //                $locale = Session::get('locale', config('app.locale'));
        //                App::setLocale($locale);
        if ($request->has('lang')) {
            $lang = $request->input('lang');
            if (in_array($lang, ['en', 'fr'])) {
                app()->setLocale($lang);
                session()->put('lang', $lang);
            }
        } elseif (session()->has('lang')) {
            app()->setLocale(session()->get('lang'));
        }
        return $next($request);
    }
}
