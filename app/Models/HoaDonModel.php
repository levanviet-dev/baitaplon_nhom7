<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class HoaDonModel extends Model
{   protected $table = 'HoaDon';
    use HasFactory;
    public static function createHoaDon($ID,$idBooking){
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
        // get all bill payment
        public static function getallHoaDon(){
           $data = DB::select("select  hoadon.ID,hoadon.TongTien, booking.TenKH,booking.SoDienThoai,dichvu.TenDichVu,
            booking.CheckIn,booking.CheckOut,booking.DiaChi , booking.SoPhong FROM hoadon, 
            booking,dichvu WHERE hoadon.ID_Booking = booking.ID and hoadon.TrangThai = 0 AND dichvu.ID = booking.ID_DichVu");
            return $data;
        }
        // get all bill payed
        public static function getHoaDonThanhToan(){
            $data = DB::select("select  hoadon.ID,hoadon.TongTien, booking.TenKH,booking.SoDienThoai,dichvu.TenDichVu,
            hoadon.GhiChu,booking.CheckIn,booking.CheckOut,booking.DiaChi , booking.SoPhong FROM hoadon, 
            booking,dichvu WHERE hoadon.ID_Booking = booking.ID and hoadon.TrangThai = 1 AND dichvu.ID = booking.ID_DichVu");
            return $data;
        }
        // get money bill by id bill
        public static function getmoneyHoaDon($ID_HoaDon){
               // todo
            $data = DB::select("select (phong.GiaTien* CASE DATEDIFF(CURRENT_DATE(),booking.CheckIn) 
            WHEN 0 then 1 ELSE DATEDIFF(CURRENT_DATE(),booking.CheckIn) END +dichvu.GiaTien) "."TongTien"."
            from booking,phong,dichvu,hoadon WHERE booking.SoPhong = phong.SoPhong 
            AND booking.ID_DichVu = dichvu.ID AND booking.ID_LoaiPhong = phong.ID_LoaiPhong 
            AND booking.ID = hoadon.ID_Booking AND hoadon.ID = '$ID_HoaDon'");

        //  $data=   DB::table('booking')->select("(phong.GiaTien* CASE DATEDIFF(CURRENT_DATE(),booking.CheckIn) 
        //     WHEN 0 then 1 ELSE DATEDIFF(CURRENT_DATE(),booking.CheckIn) END +4444444444444445yhjvgf.GiaTien)")
        //     ->join('HoaDon','booking.ID','=','hoadon.ID_Booking')
        //     ->join('phong','phong.SoPhong','=','Booking.SoPhong')
        //     ->join('dichvu','booking.ID_DichVu','=','dichvu.ID')
        //     ->where('phong.ID_LoaiPhong','booking.ID_LoaiPhong')
        //     ->where('hoadon.ID',$ID_HoaDon)->get();
            return $data;
        }
        // update bill when customer pay money
        public static function updatebillpay($ID_HoaDon,$Totalprice,$cach){
         $HoaDon = DB::table('hoadon')->where('ID',$ID_HoaDon)->first();
         $Booking = DB::table('booking')->where('ID',$HoaDon->ID_Booking)->first();
         //
         $hinhthucthanhtoan = 'Thanh toán bằng tiền mặt lúc ';
            if($cach == 1) $hinhthucthanhtoan = 'Thanh toán qua thẻ lúc ';
            $hinhthucthanhtoan .= date('Y-m-d');
         //
         DB::update("Update booking set TrangThai = '2',CheckOut = CURRENT_DATE() where ID = '$HoaDon->ID_Booking'");
         DB::update("update phong set TrangThai = '0' where ID_LoaiPhong = '$Booking->ID_LoaiPhong'
         AND SoPhong = '$Booking->SoPhong'");
         DB::update("update hoadon set TrangThai = '1', TongTien = '$Totalprice',
         GhiChu = '$hinhthucthanhtoan' where ID = '$ID_HoaDon'");
        }
}
