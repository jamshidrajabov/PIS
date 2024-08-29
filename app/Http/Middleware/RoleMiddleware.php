<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
    
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect('/login');
        }
       else
       {
        $user = Auth::user();
        if ($user->role_id !==1) {
            return redirect('/dashboard'); // user bo'lsa, asosiy sahifaga qaytarish
            
        }
        else
        {
            return $next($request);
        }
       }

        
    }
}
