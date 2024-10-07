<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Models\User;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/shop', function () {
    return view('shop');
}) ->name('shop');


Route::get('/contact', function () {
    return view('contact');
}) ->name('contact');

Route::get('/about', function () {
    return view('about');
}) ->name('about');

// Authenticated routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

// Admin routes
Route::middleware('isAdmin')->group(function() {
   // Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/add-admin', [AdminController::class, 'add'])->name('add-admin');  
    Route::get('/edit-admin', [AdminController::class, 'edit'])->name('edit-admin');
    Route::get('/user-post-view', [UserController::class, 'showPosts'])->name('user-post-view');
});

// User routes
Route::middleware('isUser')->group(function() {
    Route::get('/user-post-view', [UserController::class, 'showPosts'])->name('user-post-view'); // Changed to avoid conflict
    Route::get('/user-submit-post', [UserController::class, 'create'])->name('user-submit-post');
    Route::post('/user-submit-post', [UserController::class, 'store'])->name('user-submit-post');
    Route::get('/user-show/{id}', [UserController::class, 'show'])->name('user-show');
    Route::get('/cart', [UserController::class, 'showPosts'])->name('cart');

    // The following route is not necessary since showPosts already handles the display of posts.
    // Route::get('/user-posts', [UserController::class, 'showPosts'])->name('user-post-view'); // Removed for clarity
});

