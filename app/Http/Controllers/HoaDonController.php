<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\HoaDonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HoaDonController extends Controller
{
    // this function was change to Admin/AdminController function payment
    public function getallHoaDon(){
    
    }
    
    public function getmoneybyIDHD($ID_HoaDon){
       $data = HoaDonModel::getmoneyHoaDon($ID_HoaDon);
       return json_encode($data);
    }
    //update bill when customer payed;
    public function updatebillpayed($ID_HoaDon,$hinhthuc,$giamgia){
       $price = HoaDonModel::getmoneyHoaDon($ID_HoaDon);
       $data = json_decode(json_encode($price),true);
       $Totalprice = $data[0]['TongTien'];
       $Totalprice = $Totalprice - $Totalprice*$giamgia/100;
       //$hinhthuc = json_decode($hinhthuc);
       //dd($Totalprice);
       HoaDonModel::updatebillpay($ID_HoaDon,$Totalprice,$hinhthuc,$giamgia);
       return 1;
    }

    // lay tong tien theo thang
   public function getrevenue(){
    $data = HoaDonModel::getrevenue();
    return json_encode($data);
   }
   //in hoa don
   public function printHD($ID){
      $HoaDon = HoaDonModel::where('ID','=',$ID)->first();
      $booking = BookingModel::WHERE('ID','=',$HoaDon['ID_Booking'])->first();
      $dichvu  = DB::table('dichvu')->where('ID','=',$booking['ID_DichVu'])->first();
      $giaphong = DB::table('phong')->where('ID_LoaiPhong','=',$booking['ID_LoaiPhong'])
      ->where('SoPhong','=',$booking['SoPhong'])->first();
    //dd($data);
        return view('view_admin/print',['HoaDon'=>$HoaDon,
        'booking'=>$booking,'dichvu'=>$dichvu,'phong'=>$giaphong]);
   }

}
