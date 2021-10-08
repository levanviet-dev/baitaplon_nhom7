<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BookingModel;
use App\Models\KhachHangModel;
use phpDocumentor\Reflection\Types\Null_;

class BookingController extends Controller
{
    //
    public function index(){
        $data = BookingModel::all();
        $cardtype = DB::select('select * from LoaiThe');
        $roomtype = DB::table('loaiphong')->get();
        $service = DB::table('dichvu')->get();
          return view('booking',['cardtypes'=>$cardtype,
          'roomtype'=>$roomtype,'service'=>$service]);
    }

    public function create(Request $request){
        // create booking room for person
        $data = new BookingModel;
        $id = $this->getIDs();
        if($id == -1) $id = 0;
        // chưa xử lý hết mới điền tạm
       // $ID = $id;
        $TenKH = "$request->name";
        $SoDienThoai = $request->phone;
        $Email = $request->email;
        $CheckIn = $request->cin;
        $CheckOut = $request->cout;
        $ID_LoaiThe = $request->cardtype;
        $ID_DichVu =  $request->service;
        $ID_LoaiPhong = $request->troom;
        $ThoiGian = '3';
        $TrangThai = false;
        $SoThe = $request->cardnumber; 
        $DiaChi = $request->address;
        $SoPhong = "0";
        $SoGiuong = $request->bed;
        $SoNguoi = $request->nperson;
        BookingModel::insert(
           [
              'ID' => $id,
              'TenKH'=> $TenKH,
              'SoDienThoai' =>$SoDienThoai,
              'Email' => $Email,
              'CheckIn' => $CheckIn,
              'CheckOut' => $CheckOut,
              'ID_LoaiThe' => $ID_LoaiThe,
              'ID_DichVu' => $ID_DichVu,
              'ID_LoaiPhong' => $ID_LoaiPhong,
              'TrangThai'=>$TrangThai,
              'SoThe' => $SoThe,
              'DiaChi'=> $DiaChi,
              'SoPhong'=> $SoPhong,
              'SoGiuong' =>$SoGiuong,
              'SoNguoi' => $SoNguoi
           ]

        );


        return $this->index();
    }
    protected function getIDs(){
        
        if(!BookingModel::orderBy('ThoiGian','DESC')->first()){
            return -1;
        }

        $id = BookingModel::orderBy('ThoiGian','DESC')->take(1)->value('ID');
        $id = ++$id;
      //  echo 'the old '.$id;
       return $id;
    }


    // function update booking in admin
    public function updatebook($id,$idroom){
    
    if($idroom== 'null'){

        return 0;
    }
        $data = BookingModel::updatebook($id,$idroom);
        KhachHangModel::creatCus($id);
        return 1;
    }
}
