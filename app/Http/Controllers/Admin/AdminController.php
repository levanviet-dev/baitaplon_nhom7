<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingModel;
use Illuminate\Pagination\LengthAwarePaginator;
use  Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Rfc4122\NilUuid;

class AdminController extends Controller
{
    //
  public function dashboard(){
    $datas = DB::select('select Booking.ID,TenKH,SoDienThoai,Email,CheckIn, CheckOut,
    TrangThai,SoThe,TenDichVu,SoPhong, SoNguoi,LoaiThe.TenLoai "LoaiThe",
    TrangThai, loaiphong.TenLoai "LoaiPhong",DiaChi, 
    (loaiphong.giatien+dichvu.giatien) "GiaTien" 
    from Booking,LoaiPhong,DichVu,loaithe 
    where Booking.ID_LoaiPhong = LoaiPhong.ID and Booking.ID_DichVu = DichVu.ID and loaithe.ID = booking.ID_LoaiThe and booking.TrangThai = "0"');
   // dd($data);
   $data = new LengthAwarePaginator($datas,count($datas),5,null);
   $data->withPath('');
   //dd($data);
    return view('view_admin.dashboard',compact('data'));
  }
  public function booked(){
    $datas = DB::select('select Booking.ID,TenKH,SoDienThoai,Email,CheckIn, CheckOut,TrangThai,SoThe,TenDichVu,SoPhong,SoNguoi,LoaiThe.TenLoai "LoaiThe",TrangThai,loaiphong.TenLoai "LoaiPhong",DiaChi 
    from Booking,LoaiPhong,DichVu,loaithe 
    where Booking.ID_LoaiPhong = LoaiPhong.ID 
    and Booking.ID_DichVu = DichVu.ID 
    and loaithe.ID = booking.ID_LoaiThe
    and booking.TrangThai = "1"');
    return json_encode($datas);
  
  }
  public function roombooking(){
   return view('view_admin.roombooking');

  }


}
