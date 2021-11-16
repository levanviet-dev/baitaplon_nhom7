<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhongModel extends Model
{
    protected $table = 'phong';
    use HasFactory;
    // function get data room 
    public static function getroom(){
        $data = DB::select("select  phong.ID,phong.Anh,phong.GiaTien, phong.SoPhong,TenLoai,TrangThai,KiemTra,phong.SoNguoi,phong.SoGiuong from phong,loaiphong
        where phong.ID_LoaiPhong = loaiphong.ID and TrangThai = '0'");
        // $data = array_map(function($item){
        //     return (array) $item;
        // },$data);
        return $data;
    }
    // function get data room booked
    public static function getroombooked(){
        $data = DB::select("SELECT phong.ID,phong.SoPhong,loaiphong.TenLoai,phong.TrangThai,phong.SoNguoi,
        phong.SoGiuong,TenKH FROM booking ,
        (SELECT DISTINCT booking.SoPhong,booking.ID FROM booking WHERE TrangThai = 1 ORDER BY CheckIn DESC )
         as a,phong,loaiphong WHERE a.ID = booking.ID AND booking.ID_LoaiPhong = loaiphong.ID 
        AND booking.SoPhong = phong.SoPhong AND booking.ID_LoaiPhong = phong.ID_LoaiPhong"); 
        return $data;
    }
    //function get room by id type room
    public static function getIdByType($val){
        $data = DB::select("select phong.SoPhong,Phong.ID,phong.SoGiuong from phong, loaiphong 
        where phong.ID_LoaiPhong = LoaiPhong.ID and TrangThai = '0'
         and loaiphong.TenLoai = '$val'");
        return $data;       

    }
    //function get number bed of room
    public static function getnumbed($val){
      $data = DB::select("select distinct Phong.SoGiuong,GiaTien from phong where ID_LoaiPhong = '$val'"); 
      return $data;


    }
    // function get price of room by type room and number of beds
    public static function getmoney($typeroom,$numbed){
      $data = DB::select("Select GiaTien from phong where ID_LoaiPhong = '$typeroom' and ID = '$numbed'");      
     return $data;
    }
    // function create room

    public static function createroom($ID_LoaiPhong,$SoPhong,$Anh,$SoGiuong,$SoNguoi,$Gia){
        // get id
         $idr = -1;
         if(!DB::table('phong')->first()){
             $idr = 0;
         }
         else{
             $querys = "CAST(ID AS int) DESC";
         $idr = DB::table('phong')->orderByRaw($querys)->take(1)->value('ID');
         $idr = ++$idr;
         }
         $IDROOM = $idr;

         DB::table('Phong')->insert([
            'ID' => $IDROOM,
            'ID_LoaiPhong' => $ID_LoaiPhong,
            'SoPhong' => $SoPhong,
            'Anh' => $Anh,
            'TrangThai' => '0',
            'KiemTra'=> 'Bình thường',
            'SoGiuong' => $SoGiuong,
            'SoNguoi'=> $SoNguoi,
            'GiaTien' => $Gia,
            
          ]);
         return 1;


    }

    // edit room
    public static function updateroom($ID,$ID_LoaiPhong,$SoPhong,$Anh,$SoGiuong,$SoNguoi,$Gia){
      
         DB::table('phong')->where('ID',$ID)->update(array(
            'ID_LoaiPhong' => $ID_LoaiPhong,
            'SoPhong' => $SoPhong,
            'Anh' => $Anh,
            'TrangThai' => '0',
            'KiemTra'=> 'Bình thường',
            'SoGiuong' => $SoGiuong,
            'SoNguoi'=> $SoNguoi,
            'GiaTien' => $Gia
         ));
    
    }



    //todo

}
