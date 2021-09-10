<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])
    ->name('auth.form.login');

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('auth.login');

Route::get('register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])
    ->name('auth.form.register');

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])
    ->name('auth.register');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])
        ->name('user.index');

    Route::post('user/store', [\App\Http\Controllers\UserController::class, 'store'])
        ->name('user.store');

    Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])
        ->name('posts.index');

    Route::get('posts/create', [\App\Http\Controllers\PostController::class, 'create'])
        ->name('posts.create');

    Route::post('posts/store', [\App\Http\Controllers\PostController::class, 'store'])
        ->name('posts.store');

    Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])
        ->name('posts.show');

    Route::delete('posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])
        ->name('posts.destroy');

    Route::delete('posts/{post}/force', [\App\Http\Controllers\PostController::class, 'forceDelete'])
        ->name('posts.forceDelete');

    Route::patch('posts/{post}/restore', [\App\Http\Controllers\PostController::class, 'restore'])
        ->name('posts.restore');

Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');







