<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        // // bagian untuk login bagian user admin tanda || adalah atau OR
        // if (auth()->guest() || auth()->user()->username !== 'kukuhkurniawan'){
        //     abort(403);
        // }
        // // note kalau menggunakan check dia di kasih tanda ! seru yaitu not 
        // // sedangkan guest itu tidak perlu menggunakan ! 
        if (!auth()->check() || !auth()->user()->is_admin){
            abort(403);
        }

        return $next($request);
    }
}
