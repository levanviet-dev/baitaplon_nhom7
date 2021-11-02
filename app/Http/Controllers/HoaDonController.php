<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\HoaDonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function updatebillpayed($ID_HoaDon,$hinhthuc){
       $price = HoaDonModel::getmoneyHoaDon($ID_HoaDon);
       $data = json_decode(json_encode($price),true);
       $Totalprice = $data[0]['TongTien'];
       //$hinhthuc = json_decode($hinhthuc);
       //dd($Totalprice);
       HoaDonModel::updatebillpay($ID_HoaDon,$Totalprice,$hinhthuc);
       return 1;
    }

    // lay tong tien theo thang
   public function getrevenue(){
    $data = HoaDonModel::getrevenue();
    return json_encode($data);
   }


}
