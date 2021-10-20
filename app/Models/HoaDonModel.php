<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class HoaDonModel extends Model
{   protected $table = 'HoaDon';
    use HasFactory;
    public static function createHoaDon(){
         // chưa biết fix lỗi kiểu gì nên đã gửi tọa hóa đơn sang khách hàng model
         //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
         
        // $id = -1;
        // if(!DB::table('hoadon')->first()){
        //     $id = 0;
        // }
        // else{
        //     $query = "CAST(ID AS int) DESC";
        // $id = HoaDonModel::orderByRaw($query)->take(1)->value('ID');
        // $id = ++$id;
        // }
        // $ID = $id;
        
        //  DB::table('HoaDon')->insert([
        //    'ID' => $ID,
        //    'ID_KH' => '1',
        //    'TongTien' => 1234,
        //    'GhiChu' => 'Email',
        //    'TrangThai' => '0',
        //    'ID_Booking'=> '1',
        //  ]);
        
        
        }

        public static function getallHoaDon(){
           $data = DB::select("select  hoadon.ID,hoadon.TongTien,booking.SoDienThoai, booking.TenKH,booking.SoDienThoai,
            booking.CheckIn,booking.CheckOut,booking.DiaChi , booking.SoPhong FROM hoadon, 
            booking WHERE hoadon.ID_Booking = booking.ID and hoadon.TrangThai = 0");
            return $data;
        }
        public static function getHoaDonThanhToan(){
            $data = DB::select("select  hoadon.ID,hoadon.TongTien,booking.SoDienThoai, booking.TenKH,booking.SoDienThoai,
            booking.CheckIn,booking.CheckOut,booking.DiaChi , booking.SoPhong FROM hoadon, 
            booking WHERE hoadon.ID_Booking = booking.ID and hoadon.TrangThai = 1");
            return $data;
        }
        public static function getmoneyHoaDon($ID_HoaDon){
               // todo

        }
}
