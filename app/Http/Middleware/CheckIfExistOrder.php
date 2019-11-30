<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfExistOrder
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
        if ($request->session()->get('order'))
            return redirect('/orderStatus');
        return $next($request);
    }
}
