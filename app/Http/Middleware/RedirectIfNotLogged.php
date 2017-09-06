<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotLogged {

    public function handle($request, Closure $next)
    {
        if (Auth::guest()){
            return redirect()->route('home');
        }

        return $next($request);
    }

}