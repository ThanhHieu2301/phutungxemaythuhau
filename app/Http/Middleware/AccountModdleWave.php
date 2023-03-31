<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountModdleWave
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
        if(!Auth::guard('cus')->check()){
            return redirect()->route('auth.login')->with('no',"Vui lòng đăng nhập hệ thống");
        }elseif(Auth::guard('cus')->user()->status == 0)
        {
            Auth::guard('cus')->logout();   
            return redirect()->route('auth.login')->with('no','Tài khoản chưa được kích hoạt');
        }
        return $next($request);
    }
}
