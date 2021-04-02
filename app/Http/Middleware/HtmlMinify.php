<?php

namespace App\Http\Middleware;

use Closure;

class HtmlMinify
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
        if ($request->title == null) {
            return redirect("todo/{$request->place}");
        }
        return $next($request);
    }
}
