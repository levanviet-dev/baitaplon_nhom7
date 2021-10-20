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
        // create bill

        $idbill = -1;
        if(!DB::table('hoadon')->first()){
            $idbill = 0;
        }
        else{
            $querys = "CAST(ID AS int) DESC";
        $idbill = DB::table('HoaDon')->orderByRaw($querys)->take(1)->value('ID');
        $idbill = ++$idbill;
        }
        $IDBILL = $idbill;
        // caculator bill of customer
        $book = DB::table('booking')->where('ID',$idBooking)->first();
        $phong = DB::table('phong')->where('ID_LoaiPhong',$book->ID_LoaiPhong)
        ->where('SoPhong',$book->SoPhong)->first();
        $giaphong = $phong->GiaTien;
        $loaiphong = DB::table('LoaiPhong')->where('ID',$phong->ID_LoaiPhong)->first();
        // caculator day
        $first_date = strtotime($book->CheckIn);
        $second_date = strtotime($book->CheckOut);
        $datediff = abs($first_date - $second_date);
        $day =  floor($datediff / (60*60*24))==0?1:floor($datediff / (60*60*24));
        $service = DB::table('dichvu')->where('ID',$book->ID_DichVu)->first();
        $moneyservice = $service->GiaTien;
        //
        $total = ($moneyservice+$giaphong*$day);
        // end
         DB::table('HoaDon')->insert([
           'ID' => $IDBILL,
           'ID_KH' => $ID,
           'TongTien' => $total,
           'GhiChu' => 'Chưa thanh toán',
           'TrangThai' => '0',
           'ID_Booking'=> $idBooking,
         ]);




        
    }
  
  public static function getall(){
    $data = DB::select("select khachhang.ID,TenKhachHang,SoDienThoai,Email,SoThe,DiaChi,
    loaithe.TenLoai from khachhang,loaithe where khachhang.ID_LoaiThe = loaithe.ID");

   return $data;

  }

}
