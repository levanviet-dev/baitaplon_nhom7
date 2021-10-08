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
           
        // foreach($data as $row){
        //     $TenKH = $row['TenKH'];
        //     $SoDienThoai = $row['SoDienThoai'] ;
        //     $Email = $row['Email'] ;
        //     $ID_LoaiThe = $row['ID_LoaiThe'] ;
        //     $SoThe = $row['SoThe'] ;
        //     $DiaChi = $row['DiaChi'] ;
        // }
       
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

        
    }
  


}
