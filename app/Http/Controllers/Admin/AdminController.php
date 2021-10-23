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
class AdminController extends Controller
{
    // admin dashboard
  public function dashboard(){
     $data = BookingModel::getbooking();
    // dd($data);
    return view('view_admin.dashboard',compact('data'));
  }

  // admin list booked of dashboard
  public function booked(){
    $data = BookingModel::booked();
    return json_encode($data);
  
  }
  // admin booking room the method of menu
  public function roombooking(){
  // user PhongController get data 
   return view('view_admin.roombooking');

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
  


}
