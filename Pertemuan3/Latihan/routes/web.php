<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Milda Khaerunnisa']);
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('posts', [PostController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//--- Router untuk halamam Dashboard admin ---//
//--- Route dashboard ---//
Route::get('/posts', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('posts.index');

//--- Route untuk melihat detail post ---//
Route::get('/posts/{post:slug}', [PostController::class, 'show'])
    ->middleware('auth')
    ->name('posts.show');

//--- Route Register ---//
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->middleware('guest');

//--- Route Login ---//
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

//--- Route Logout ---//
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');