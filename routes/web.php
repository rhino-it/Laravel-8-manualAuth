<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\PasswordConfirmationController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\PasswordRequestController;
use App\Http\Controllers\Auth\ResetPasswordController;

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


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'handle'])->name('register');
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'handle'])->name('login');
Route::post('/logout', [LogoutController::class, 'handle'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/confirm-password', [PasswordConfirmationController::class, 'show'])
        ->name('password.show');
    Route::post('/confirm-password', [PasswordConfirmationController::class, 'handle'])
        ->middleware(['throttle:6,1'])
        ->name('password.confirm');
    Route::get('/verify-email', [EmailVerificationController::class, 'show'])
        ->name('verification.notice'); // <-- don't change the route name
    Route::post('/verify-email/request', [EmailVerificationController::class, 'request'])
        ->name('verification.request');
    Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware(['signed']) // <-- don't remove "signed"
        ->name('verification.verify'); // <-- don't change the route name
    Route::post('/posts', [PostController::class, 'create'])
        ->middleware(['verified']) // <!-- add the "verified" middleware
        ->name('posts.create');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/forgot-password', [PasswordRequestController::class, 'show'])
        ->name('password.request'); 
    Route::post('/forgot-password', [PasswordRequestController::class, 'handle'])
        ->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show'])
        ->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'handle'])
        ->name('password.update');
});
