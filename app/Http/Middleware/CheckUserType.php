<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $userType)
    {
        // dd('App\Models' . '\\' . $userType);
        if (auth('api')->user()->userable_type != 'App\Models' . '\\' . $userType) {
            return response()->json(['msg' => 'You Are Not ' .  $userType], 403);
        }
        return $next($request);
    }
}
