<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotVerified {

    public function handle($request, Closure $next)
    {
        if (Auth::user()->verified == 0){
            return redirect()->route('home');
        }

        return $next($request);
    }

}