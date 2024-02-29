<?php

namespace App\Http\Middleware;

use App\CustomHelpers\CustomHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            if (Auth::user()->role == "user"){
                return $next($request);
            }
            CustomHelper::message("warning", "Access denied");
            return redirect()->route('user.sign_in');
        }
        CustomHelper::message("danger", "Authentication required");
        return redirect()->route('user.sign_in');
    }
}
