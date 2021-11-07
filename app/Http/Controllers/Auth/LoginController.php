<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function login(){
        session_start();
        //session_unset();
        return view('view_admin.login');
    }
    public function userLogin(Request $request){
      $username = $request->user;
      $password = $request->pass;
     //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
       // 
      $user = DB::table('TaiKhoan')->where('TaiKhoan',$username)->where('MatKhau',$password)->get();
      // handel connect to database and login;
      if(count($user)>0){
        session_start();
        $_SESSION["user"] = $user[0]->HoTen;
        //dd($user);
         return redirect('admin');
      }
      else{
          echo "<script>alert('ten tk mk khong chinh xac')</script>";
          return view('view_admin.login');
      }

    }
    public function logout(){
       session_start();
       session_destroy();
        return view('view_admin.login');
    }

}
