<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DichVuController extends Controller
{
    //
    public function getalldata(){
       $data = DB::table('dichvu')->get();
       return $data;
    }

    public function create(Request $request){
        $ID = $request->iddv;
        $tendv = $request->tendv;
        $tien = $request->giadv;
       // echo 'hello'.$ID.$tendv.$tien;
        DB::table('dichvu')->insert([
            'ID'=>$ID,
            'TenDichVu' => $tendv,
            'GiaTien' => $tien, 
        ]);
        return Redirect()->route('service');
      
    } 
    public function edit(Request $request){
        $ID = $request->iddv;
        $tendv = $request->tendv;
        $tien = $request->giadv;
       // echo 'hello'.$ID.$tendv.$tien;
        DB::table('dichvu')->where('ID','=',$ID)->update([
            'TenDichVu' => $tendv,
            'GiaTien' => $tien,    

        ]);
        return Redirect()->route('service');
    }
    public function delete($id){
        DB::table('dichvu')->where('ID','=',$id)->delete();
        return 1;
    }
}
