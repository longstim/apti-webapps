<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Closure;


class SalesAuthenticate
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
        if(!empty(Auth::user()) && Auth::user()->role == 'sales')
        {
            if($request->ajax())
            {
                return  response('Unauthorized.',401);
            }
            else
            {
                return redirect('/incentive');
            }
        }
     
        return $next($request);
    }
}
