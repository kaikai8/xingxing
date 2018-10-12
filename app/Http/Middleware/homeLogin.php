<?php

namespace App\Http\Middleware;

use Closure;

class homeLogin
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
         //判断
        if(session('uid'))
        {
            return $next($request);
        }else
        {
            return redirect('/home/login');
        }
    }
}
