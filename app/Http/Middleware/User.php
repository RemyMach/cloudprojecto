<?php

namespace App\Http\Middleware;

use Closure;

class User
{
    private $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->auth =
            auth()->user() ?
                (auth()->user()->role === 'user')
                : false;

        if($this->auth === true){
            return $next($request);
        }

        return redirect()->route('login');

        return $next($request);
    }
}
