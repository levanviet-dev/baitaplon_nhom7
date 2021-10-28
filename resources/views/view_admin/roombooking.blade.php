@extends('layouts.ladmin')

@section('main_admin')
    

<div class="panel-body">
    <div class="panel-group" id="accordion">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <button class="btn btn-default" type="button">
                            Phòng đang dùng <span class="badge"></span>
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
                                <h3>Danh sách phòng đang hoạt động</h3>
                               </div>
                               <div class="form-group"> 
                                 <label for="">Tìm kiếm</label>
                                 <input type="text">
                                 <button type="submit">Tìm kiếm</button>
                               </div>
                               <table class="table">
                                <thead>
                                    <tr>
                                        <th>Loại phòng</th>
                                        <th>Số phòng</th>
                                        <th>Khách hàng</th>
                                        {{-- <th>Tính năng</th> --}}


                                    </tr>
                                </thead>
                                <tbody id="booked">

                                   

                                </tbody>
                            </table>
                            {{-- <a href="#" class="btn btn-primary">More Action</a> --}}
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
                            Phòng <span class="badgeroom"></span>
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
                                <th>Tính năng</th>
                                
                            </tr>
                        </thead>
                        <tbody id="rooms">
                     
                        </tbody>
                        
                    </table>
                    <button id="createroom" class="btn btn-primary"  data-toggle="modal" data-target="#myModal">Tạo phòng</button>
                  </div>

            </div>

        </div>
     
<div class="container">
    <!-- Trigger the modal with a button -->
  
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
       <form method="POST" action="createroom" id="submitroom">
       @csrf
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="create" data-dismiss="modal">Tạo phòng</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          </div>
        </form>
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
 +"</td><td>"+s[i]['SoGiuong']+"</td><td>"+s[i]['KiemTra']
 +"</td><td><button class=btn btn-info btn-lg'><span class='glyphicon glyphicon-wrench'></span></button>"
 +"<button class=btn btn-info btn-lg'><span  class='glyphicon glyphicon-trash'></span></button> </td></tr>"
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
 +"<td>"+br[i]['SoPhong']+"</td><td>"+br[i]['TenKH']+"</td>" 
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


var footer = "<button type="+"button"+" class="+"btn btn-default"+" data-dismiss="+"modal"+">Chọn</button>";
 footer += "<button type="+"button"+" class="+"btn btn-default"+" data-dismiss="+"modal"+">Đóng</button>"
$(".modal-footer").html(footer);
}

// create room
$('#createroom').click(function(){
var title = "Tạo phòng mới";
$(".modal-title").html(title);
//
$.ajax({
  url: 'http://localhost:8080/baitaplon_nhom7/gettyperoom',
  datatype: 'JSON',
  success: function(data){
  var tr = JSON.parse(data);
  var str = "";
  for(let i = 0 ; i < tr.length; i++){
      str+=  "<option value='"+tr[i]['ID']+"'>"+tr[i]['TenLoai']+"</option>"
  }
 // console.log(str);
var strcreate = "<table class='table'><tr><td> <label>Loại phòng:</label> </td><td> <select name='ID_LoaiPhong'>"+str+"</select> </td></tr>";
    strcreate += "<tr> <td> <label>Số phòng: </label> </td><td> <input name='SoPhong' required>  </td></tr>";
    strcreate += "<tr> <td> <label>Ảnh: </label> </td><td> <input name='Anh' required>  </td></tr>";
    strcreate += "<tr> <td> <label>Số người: </label> </td><td> <input name='SoNguoi' type='number' min='1' value='1' required> </td></tr>";
    strcreate += "<tr> <td> <label>Số giường: </label> </td><td>  <select name='SoGiuong'> "+
    "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>"+
    "<option value='4'>4</option></select>  </td></tr>";
    strcreate += "<tr> <td> <label>Giá tiền(VND): </label> </td><td> <input name='GiaTien' type='number' min='1000' value='10000'>  </td></tr></table>";
  $(".modal-body").html(strcreate);
  
//  var footer = "<button type="+"submit"+" class="+"btn btn-default" +" data-dismiss="+"modal"+">Tạo phòng</button>";
//   footer += "<button type="+"button"+" class="+"btn btn-default"+" data-dismiss="+"modal"+">Đóng</button>"
//  $(".modal-footer").html(footer);

  }
});
//

});

 $('#create').click(function(){

$('#submitroom').submit();
//  var ID_LoaiPhong = $('.modal-content').find('tr:first').find('option:selected').data('id');
//  var SoPhong = $('.modal-content').find('tr:nth-child(2)').find('input').val();
//  var Anh = $('.modal-content').find('tr:nth-child(3)').find('input').val();
//  var SoNguoi = $('.modal-content').find('tr:nth-child(4)').find('input').val();
//  var SoGiuong = $('.modal-content').find('tr:nth-child(5)').find('option:selected').val();
//  var GiaTien = $('.modal-content').find('tr:nth-child(6)').find('input').val();
//  //console.log( SoGiuong);
//  var urls = '/'+ID_LoaiPhong+'/'+SoPhong+'/'+Anh+'/'+SoNguoi+'/'+SoGiuong+'/'+GiaTien; 
//   console.log(urls);
//  $.ajax({
//   url: 'http://localhost:8080/baitaplon_nhom7/admin/createroom'+urls,
//   type : "post",
//   dataType:"text",
//   success: function(data){
  
//   }

//  })
   
 });


 </script>


    @endsection