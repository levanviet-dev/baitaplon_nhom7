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
use App\Models\LoaiPhongModel;
use App\Models\PhongModel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

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
    // khách đến nhiều
    $cusfq = KhachHangModel::getvisitorfq();
    //dd($cusfq);
    return view('view_admin.customer',['cusfq'=>$cusfq])->with('data', $data);;
  }
  

  // lien he
  public function adcontact(){
    $data = DB::table('lienhe')->where('TrangThai','=',0)->get();
    //dd($data);
    return view('view_admin.adcontact',compact('data')) ; 
  }
 // thong tin ve danh sach tài khoản
  public function account(){
    $data = DB::table('taikhoan')->get();
    return view('view_admin.account',compact('data'));
  }
// function sent mail for person
  public function sentmail(Request $request){
  //  echo  $request->email;
  //  echo $request->name;
  //  echo $request->title;
  //  echo $request->content;
      
    // Mail::send('view_admin.email',[
    //     'name'=> $request->name,
    //     'content'=> $request->content,
    //   ],function($mail) use($request){
    //      $mail->to($request->email,$request->name);
    //      $mail->from('hotrokhachhang3211@gmail.com');
    //      $mail->subject($request->title);
    //   });
    DB::table('lienhe')->where('ID','=',$request->ID)->update([
      'TrangThai' => 1
    ]); 
    return Redirect()->route('adcontact');
     


 }



}
