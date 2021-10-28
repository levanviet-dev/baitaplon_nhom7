<?php

namespace App\Http\Controllers;

use App\Models\LoaiPhongModel;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{
    //

    public function gettyperoom(){
      $data = LoaiPhongModel::all();
        return json_encode($data);
    }
}
