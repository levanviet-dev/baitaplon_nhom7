<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingModel;
use App\Models\HoaDonModel;
use Illuminate\Pagination\LengthAwarePaginator;
use  Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Rfc4122\NilUuid;
use App\Models\KhachHangModel;
use App\Models\PhongModel;

class AdminController extends Controller
{
    // admin dashboard
  public function dashboard(){
     $data = BookingModel::getbooking();
    // dd($data);
    return view('view_admin.dashboard',['data'=>$data]);
  }

  // admin list booked of dashboard
  public function booked(){
    $data = BookingModel::booked();
    return json_encode($data);
  
  }
  // admin booking room the method of menu
  public function roombooking(){
  // user PhongController get data 
   $roomfree = PhongModel::getroom();
   $roombooked = PhongModel::getroombooked();
   return view('view_admin.roombooking',compact('roombooked','roomfree'));
  }
  //payment
  public function payment(){
    $data = HoaDonModel::getallHoaDon();
    $dathanhtoan = HoaDonModel::getHoaDonThanhToan();
   //dd($data)
    return view('view_admin.payment',compact('data','dathanhtoan'));
  }
  // customer
  public function customer(){
    $data = KhachHangModel::getall();
    return view('view_admin.customer',compact('data'));
  }
  // lien he
  public function adcontact(){
    $data = DB::table('lienhe')->get();
    //dd($data);
    return view('view_admin.adcontact',compact('data')) ; 
  }


}
