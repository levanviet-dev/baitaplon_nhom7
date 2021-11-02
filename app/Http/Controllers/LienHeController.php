<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LienHeController extends Controller
{
    //
      public function create(Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $email  = $request -> email; 
        
        DB::table('lienhe')->insert([
          'TenKH' => $name,
          'SoDienThoai' =>$phone,
          'Email'=> $email
      ]);
    echo "<script> alert('Chúng tôi sẽ sớm liên lạc với bạn') </script>";
    return header("Refresh: 0.2;http://localhost:8080/baitaplon_nhom7/");
    // exit();
   // echo "Hello"; 
    }

    
  
}
