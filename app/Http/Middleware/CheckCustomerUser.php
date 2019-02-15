<?php

namespace App\Http\Middleware;

use Closure;

class CheckCustomerUser
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
        if($request->user()->isCustomer()) {
            return $next($request);
        }
        abort(404);
    }
}
