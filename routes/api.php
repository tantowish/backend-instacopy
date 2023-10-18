<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::Resource('posts', PostController::class)->middleware(['auth:sanctum']);


Route::middleware(['auth:sanctum'])->group(function(){
    // Auth & Account routing
    Route::get('/logout',[AuthenticationController::class, 'logout']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/profile', [AccountController::class, 'profile']);
    Route::patch('/profile/{id}', [AccountController::class, 'update'])->middleware('self');
    
    // Comment routing
    Route::post('/comment', [CommentController::class, 'store']); 
    Route::patch('/comment/{id}', [CommentController::class, 'update'])->middleware('CommentOwner'); 
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->middleware('CommentOwner');
    
    // Posts routing
    Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('PostOwner');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('PostOwner');
});

// Posts routing
Route::get('/posts',[PostController::class, 'index']);
Route::get('/posts/{id}',[PostController::class, 'show']); 

// Auth & Account Routing
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AccountController::class, 'register']);
