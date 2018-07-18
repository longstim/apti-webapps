<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Closure;

class Authenticate
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
        if(empty(Auth::user()))
        {
            if($request->ajax())
            {
                return  response('Unauthorized.',401);
            }
            else
            {
                return redirect()->guest('login');
            }
        }
        return $next($request);
    }
}
