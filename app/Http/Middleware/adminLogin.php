<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class adminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::guard('admin')->check()){
            if(Auth::guard('admin')->user()->remember_token == null){
                return $next($request);
            }else{
                return redirect('admin/login?alert=warning');
            }
        }else return redirect('admin/login?alert=warning');
        }           
}
