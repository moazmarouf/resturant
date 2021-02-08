<?php

use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\HomeController;
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

Route::group(['namespace' => 'Site','middleware' => 'guest'],function(){
    Route::get('/',[AuthController::class,'login'])->name('site.login');
    Route::post('login',[AuthController::class,'postLogin'])->name('site.login.post');

    Route::get('register',[AuthController::class,'register'])->name('site.register');
    Route::post('register',[AuthController::class,'postRegister'])->name('site.register.post');

    Route::get('password/forget',[AuthController::class,'forgotPassword'])->name('password.forgot');
    Route::post('password/forget',[AuthController::class,'postForgotPassword'])->name('password.forgot.post');

    Route::get('password/reset',[AuthController::class,'resetPassword'])->name('password.reset');
    Route::post('password/reset/password',[AuthController::class,'postResetPassword'])->name('password.reset.post');

});
Route::group(['namespace' => 'Site','middleware' => 'auth'],function(){
    Route::get('confirmation',[AuthController::class,'getConfirmation'])->name('confirmation');
    Route::post('confirmation',[AuthController::class,'postConfirmation'])->name('confirmation.post');
    Route::get('home',[HomeController::class,'home'])->name('home');
});
Route::get('/users/logout', [AuthController::class, 'logout'])->name('users.logout');

