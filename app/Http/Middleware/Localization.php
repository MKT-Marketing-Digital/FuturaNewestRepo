<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
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


        if (session()->has('locale')) {

            // FEATURE: Si el usuario está identificado, y ya tiene un idioma, colocar dicho idioma

            App::setLocale(session()->get('locale'));

        }


        return $next($request);


    }
}
