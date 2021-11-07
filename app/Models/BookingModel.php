<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
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
    and booking.TrangThai = "0" order by ThoiGian');
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
        DB::update("update booking set TrangThai = 1,SoPhong = '$numroom',CheckIn = CURRENT_DATE()  where ID = '$id' ");
        DB::update("update phong set TrangThai = 1 where ID = '$idroom'");
        return 1;
    }

    // function get data of customer for payment
    public static function customerpayment($idbook){
       DB::update("update booking set CheckOut = CURRENT_DATE() where ID = '$idbook'");
       $book = DB::table('booking')->where('ID',$idbook)->first();
       $phong = DB::table('phong')->where('ID_LoaiPhong',$book->ID_LoaiPhong)
       ->where('SoPhong',$book->SoPhong)->first();
       $giaphong = $phong->GiaTien;
       
       $loaiphong = DB::table('LoaiPhong')->where('ID',$phong->ID_LoaiPhong)->first();

       $first_date = strtotime($book->CheckIn);
       $second_date = strtotime($book->CheckOut);
       $datediff = abs($first_date - $second_date);
       $day =  floor($datediff / (60*60*24))==0?1:floor($datediff / (60*60*24));
       
       $service = DB::table('dichvu')->where('ID',$book->ID_DichVu)->first();
       $moneyservice = $service->GiaTien;
      // dd($moneyservice+$giaphong*$day);
       $data = array();
       array_Push($data, $book);
       array_Push($data, $phong);
       array_Push($data, $loaiphong);
       array_Push($data, ($moneyservice+$giaphong*$day));
        return $data;
       
    }
    // get numbers of customer went to my hotel
    public static function getNumCusWentto($year){
      $allnum = DB::table('booking')->select('*')->where(DB::raw('YEAR(CheckOut)'),$year)->count();
      $dontwent = DB::table('booking')->select('*')->where(DB::raw('YEAR(CheckOut)'),$year)->where('TrangThai',false)->count();
      $arr = array();
      array_push($arr,$dontwent);
      array_push($arr,($allnum-$dontwent));
      return $arr;
    }

}
