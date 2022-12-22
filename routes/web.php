<?php

use App\Http\Controllers\ExternalAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Session;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function() {
    return redirect()->route('login-page');
});

Route::get('/login', function () {
    return view('login');
})->name('login-page');

Route::post('/login',[LoginController::class, 'login'])->name('login-account');

Route::get('/register', function () {
    return view('register');
})->name('register-page');

Route::post('/register',[LoginController::class, 'addAccount'])->name('register-account'); 

Route::get('/home', function () {
    return view('home');
})->name('home-page');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout'); 

Route::get('/auth',[ExternalAuthController::class,'facebook'])->name('facebook-login');
Route::get('/auth/facebook/callback',[ExternalAuthController::class,'callbackFromFacebook'])->name('facebook-callback');

Route::get('/auth/google',[ExternalAuthController::class,'google'])->name('google-login');
Route::get('/auth/google/callback',[ExternalAuthController::class,'callbackFromGoogle'])->name('google-callback');