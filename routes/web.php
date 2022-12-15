<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home page and navigation links
Route::get('/', [HomeController::class, 'index']);
Route::get('/manifesto', [HomeController::class, 'manifesto']);
Route::get('/fardelliditalia', [HomeController::class, 'fardelliditalia']);

// Posts
Route::resource('/posts', PostsController::class);

// Comments
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store']);
// Replies
// Route::post('/posts/{post:slug}/reply', [CommentController::class, 'replyStore']);

// Login with Google
Route::get('/auth/google/login', [SocialLoginController::class, 'GoogleRedirect']);
Route::get('/auth/google/callback', [SocialLoginController::class, 'GoogleLogin']);

// Login with Facebook
Route::get('/auth/facebook/login', [SocialLoginController::class, 'FacebookRedirect']);
Route::get('/auth/facebook/callback', [SocialLoginController::class, 'FacebookLogin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
