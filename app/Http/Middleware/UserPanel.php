<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserPanel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,string $role): Response
    {
        //echo "We Are in User Panel Middleware";
        if(Auth::check()&&Auth::user()->role=='user'){
             return $next($request);
        }else{
            return redirect()->route('welcomepage');
        }
       
    }
}
