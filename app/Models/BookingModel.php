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
    $data = DB::table('booking')->join('loaiphong','booking.ID_LoaiPhong','=','loaiphong.ID')
    ->join('DichVu','booking.ID_DichVu','=','DichVu.ID')->join('LoaiThe','booking.ID_LoaiThe','=','LoaiThe.ID')
    ->where('booking.TrangThai','=','0')->orderBy('CheckIn')
    ->select('Booking.ID','TenKH','SoDienThoai','Email','CheckIn', 'CheckOut',
    'TrangThai','SoThe','TenDichVu','SoPhong', 'booking.SoNguoi',DB::raw('LoaiThe.TenLoai "LoaiThe"'),
    'TrangThai',DB::raw( 'loaiphong.TenLoai "LoaiPhong"'), DB::raw('loaiphong.ID "loaiphongID"'),'DiaChi', DB::raw('booking.SoGiuong  "SoGiuong"' ),
    DB::raw('(loaiphong.giatien+dichvu.giatien) "GiaTien"'),DB::raw( 'dichvu.GiaTien "TienDV"'))->paginate(5);
    //dd($data); 
    return $data;
    }
    // function get list booked room
    public static function booked(){
        $data = DB::table('booking')->join('loaiphong','booking.ID_LoaiPhong','=','loaiphong.ID')
        ->join('DichVu','booking.ID_DichVu','=','DichVu.ID')->join('LoaiThe','booking.ID_LoaiThe','=','LoaiThe.ID')
        ->where('booking.TrangThai','=','1')->orderBy('ThoiGian')
        ->select('Booking.ID','TenKH','SoDienThoai','Email','CheckIn', 'CheckOut',
        'TrangThai','SoThe','TenDichVu','SoPhong', 'booking.SoNguoi',DB::raw('LoaiThe.TenLoai "LoaiThe"'),
        'TrangThai',DB::raw( 'loaiphong.TenLoai "LoaiPhong"'), DB::raw('loaiphong.ID "loaiphongID"'),'DiaChi', DB::raw('booking.SoGiuong  "SoGiuong"' ),
        DB::raw('(loaiphong.giatien+dichvu.giatien) "GiaTien"'),DB::raw( 'dichvu.GiaTien "TienDV"'))->paginate(2);
       return $data;
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
    // function seach
    public static function search($key){
        $data = DB::table('booking')->join('loaiphong','booking.ID_LoaiPhong','=','loaiphong.ID')
        ->join('DichVu','booking.ID_DichVu','=','DichVu.ID')->join('LoaiThe','booking.ID_LoaiThe','=','LoaiThe.ID')
        ->where('booking.TrangThai','=','0')->orderBy('ThoiGian')->where('booking.TenKH','LIKE','%'.$key.'%')
        ->select('Booking.ID','TenKH','SoDienThoai','Email','CheckIn', 'CheckOut',
        'TrangThai','SoThe','TenDichVu','SoPhong', 'booking.SoNguoi',DB::raw('LoaiThe.TenLoai "LoaiThe"'),
        'TrangThai',DB::raw( 'loaiphong.TenLoai "LoaiPhong"'), DB::raw('loaiphong.ID "loaiphongID"'),'DiaChi', DB::raw('booking.SoGiuong  "SoGiuong"' ),
        DB::raw('(loaiphong.giatien+dichvu.giatien) "GiaTien"'),DB::raw( 'dichvu.GiaTien "TienDV"'))->paginate(5);
        //dd($data); 
        return $data;

    }

}
