@extends('layouts.ladmin')

@section('main_admin')
    

<div class="panel-body">
    <div class="panel-group" id="accordion">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <button class="btn btn-default" type="button">
                            Room Bookings <span class="badge"></span>
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
                                        <th>Loại phòng</th>
                                        <th>Số phòng</th>
                                        <th>Khách hàng</th>
                                        <th>More</th>


                                    </tr>
                                </thead>
                                <tbody id="booked">

                                   

                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary">More Action</a>
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

                </div>

            </div>

        </div>
     
<div class="container">
    <!-- Trigger the modal with a button -->
   
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    




<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$( document ).ready(function() {
 loadroom();
 loadbookedroom();
});
function loadroom(){
   console.log( "ready!" );
    $.ajax({
  url: 'http://localhost:8080/baitaplon_nhom7/getroom',
  datatype: 'JSON',
  success: function(data){
  var s = JSON.parse(data);
  var str = ""
  
for(let i = 0 ; i < s.length; i++){
 str += "<tr><td>"+s[i]['TenLoai']+"</td>"
 +"<td>"+s[i]['SoPhong']+"</td><td>"+s[i]['SoNguoi']
 +"</td><td>"+s[i]['SoGiuong']+"</td><td>"+s[i]['KiemTra']+
 "</td><td><button onclick="+"selectroom('"+s[i]['ID']+"')"+" data-toggle="+"modal"+" data-target="+"#myModal"+">Select"+
 "</button> <button>Update</button><button>Delete</button> </td></tr>"
 }
$('#rooms').html(str);
 $('.badgeroom').html(s.length) 
  }
});
 }


function loadbookedroom(){
    console.log( "ready!" );
    $.ajax({
  url: 'http://localhost:8080/baitaplon_nhom7/bookedroom',
  datatype: 'JSON',
  success: function(data){
  var br = JSON.parse(data);
  var str = ""
  
for(let i = 0 ; i < br.length; i++){
 str += "<tr><td>"+br[i]['TenLoai']+"</td>"
 +"<td>"+br[i]['SoPhong']+"</td><td>"+br[i]['TenKH']
 +"</td><td><button>Select"+
 "</button> <button>Update</button><button>Delete</button> </td></tr>"
 }
$('#booked').html(str);
 $('.badger').html(br.length) 
  }
});

    
}

function selectroom(ID){
$(".modal-title").html("Chọn phòng: "+ID);
    console.log('click here');
var str = "<table><tr><td> <label>Số điện thoại khách hàng: </label> </td><td> <input>  </td><tr>";
  
    str += "<tr> <td> <label>Tên khách hàng: </label> </td><td> <input>  </td></tr>";
    str += "<tr> <td> <label>Địa chỉ: </label> </td><td> <input>  </td></tr>";
    str += "<tr> <td> <label>Loại phòng: </label> </td><td> <input>  </td></tr>";
    str += "<tr> <td> <label>Loại thẻ: </label> </td><td> <input>  </td></tr>";
    str += "<tr> <td> <label>Số thẻ: </label> </td><td> <input>  </td></tr>";
$(".modal-body").html(str);


var footer = "<button type="+"button"+" class="+"btn btn-default"+" data-dismiss="+"modal"+">OK</button>";
 footer += "<button type="+"button"+" class="+"btn btn-default"+" data-dismiss="+"modal"+">Close</button>"
$(".modal-footer").html(footer);
}


 </script>



    @endsection