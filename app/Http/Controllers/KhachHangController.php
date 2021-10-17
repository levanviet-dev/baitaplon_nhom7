<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHangModel;
class KhachHangController extends Controller
{
    //

    public function getcustomer(){
       KhachHangModel::all();
    }
}
