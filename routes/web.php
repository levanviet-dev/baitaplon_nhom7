<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BookingController;
use App\Models\LoaiPhongModel;
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
   $data = LoaiPhongModel::getalltyperoom();
    return view('home',['data'=>$data]);
});
// router customer 
Route::get('/booking','BookingController@index');
Route::post('/create','BookingController@create');
// create contact
Route::post('/contact','LienHeController@create');
// admin router
Route::group(['prefix'=>'/admin'], function () {
    Route::get('/', 'Admin\AdminController@dashboard');
    Route::get('/login','Auth\LoginController@login');
    Route::get('/logout','Auth\LoginController@logout');
    Route::post('/userlogin', 'Auth\LoginController@userLogin');
    Route::get('/roombooking','Admin\AdminController@roombooking');
    Route::get('/payment','Admin\AdminController@payment'); 
    Route::get('/customer','Admin\AdminController@customer');
    Route::get('/adcontact','Admin\AdminController@adcontact')->name('adcontact');
    Route::get('/test','Admin\AdminController@test');
    // xu li ben phong 
    Route::post('/createroom','PhongController@create');
    Route::put('/updateroom','PhongController@update');
    Route::get('/deleteroom/{id}','PhongController@delete');
    // xu ly ben doanh thu lay doanh thu
    Route::get('/getrevenue','HoadonController@getrevenue');
     // in hoa don
    Route::get('/print/{ID}','HoadonController@printHD');
    // admin user profile
    Route::get('/profile','Admin\AdminController@account');
    // admin sent mail
    Route::post('/sentmail','Admin\AdminController@sentmail');
});
// route get data by api
//Admin booking room
// route get room view dashboard get room available
Route::get('/getroom','PhongController@getroom');
// get data room booked
Route::get('/bookedroom','PhongController@bookedroom');
// xóa booking
Route::post('/deletebook','BookingController@delete');
// Admin dashboard
// get data table booking 
Route::get('/booked','Admin\AdminController@booked');
// get data return number's room of by type
Route::get('/roombytype/{id}','PhongController@getnumroombytype');
// update roombooking
Route::get('/updatebook/{id}/{idroom}','BookingController@updatebook');
//get data numbed for customer booking choose
Route::get('/getbed/{id}','PhongController@getbed');
// get moneys room 
Route::get('/getmoney/{id}/{num}','PhongController@getmoneyroom');
// get data nums customer went to the hotel
Route::get('/getnumcuswent/{id}','BookingController@getnumcuswentto');
// Admin payment
// get data payment of customer
Route::get('/customerpayment/{id}','BookingController@customerpayment');
// get money of bill by id bill
Route::get('/getmoneybyIDHD/{id}','HoaDonController@getmoneybyIDHD');
// update bill when customer pay money for the my hothel
Route::get('/updatebillpayed/{id}/{loai}/{discount}','HoaDonController@updatebillpayed');
// routter loai phong
Route::get('/gettyperoom','LoaiPhongController@gettyperoom');
//
Route::get('/abcd','Admin\AdminController@getgetget');