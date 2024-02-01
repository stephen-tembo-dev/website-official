<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfViewer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
/*     public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    } */

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()  && auth()->user()->role_id != 1845) {
            return redirect()->to('/');
        }

        return $next($request);
    }
}
