<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OwnerAndAdmin
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
        if(Auth::user()->typeofuser_1->name == ('admin' or 'owner')){
            return $next($request);
        }
        abort(403);
    }
}
