@extends('layouts.ladmin')

@section('main_admin')
<div id="page-wrapper">
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12">
              <h1 class="page-header">
                 Quản lý <small>thanh toán </small>
              </h1>
          </div>
      </div>
      <!-- /. ROW  -->
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">

                  </div>
                  {{-- write content --}}
    

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
                               
                               <h3 style="text-align: center">Hóa đơn hiện tại</h3><br>
                               <table class="table">
                                <thead>
                                    <tr>
                                                <th>Tên khách hàng</th>
                                                <th>Địa chỉ</th>
                                                <th>Phòng </th>
                                                <th>Ngày vào</th>
                                                <th>Ngày ra</th>
                                                <th>Số điện thoại</th>
                                                <th>Tổng tiền(VNĐ)</th>
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
                                      <td>".number_format($p->TongTien)."</td>
                                      <td><button class ='payment btn btn-primary' data-toggle = 'modal' data-target = '#myModal'>Thanh toán</button></td></tr>";
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
               
                    <h3 style="text-align: center">Hóa đơn đã thanh toán</h3><br>

                    <table class="table">
                        <thead>
                          <tr>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Phòng </th>
                            <th>Ngày vào</th>
                            <th>Ngày ra</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền(VNĐ)</th>
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
                              <td> ".number_format($p->TongTien)." </td><td>$p->GhiChu</td>
                              <td><a class ='payed btn btn-primary' target='_blank'
                              href='http://localhost:8080/baitaplon_nhom7/admin/print/$p->ID')>In hóa đơn</a></td></tr>";
                          }
                           
                          ?>
                        </tbody>
                        
                    </table>
                     {{ $dathanhtoan->links() }}
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
    
{{-- end content --}}
</div>
</div>
</div>
</div>
</div>
<!-- DEOMO-->
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

 var str = "<table class='table' style='margin : 0 auto;'><tr><td>Địa chỉ: </td><td >"+ diachi +"</td></tr>";
    str += "<tr><td>Số phòng: </td><td left='20px'>"+ sophong +"</td></tr>";
    str += "<tr><td>Ngày vào: </td><td>"+ checkin +"</td></tr>";
    str += "<tr><td>Ngày ra: </td><td>"+ checkout +"</td></tr>";
    str += "<tr><td>Dịch vụ: </td><td>"+ dichvu +"</td></tr>";
    str += "<tr><td>Loại hình thanh toán: </td><td><select class='form-control' id='cars'><option data-id='0'>Tiền mặt</option>"+
  "<option data-id='1'>Dùng thẻ</option></select></td></tr>";
    str+= "<tr><td>Giảm giá (%)</td><td><input class='form-control' type='number' id='giamgia' onchange='giamgia(value,"+totalprice+")' value = 0 min = '0' max = '100'><span>(Giá từ 0-100)</span></td>"
    str += "<tr><td>Tổng tiền: </td><td id='tiencuoi'>"+ totalprice.toLocaleString('en') +"</td></tr>"; 

    $('.modal-body').html(str);
  }
    });

});
//
$('#cuspay').click(function(){
  console.log(idHoaDon);
  var cachthanhtoan = $('#cars option:selected').data('id');
 // console.log(cachthanhtoan);
  var giamgia = $('#giamgia').val();
 console.log(giamgia);
  $.ajax({
  url: 'http://localhost:8080/baitaplon_nhom7/updatebillpayed/'+idHoaDon+'/'+cachthanhtoan+'/'+giamgia,
  datatype: 'JSON',
  success: function(data){
    if(data == 1){
        alert('Cảm ơn bạn đã thanh toán!');
        location.reload();
    }
  }
  });
});
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

//
function giamgia(val,price){
 var finalprice = price - val/100*price;
  //console.log(finalprice);
  $('#tiencuoi').html(finalprice);
}
 </script>



    @endsection