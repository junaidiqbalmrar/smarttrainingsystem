<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,string $roles): Response
    {
       // echo "Role :".$roles. "IS" ; //echo "<h1>User Is Authenticated </h1>";
        //echo "<h1> we are In Admin middleware</h1>";
       if( Auth::check()&&Auth::user()->role == 'admin'){
             return $next($request);
       }else if(Auth::check()&&Auth::user()->role == 'user'){
        return redirect()->route('user.dashboard')->with('status' , 'Login As Admin To Access ' );
       }else{
        return redirect()->route('welcomepage')->with('status' , 'Login As Admin To Access ' );
       }
    //     $user=Auth::user();
       
    //    switch ($user->role) {
    //        case 'admin':
    //        // echo "<h1> we are In Admin middleware</h1>";
    //          
    //        default:
    //            return redirect()->route('user.dashboard')->with('status' , 'Login As Admin To Access ' );
    //    }
    //    return redirect()->route('login');
    // }
    // //echo "<h1>User Not Authenticated</h1>";
    // return redirect()->route('login');
    }
}

