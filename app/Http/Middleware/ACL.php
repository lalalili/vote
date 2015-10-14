<?php

namespace app\Http\Middleware;

use Closure;
use Entrust;

class ACL
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

        //dd(Entrust::hasRole('admin'));
        if (!Entrust::hasRole('admin')) {
            return redirect('/admin');
        }
        return $next($request);
    }
}
