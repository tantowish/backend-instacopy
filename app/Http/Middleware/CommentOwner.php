<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CommentOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currUser = Auth::user();
        $comment = Comment::findOrFail($request->id);
        
        if($currUser->id != $comment->user_id){
            return response()->json(['messege'=>'comment not found'], 404);
        }

        return $next($request);
    }
}
