<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BookingModel;
use App\Models\KhachHangModel;
use App\Http\Controllers\HoaDonController;
use App\Models\HoaDonModel;
use GrahamCampbell\ResultType\Success;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Stmt\Global_;

class BookingController extends Controller
{   
    // hàm lấy các giá trị trả về trang khách hàng đặt phòng
    public function index(){
        $data = BookingModel::all();
        $cardtype = DB::select('select * from LoaiThe');
        $roomtype = DB::table('loaiphong')->get();
        $service = DB::table('dichvu')->get();
          return view('booking',['cardtypes'=>$cardtype,
          'roomtype'=>$roomtype,'service'=>$service]);
    }
    // hàm tạo đơn đặt phòng
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
        echo '<script> alert("Cảm ơn bạn đã sử dụng dịch vụ. Chúng tôi sẽ liên lạc bạn sớm") </script>';
        return $this->index();
    }
    //Hàm lấy id mới
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
    public function updatebook($idbook,$idroom){
    if($idroom== 'null'){
        return 0;
    }
        $data = BookingModel::updatebook($idbook,$idroom);
         $IDKH = KhachHangModel::creatCus($idbook);
        //$IDHD = HoaDonModel::getIDs();
        HoaDonModel::createHoaDon($IDKH,$idbook);
        return 1;
    }
    // get data customer want payment
    function customerpayment($idbook){
      $data = BookingModel::customerpayment($idbook);
      return json_encode($data);
      // tomorow Complete the payment list

    }
    //function get nums of customer went to the hotel
    function getnumcuswentto($year){
       $data =  BookingModel::getNumCusWentto($year);  
       return json_encode($data);
    }
    // Hàm xóa đơn đặt phòng
    function delete(Request $request){
      $ID = $request->id;
      DB::table('booking')->where('ID','=',$ID)->update(['TrangThai'=> 3]);
       header('Location: admin');
       exit();
    }    
}
