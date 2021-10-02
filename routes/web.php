<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BookingController;
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

Route::get('/booking','BookingController@index');

Route::post('/create','BookingController@create');
// admin router
Route::group(['prefix'=>'/admin'], function () {
    Route::get('/', 'Admin\AdminController@dashboard');
    Route::get('/login','Auth\LoginController@login');
    Route::get('/logout','Auth\LoginController@logout');
    Route::post('/userlogin', 'Auth\LoginController@userLogin');
    // Route::get('/dashboard','Admin\AdminController@dashboard');
    
    Route::get('/test','Admin\AdminController@test');
});
Route::get('/getroom','PhongController@getroom');