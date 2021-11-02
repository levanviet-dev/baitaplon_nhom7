@extends('layouts.ladmin')

@section('main_admin')
    

<div class="panel-body">
    <div class="panel-group" id="accordion">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <button class="btn btn-default" type="button">
                            Hóa đơn đang sử dụng <span class="badge"></span>
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
                                 <label for="">Tìm kiếm</label>
                                 <input type="text">
                                 <button type="submit">Tìm kiếm</button>
                               </div>
                               <h3>Hóa đơn hiện tại</h3>
                               <table class="table">
                                <thead>
                                    <tr>
                                                <th>Tên khách hàng</th>
                                                <th>Địa chỉ</th>
                                                <th>Phòng </th>
                                                <th>Ngày vào</th>
                                                <th>Ngày ra</th>
                                                <th>Số điện thoại</th>
                                                <th>Tổng tiền</th>
                                                <th>Tính năng</th>

                                    </tr>
                                </thead>
                                <tbody id="listpayment">
                                 <?php
                                  foreach ($data as $p) {
                                    # code...
                                    echo "<tr><td data-id ='$p->ID'>$p->TenKH</td><td>$p->DiaChi</td>
                                      <td data-id='$p->TenDichVu'>$p->SoPhong</td><td>$p->CheckIn</td>
                                      <td>$p->CheckOut</td><td>$p->SoDienThoai</td>
                                      <td>$p->TongTien</td>
                                      <td><button class ='payment' data-toggle = 'modal' data-target = '#myModal'>Thanh toán</button></td></tr>";
                                  }
                                  ?>
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
                            Hóa đơn đã thanh toán <span class="badgeroom"></span>
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
                    <h3>Hóa đơn đã thanh toán</h3>

                    <table class="table">
                        <thead>
                          <tr>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Phòng </th>
                            <th>Ngày vào</th>
                            <th>Ngày ra</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Thông báo</th>
                            <th>Tính năng</th>
                          </tr>
                        </thead>
                        <tbody id="rooms">
                          <?php
                          foreach ($dathanhtoan as $p) {
                            # code...
                            echo "<tr><td data-id ='$p->ID'>$p->TenKH</td><td>$p->DiaChi</td>
                              <td>$p->SoPhong</td><td>$p->CheckIn</td>
                              <td>$p->CheckOut</td><td>$p->SoDienThoai</td>
                              <td>$p->TongTien</td><td>$p->GhiChu</td>
                              <td><button class ='payed' data-toggle = 'modal' data-target = '#myModal'>In</button></td></tr>";
                          }
                          
                          
                          
                          
                          ?>
                        </tbody>
                        
                    </table>

                </div>

            </div>

        </div>
          {{-- chart booking --}}
          <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                        <button class="btn btn-primary" type="button">
                            Biểu đồ doanh thu <span class="badge"></span>
                        </button>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <h3>Doanh thu trong năm <?php
                                echo date('Y'); 
                                ?></h3>
                            <div >
                                <canvas id="myChart"style="height: 10em;"></canvas>
                              </div>               
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        {{-- end --}}



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
            <button id="cuspay" type="button" class="btn btn-default"
            data-dismiss="modal">Thanh toán</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          </div>
        </div>
        
      </div>
    </div>
    




<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
// payment
var idHoaDon = '';
$('.payment').click(function(){
  var name = $(this).closest('tr').find('td:first').text();
  idHoaDon = $(this).closest('tr').find('td:first').data('id');
$('.modal-title').html('Thanh toán hóa đơn: '+name);
 var id =  $(this).closest('tr').find('td:first').data('id');
 var diachi = $(this).closest('tr').find('td:nth-child(2)').text();
 var sophong = $(this).closest('tr').find('td:nth-child(3)').text();
 var dichvu = $(this).closest('tr').find('td:nth-child(3)').data('id');
 var checkin = $(this).closest('tr').find('td:nth-child(4)').text();
//
 var today = new Date();
 var checkout = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
 var totalprice = "";
// lấy số tiền theo check out hiện tại viết ajax
$.ajax({
  url: 'http://localhost:8080/baitaplon_nhom7/getmoneybyIDHD/'+id,
  datatype: 'JSON',
  success: function(data){
    var pr = JSON.parse(data);
       console.log(pr[0]['TongTien']); 
       totalprice = pr[0]['TongTien'];

var str = "<table class='table' style='margin : 0 auto;'><tr><td>Địa chỉ: </td><td>"+ diachi +"</td></tr>";
    str += "<tr><td>Số phòng: </td><td left='20px'>"+ sophong +"</td></tr>";
    str += "<tr><td>Ngày vào: </td><td>"+ checkin +"</td></tr>";
    str += "<tr><td>Ngày ra: </td><td>"+ checkout +"</td></tr>";
    str += "<tr><td>Dịch vụ: </td><td>"+ dichvu +"</td></tr>";
    str += "<tr><td>Loại hình thanh toán: </td><td><select id='cars'><option data-id='0'>Tiền mặt</option>"+
  "<option data-id='1'>Dùng thẻ</option></select></td></tr>";
    str += "<tr><td>Tổng tiền: </td><td>"+ totalprice +"</td></tr>"; 

$('.modal-body').html(str);
// var updatepay = '<a  class="btn btn-default payings"  data-dismiss="modal">Pay</a>';
// updatepay += '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
// $('.modal-footer').html(updatepay);

  }
});

});

//
$('#cuspay').click(function(){
  console.log(idHoaDon);
  var cachthanhtoan = $('#cars option:selected').data('id');
  console.log(cachthanhtoan);

  $.ajax({
  url: 'http://localhost:8080/baitaplon_nhom7/updatebillpayed/'+idHoaDon+'/'+cachthanhtoan,
  datatype: 'JSON',
  success: function(data){
    if(data == 1){
        alert('Cảm ơn bạn đã thanh toán!');
        window.open(location.reload(true));
    }



  }
  });




})
// tính doanh thu trong năm
chartrevenue();

    });
function chartrevenue(){
$.ajax({
 url: 'http://localhost:8080/baitaplon_nhom7/admin/getrevenue',
 datatype: 'JSON',
 success: function(datas){
 console.log(datas);
const labels = ['Tháng 1',
    'Tháng 2',
    'Tháng 3',
    'Tháng 4',
    'Tháng 5',
    'Tháng 6',
    'Tháng 7',
    'Tháng 8',
    'Tháng 9',
    'Tháng 10',
    'Tháng 11',
    'Tháng 12',];
const data = {
  labels: labels,
  datasets: [{
    label: 'Doanh thu (VND)',
    data: JSON.parse(datas),
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};
const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );


 }


});



}
 </script>



    @endsection