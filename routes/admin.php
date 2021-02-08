<?php

use App\Http\Controllers\Dashboard\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('layouts.master-dashboard');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('login', [AuthController::class, 'checkLogin'])->name('admin.post.login');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
    });
});
