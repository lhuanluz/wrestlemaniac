<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin3 {

    public function handle($request, Closure $next)
    {
        if (!Auth::user()->isAdmin3()){
            return redirect()->route('painelAdmin');
        }

        return $next($request);
    }

}