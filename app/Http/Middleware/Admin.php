<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->is_Admin == 0){
            return redirect()->route('admin.login')->with(['msg'=>'لا تمتلك الصلاحيه للدخول هنا']);
        }elseif(!Auth::user()){
            return redirect() -> route('admin.login');
        }
        return $next($request);
    }
}
