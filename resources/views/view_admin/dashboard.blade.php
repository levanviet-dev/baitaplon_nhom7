@extends('layouts.ladmin')

@section('main_admin')
    

<div class="panel-body">
    <div class="panel-group" id="accordion">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <button class="btn btn-default" type="button">
                            New Room Bookings <span class="badge">{{count($data)}}</span>
                        </button>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                <div class="panel-body">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                               <div class="form-group">
                                 <label for="">Search</label>
                                 <input type="text">
                                 <button type="submit">Search</button>
                               </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Card number</th>
                                            <th>Address</th>
                                            <th>Room</th>
                                            <th>Amount of people</th>
                                            <th>Service</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Phone number</th>
                                            <th>More</th>

                                        </tr>
                                    </thead>
                                    <tbody id="bookroom">
                                   <?php
                                  
                                   foreach ($data as $d) {
                                       # code...
                                     echo "
                                     <tr><td>$d->TenKH</td><td>$d->Email</td><td>$d->LoaiThe : $d->SoThe</td>
                                        <td>$d->DiaChi</td><td>$d->LoaiPhong</td><td>$d->SoNguoi</td><td>$d->TenDichVu</td>
                                        <td>$d->CheckIn</td><td>$d->CheckOut</td><td>$d->SoDienThoai</td><td>
                                            <button>OK</button>
                                            </td>
                                     ";


                                   }
                                    ?>
                                    </tbody>
                                    
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $data->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End  Basic Table  -->
                </div>
            </div>
        </div>
       
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                        <button class="btn btn-primary" type="button">
                            Rooms <span class="badgeroom"></span>
                        </button>

                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                  <div class="form-group">
                    <label for="">Search</label>
                    <input type="text"
                      name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <h3>Danh sách phòng trống</h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Loại Phòng</th>
                                <th>Số phòng</th>
                                <th>Số người</th>
                                <th>Số giường</th>
                                <th>Trạng thái</th>
                                <th>More</th>
                                
                            </tr>
                        </thead>
                        <tbody id="rooms">
                     
                        </tbody>
                        
                    </table>



                    <h3>Danh sách phòng đang sử dụng</h3>  
                </div>

            </div>

        </div>
        
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                        <button class="btn btn-primary" type="button">
                            Followers <span class="badge">5</span>
                        </button>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Follow Start</th>
                                        <th>Permission status</th>


                                    </tr>
                                </thead>
                                <tbody>

                                   

                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary">More Action</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>

// $( document ).ready(function() {
//     console.log( "ready!" );
//     $.ajax({
//   url: 'http://localhost:8080/myhotel/admin/dashboard',
//   datatype: 'JSON',
//   success: function(data){
//   var s = JSON.parse(data);
//   var str = ""
// console.log(s[0]['ID']);
// for(let i = 0 ; i < s.length; i++){
//  str += "<tr><td>"+s[i]['TenKH']+"</td>"
//  +"<td>"+s[i]['Email']+"</td>"+"<td>"+s[i]['LoaiThe']+": "+s[i]['SoThe']+"</td>"+"<td>"+s[i]['DiaChi']+"</td>"+"<td>"+s[i]['LoaiPhong']+"</td>"
//  + "<td>"+s[i]['SoNguoi']+"</td>"+"<td>"+s[i]['TenDichVu']+"</td>"+"<td>"+s[i]['CheckIn']+"</td>"
//  +"<td>"+s[i]['CheckOut']+"</td>"+"<td>"+s[i]['SoDienThoai']+"</td>"+"<td><button class="+"btn btn-primary"+">OK</button></td>"
//  +"</tr>"
// }
// $('#bookroom').html(str);
//  $('.badge').html(s.length) 
//   }
// });
// });
$( document ).ready(function() {
 loadroom();
});
function loadroom(){
   console.log( "ready!" );
    $.ajax({
  url: 'http://localhost:8080/myhotel/getroom',
  datatype: 'JSON',
  success: function(data){
  var s = JSON.parse(data);
  var str = ""
  
for(let i = 0 ; i < s.length; i++){
 str += "<tr><td>"+s[i]['TenLoai']+"</td>"
 +"<td>"+s[i]['SoPhong']+"</td><td>"+s[i]['SoNguoi']
 +"</td><td>"+s[i]['SoGiuong']+"</td><td>"+s[i]['KiemTra']+"</td><td><button>Select"+
 "</button> <button>Update</button><button>Delete</button> </td></tr>"
 }
$('#rooms').html(str);
 $('.badgeroom').html(s.length) 
  }
});

}




 </script>



    @endsection