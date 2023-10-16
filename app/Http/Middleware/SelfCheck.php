<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SelfCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currUser = Auth::user();
        $user = User::where('id', $request->id)->first();
    
        if (!$user || $user->id !== $currUser->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
        return $next($request);
    }
}
