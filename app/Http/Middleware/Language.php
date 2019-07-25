<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language
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
        $active = Session::get('locale');

        if (! is_null($active)) {
            App::setLocale($active);
        } else {
            App::setLocale('en');
        }

        return $next($request);
    }
}
