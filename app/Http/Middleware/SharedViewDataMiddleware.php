<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;

class SharedViewDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //get workspaces
        $workspaces = Workspace::where('user_id', Auth::id())->orderBy('name', 'ASC')->paginate(10);
        
        View::share('workspaces', $workspaces);

        return $next($request);
    }
}
