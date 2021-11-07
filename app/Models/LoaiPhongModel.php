<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\json_decode;

class LoaiPhongModel extends Model
{    protected $table = 'LoaiPhong';
    use HasFactory;
    public static function getalltyperoom(){
     $type = LoaiPhongModel::all();
      $data = array();
      foreach($type as $tr){
        $p = DB::table('Phong')->select('Anh')->inRandomOrder()->where('Phong.ID_LoaiPhong',$tr->ID)->first();
        if(!$p) continue;
          $room = array(
             "TenPhong" => $tr->TenLoai,
             "GiaTien" => $tr->GiaTien,
             "Anh" => $p->Anh
         );
        array_push($data,$room);
      //print_r($p);
     // print_r($p->Anh);
     // echo "<br><br>";
      }
      // dd($data);
      return $data;
    }


}
