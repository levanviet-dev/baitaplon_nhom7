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
     $data = DB::select("select SoPhong,TenLoai,TrangThai,KiemTra,SoNguoi,SoGiuong from phong,loaiphong
      where phong.ID_LoaiPhong = loaiphong.ID");
     //dd($data);
    return json_encode($data);
    }
}
