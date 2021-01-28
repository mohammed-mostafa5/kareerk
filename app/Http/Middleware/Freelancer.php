<?php

namespace App\Http\Middleware;

use Closure;

class Freelancer
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
        if (auth('api')->user()->userable_type != 'App\Models\Freelancer') {
            return response()->json(['msg' => 'You Are Not Freelancer'], 403);
        }
        return $next($request);
    }
}
