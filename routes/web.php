<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/login', '\App\Http\Controllers\Auth\AdminLoginController@showLoginForm');
Route::post('admin/login', '\App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login');

Route::get('moderator/login', '\App\Http\Controllers\Auth\ModeratorLoginController@showLoginForm');
Route::post('moderator/login', '\App\Http\Controllers\Auth\ModeratorLoginController@login')->name('moderator.login');

Route::group(["prefix" => "admin" , "middleware" => "assign.guard:admin,admin/login"],
    function(){
        Route::get("dashboard",function(){
            return view('admin.home');
        });
    }
);

Route::group(["prefix" => "moderator" , "middleware" => "assign.guard:moderator,moderator/login"],
    function(){
        Route::get("dashboard",function(){
            return view('moderator.home');
        });
    }
);

