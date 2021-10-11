<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class BookingModel extends Model
{
    protected $table = 'booking';
    use HasFactory;
    // function get list booking
    public static function getbooking(){
        $datas = DB::select('select Booking.ID,TenKH,SoDienThoai,Email,CheckIn, CheckOut,
    TrangThai,SoThe,TenDichVu,SoPhong, booking.SoNguoi,LoaiThe.TenLoai "LoaiThe",
    TrangThai, loaiphong.TenLoai "LoaiPhong", loaiphong.ID "loaiphongID",DiaChi, booking.SoGiuong  "SoGiuong" ,
    (loaiphong.giatien+dichvu.giatien) "GiaTien", dichvu.GiaTien "TienDV" 
    from Booking,LoaiPhong,DichVu,loaithe 
    where Booking.ID_LoaiPhong = LoaiPhong.ID 
    and Booking.ID_DichVu = DichVu.ID 
    and loaithe.ID = booking.ID_LoaiThe 
    and booking.TrangThai = "0" order by ThoiGian desc');
     return $datas;
    }
    // function get list booked room
    public static function booked(){
        $datas = DB::select('select Booking.ID,TenKH,SoDienThoai,Email,CheckIn, 
        CheckOut,TrangThai,SoThe,TenDichVu,SoPhong,booking.SoNguoi,LoaiThe.TenLoai "LoaiThe",TrangThai,loaiphong.TenLoai "LoaiPhong",DiaChi 
        from Booking,LoaiPhong,DichVu,loaithe 
        where Booking.ID_LoaiPhong = LoaiPhong.ID 
        and Booking.ID_DichVu = DichVu.ID 
        and loaithe.ID = booking.ID_LoaiThe
        and booking.TrangThai = "1"');
       return $datas;
    }
   // function update bookroom set room for person booking
   // this is not success
    public static function updatebook($id,$idroom){
        $data = DB::select("select SoPhong from phong where ID = '$idroom'");
       foreach($data as $r)
        $numroom = $r->SoPhong; 
        DB::update("update booking set TrangThai = 1,SoPhong = '$numroom' where ID = '$id' ");
        DB::update("update phong set TrangThai = 1 where ID = '$idroom'");
        return 1;
    }
}
