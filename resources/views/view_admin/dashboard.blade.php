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
                                        <td>$d->CheckIn</td><td>$d->CheckOut</td><td data-id = ".$d->GiaTien.">$d->SoDienThoai</td><td>
                                            <button class="."selected"." data-id=".$d->ID.">OK</button>
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
                            Booked room <span class="bookedr"></span>
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
                    <h3>Danh sách đặt phòng</h3>

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
                        <tbody id="bookedroom">
                      
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> 
<script>
$( document ).ready(function(){
    
$(".selected").attr("data-toggle","modal");
$('.selected').attr("data-target","#myModal");
loadbookedroom();
$('.selected').click(function(){
var phone = $(this).closest('tr').find('td:nth-child(10)').text();
var name =$(this).closest('tr').find('td:first').text();
var adress = $(this).closest('tr').find('td:nth-child(4)').text();
var typeroom = $(this).closest('tr').find('td:nth-child(5)').text();
var card = $(this).closest('tr').find('td:nth-child(3)').text();
var money = $(this).closest('tr').find('td:nth-child(10)').data("id")+"VND";
//alert(id);
var title = "Xác nhận đặt phòng";
$('.modal-title').html(title);
var str = "<table><tr><td> <label>Số điện thoại khách hàng: </label> </td><td> <input value= "+phone+">  </td><tr>";
  
  str += "<tr> <td> <label>Tên khách hàng: </label> </td><td> "+name+" </td></tr>";
  str += "<tr> <td> <label>Địa chỉ: </label> </td><td> "+adress+"  </td></tr>";
  str += "<tr> <td> <label>Loại phòng: </label> </td><td> "+typeroom+"  </td></tr>";
  str += "<tr> <td> <label>Số phòng: </label> </td><td> <input> </td></tr>";
  str += "<tr> <td> <label>Thẻ: </label> </td><td> "+card+"  </td></tr>";
  str += "<tr> <td> <label>Số tiền: </label> </td><td> "+money+"  </td></tr>";
  $('.modal-body').html(str);


});


});

function loadbookedroom(){
    console.log( "ready!" );
    $.ajax({
  url: 'http://localhost:81/baitaplon_nhom7/booked',
   datatype: 'JSON',
  success: function(data){
  var s = JSON.parse(data);
  var str = ""
  console.log(s[0]['ID']);
  for(let i = 0 ; i < s.length; i++){
  str += "<tr><td>"+s[i]['TenKH']+"</td>"
   +"<td>"+s[i]['Email']+"</td>"+"<td>"+s[i]['LoaiThe']+": "+s[i]['SoThe']+"</td>"+"<td>"+s[i]['DiaChi']+"</td>"+"<td>"+s[i]['LoaiPhong']+"</td>"
   + "<td>"+s[i]['SoNguoi']+"</td>"+"<td>"+s[i]['TenDichVu']+"</td>"+"<td>"+s[i]['CheckIn']+"</td>"
   +"<td>"+s[i]['CheckOut']+"</td>"+"<td>"+s[i]['SoDienThoai']+"</td>"+"<td><button class="+"btn btn-primary"+">OK</button></td>"
   +"</tr>";
    }
  $('#bookedroom').html(str);
  $('.bookedr').html(s.length);
    }

  });
}

</script>  
  



    @endsection