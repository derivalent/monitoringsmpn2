<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;

// class CheckRole
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @param  string  $role
//      * @return mixed
//      */
//     public function handle(Request $request, Closure $next, $role)
//     {
//         // Logika middleware untuk memeriksa peran
//         return $next($request);
//     }
// }

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Memeriksa apakah pengguna saat ini login dan apakah perannya sesuai
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki peran yang sesuai, tampilkan error 403
        abort(403, 'Unauthorized action.');
    }
}
