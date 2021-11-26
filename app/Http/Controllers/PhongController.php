<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PhongModel;
use Illuminate\Support\Facades\Redirect;

class PhongController extends Controller
{
    //
    public function index(){
      $data = PhongModel::all();
      $cardtype = DB::select('select * from LoaiThe');
        return view('booking',compact('data'),compact('cardtype'));
    }
 // admin brach menu Room;
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
    // lấy số phòng qua id loại phục vụ cho chọn phòng bên admin/dashboard
    public function getnumroombytype($val){
       
       $data = PhongModel::getIdByType($val);
         return json_encode($data);
    }
    // lấy số giường
    public function getbed($val){
      $data = PhongModel::getnumbed($val);
     return json_encode($data);
    }
 // lấy tiền phòng
    public function getmoneyroom($idtype,$numroom){
     // echo "sada";
      $data = PhongModel::getmoney($idtype,$numroom);
      return json_encode($data);
    }
      // creat room by request form in modal tongle view admin/phòng
    public function create(Request $request){
     $ID_LoaiPhong = $request->ID_LoaiPhong;
     $SoPhong = $request->SoPhong;
     $Anh = $request->Anh;
     $SoGiuong = $request->SoGiuong;
     $SoNguoi = $request->SoNguoi;
     $Gia = $request->GiaTien;
     // validate data input
     if($SoPhong == ''||$Anh =='') {echo "<script> alert('Vui lòng nhập đầy đủ') </script>";
     return header("Refresh: 1;http://localhost:8080/baitaplon_nhom7/admin/roombooking");}
     // validate data in csdl

     $validate = DB::table('Phong')->where('ID_LoaiPhong',$ID_LoaiPhong)->where('SoPhong',$SoPhong)->first();
     if($validate){ echo "<script> alert('Vui lòng nhập lại số phòng') </script>";
     return header("Refresh: 1;http://localhost:8080/baitaplon_nhom7/admin/roombooking"); 
     }
     $data = PhongModel::createroom($ID_LoaiPhong,$SoPhong,$Anh,$SoGiuong,$SoNguoi,$Gia);
      echo "<script> alert('Tạo phòng thành công') </script>";
      return header("Refresh: 1;http://localhost:8080/baitaplon_nhom7/admin/roombooking");
    }

    //update room
    public function update(Request $request){
      $ID = $request->ID;
      $ID_LoaiPhong = $request->ID_LoaiPhong;
      $SoPhong = $request->SoPhong;
      $Anh = $request->Anh;
      $SoGiuong = $request->SoGiuong;
      $SoNguoi = $request->SoNguoi;
      $Gia = $request->GiaTien;
      // validate data input
      if($SoPhong == ''||$Anh =='') {echo "<script> alert('Vui lòng nhập đầy đủ') </script>";
      return header("Refresh: 1;http://localhost:8080/baitaplon_nhom7/admin/roombooking");}
      // validate data in csdl
 
      // $validate = DB::table('Phong')->where('ID_LoaiPhong',$ID_LoaiPhong)->where('SoPhong',$SoPhong)->first();
      // if($validate){ echo "<script> alert('Vui lòng nhập lại số phòng') </script>";
      // return header("Refresh: 1;http://localhost:8080/baitaplon_nhom7/admin/roombooking"); 
      // }
      $data = PhongModel::updateroom($ID,$ID_LoaiPhong,$SoPhong,$Anh,$SoGiuong,$SoNguoi,$Gia);
       echo "<script> alert('Tạo phòng thành công') </script>";
       return header("Refresh: 0.2;http://localhost:8080/baitaplon_nhom7/admin/roombooking");
     
    }
    
    public function delete($ID){
       PhongModel::where('ID',$ID)->delete();
      
    }




}
