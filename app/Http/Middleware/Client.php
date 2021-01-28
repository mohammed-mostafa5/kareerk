<?php

namespace App\Http\Middleware;

use Closure;

class Client
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
        if (auth('api')->user()->userable_type != 'App\Models\Client') {
            return response()->json(['msg' => 'You Are Not Client'], 403);
        }
        return $next($request);
    }
}
