<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PhongModel;
class PhongController extends Controller
{
    //
    public function index(){
      $data = PhongModel::all();
      $cardtype = DB::select('select * from LoaiThe');
        return view('booking',compact('data'),compact('cardtype'));
    }

    public function getroom(){
     $data = DB::select("select phong.ID, phong.SoPhong,TenLoai,TrangThai,KiemTra,phong.SoNguoi,phong.SoGiuong from phong,loaiphong
      where phong.ID_LoaiPhong = loaiphong.ID and TrangThai = '0'");
     //dd($data);
    return json_encode($data);
    }
    public function bookedroom(){
      $data = DB::select("select phong.SoPhong,loaiphong.TenLoai,phong.TrangThai,phong.SoNguoi,phong.SoGiuong,TenKH
       from phong,loaiphong,booking
       where phong.ID_LoaiPhong = loaiphong.ID and booking.SoPhong = phong.SoPhong and phong.TrangThai = '1'");
      return json_encode($data);
    }
}
