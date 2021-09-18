<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfSuperAdmin
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(Auth::user()->autocolumn_id == 12345){
            return $next($request);
        } else {
            return redirect()->route('admin.dashboard')->withErrors(array('errors' => 'Super Adminiň sahypasyna girmäge siziň mümkinçiligiňiz ýok'));
        }
    }
}
