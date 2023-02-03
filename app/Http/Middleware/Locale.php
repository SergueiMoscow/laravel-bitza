<?php

namespace App\Http\Middleware;

use App;
use Auth;
use Closure;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //file_put_contents('/Users/sergey/temp/aaa.txt', print_r($_SERVER, true));
        App::setLocale(Auth::user() ? $this->getLocaleFromUser() : $this->getLocaleFromServer());
        return $next($request);
    }

    private function getLocaleFromServer()
    {
        $languages = explode(';', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $locale = substr($languages[0], -2);
        return (in_array($locale, ['en', 'es', 'ru'])) ? $locale : 'en';
    }

    private function getLocaleFromUser()
    {
        $locale = Auth::user()->lang;
        return (in_array($locale, ['en', 'es', 'ru'])) ? $locale : 'en';
    }
}
