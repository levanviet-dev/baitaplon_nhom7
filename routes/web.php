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
    return view('home');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/close', function () {
    return view('welcome');
});
// admin router
Route::group(['prefix'=>'/admin'], function () {
    Route::get('/', function () {
        return view('view_admin.dashboard');
    });
    Route::get('/login', function () {
        return view('view_admin.login');
    });
    Route::post('/logins', function () {
        $_SESSION["user"] = "aka";
        return view('view_admin.dashboard');
    });
    
});
