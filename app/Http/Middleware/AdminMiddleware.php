<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'admin'){
        return $next($request);
        }
        return response()->json([
            'success'=> false,
            'message'=> "You are not authorized to access this page",
            'error' => 'Forbidden'
         ],403);
    }
}
