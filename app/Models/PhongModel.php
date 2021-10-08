<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhongModel extends Model
{
    protected $table = 'phong';
    use HasFactory;
    // function get data room 
    public static function getroom(){
        $data = DB::select("select phong.ID, phong.SoPhong,TenLoai,TrangThai,KiemTra,phong.SoNguoi,phong.SoGiuong from phong,loaiphong
        where phong.ID_LoaiPhong = loaiphong.ID and TrangThai = '0'");
        return $data;
    }
    // function get data room booked
    public static function getroombooked(){
        $data = DB::select("select phong.SoPhong,loaiphong.TenLoai,phong.TrangThai,phong.SoNguoi,phong.SoGiuong,TenKH
        from phong,loaiphong,booking
        where phong.ID_LoaiPhong = loaiphong.ID and booking.SoPhong = phong.SoPhong and phong.TrangThai = '1'"); 
        return $data;
    }
    public static function getIdByType($val){
        $data = DB::select("select phong.SoPhong,Phong.ID from phong, loaiphong 
        where phong.ID_LoaiPhong = LoaiPhong.ID and TrangThai = '0'
         and loaiphong.TenLoai = '$val'");
        return $data;       

    }
    public static function getnumbed($val){
      $data = DB::select("select distinct Phong.SoGiuong from phong where ID_LoaiPhong = '$val'"); 
      return $data;


    }
}
