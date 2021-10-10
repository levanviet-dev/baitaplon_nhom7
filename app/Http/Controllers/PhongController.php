<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PhongModel;
class PhongController extends Controller
{
    //
    public function index(){
      $data = PhongModel::all();
      $cardtype = DB::select('select * from LoaiThe');
        return view('booking',compact('data'),compact('cardtype'));
    }

    public function getroom(){
      // get list of available rooms
     $data = PhongModel::getroom();
     //dd($data);
    return json_encode($data);
    }
    public function bookedroom(){
      // get list of booked room
      $data = PhongModel::getroombooked(); 
         return json_encode($data);
    }
    public function getnumroombytype($val){
       
       $data = PhongModel::getIdByType($val);
         return json_encode($data);
    }

    public function getbed($val){
      $data = PhongModel::getnumbed($val);
     return json_encode($data);
    }

    public function getmoneyroom($idtype,$numroom){
     // echo "sada";
      $data = PhongModel::getmoney($idtype,$numroom);
      return json_encode($data);
    }
}
