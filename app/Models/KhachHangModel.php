<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysqli;

class KhachHangModel extends Model
{
    protected $table = 'KhachHang';
    use HasFactory;

    public static function creatCus($idBooking){
        
        $data = DB::table('booking')->where('ID',$idBooking)->first();
         // 
         $ID ="";
         $TenKH = "";
         $SoDienThoai = "";
         $Email = "";
         $ID_LoaiThe = "";
         $SoThe = "";
         $DiaChi ="";



              $TenKH = "$data->TenKH";
            $SoDienThoai = $data->SoDienThoai ;
            $Email = $data->Email ;
            $ID_LoaiThe = $data->ID_LoaiThe;
            $SoThe = $data->SoThe;
            $DiaChi = $data->DiaChi;
       
        $id = -1;
        if(!DB::table('KhachHang')->first()){
            $id = 0;
        }
        else{
            $query = "CAST(ID AS int) DESC";
        $id = KhachHangModel::orderByRaw($query)->take(1)->value('ID');
        $id = ++$id;
        }
        $ID = $id;
        
         DB::table('KhachHang')->insert([
           'ID' => $ID,
           'TenKhachHang' => $TenKH,
           'SoDienThoai' => $SoDienThoai,
           'Email' => $Email,
           'ID_LoaiThe' => $ID_LoaiThe,
           'SoThe'=> $SoThe,
           'DiaChi' => $DiaChi
           
         ]);
        return $ID;
    }
  
  public static function getall(){
    // $data = DB::select("select khachhang.ID,TenKhachHang,SoDienThoai,Email,SoThe,DiaChi,
    // loaithe.TenLoai from khachhang,loaithe where khachhang.ID_LoaiThe = loaithe.ID");

     $data = DB::table('KhachHang')->join('loaithe','khachhang.ID_LoaiThe',"=",'loaithe.ID')
     ->select('khachhang.ID','TenKhachHang','SoDienThoai','Email','SoThe','DiaChi',
      'loaithe.TenLoai')->paginate(5);
   return $data;
  }
  // Khách hàng tiềm năng tiêu chí vào ở nhiều lần
  public static function getvisitorfq(){
        $data = DB::select("SELECT TenKH,SoDienThoai,DiaChi,Email, 
        COUNT(SoDienThoai) as SoLan from booking WHERE TrangThai = 2 
        AND YEAR(CheckOut) = YEAR(CURRENT_DATE()) 
        GROUP BY TenKH,SoDienThoai,DiaChi,Email 
        HAVING COUNT(SoDienThoai) >= 3 ORDER BY COUNT(SoDienThoai) DESC");  
        return $data;
  }

}
