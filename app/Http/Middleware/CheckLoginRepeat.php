<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLoginRepeat
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
      if(request()->session()->get('TokenLogin') != Auth::user()->token){
          request()->session()->forget('TokenLogin');
          return redirect()->route('logout', ['_token' => csrf_token()]);
      }
      return $next($request);
    }
}
