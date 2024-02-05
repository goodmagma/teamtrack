<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class UserLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
    	$locales = array_keys( config('platform.locales') );
    	
    	if($user = Auth::user())
    	{
    		if (!empty($user->locale) && in_array($user->locale, $locales)) {
    			App::setLocale($user->locale);
    		}
    	}

        return $next($request);
    }
}
