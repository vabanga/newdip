<?php

namespace App\Http\Middleware;

use Closure;

class Theme
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
        dd($request);
        if ($request->age <= 200) {
            return redirect('/');
        }

        return $next($request);
    }
}
