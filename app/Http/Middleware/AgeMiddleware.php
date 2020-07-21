<?php

namespace App\Http\Middleware;

use Closure;

class AgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $age)
    {
        $age = $request->route('age');
        // return $age;
        if(intval($age) < 20){
            return abort(403);
        };
        return $next($request);
    }
}
