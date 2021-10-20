@extends('layouts.ladmin')

@section('main_admin')
    

<div class="panel-body">
    <div class="panel-group" id="accordion">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <button class="btn btn-default" type="button">
                            Payment <span class="badge"></span>
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
                                                <th>Address</th>
                                                <th>Room </th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Phone number</th>
                                                <th>Total price</th>
                                                <th>More</th>

                                    </tr>
                                </thead>
                                <tbody id="listpayment">
                                 <?php
                                  foreach ($data as $p) {
                                    # code...
                                    echo "<tr><td data-id ='$p->ID'>$p->TenKH</td><td>$p->DiaChi</td>
                                      <td>$p->SoPhong</td><td>$p->CheckIn</td>
                                      <td>$p->CheckOut</td><td>$p->SoDienThoai</td>
                                      <td>$p->TongTien</td>
                                      <td><button id ='payment' data-toggle = 'modal' data-target = '#myModal'>Pay</button></td></tr>";
                                  }
                                  
                                  
                                  
                                  
                                  ?>
                                   

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
                            Payed <span class="badgeroom"></span>
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
          {{-- chart booking --}}
          <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                        <button class="btn btn-primary" type="button">
                            Chart API <span class="badge"></span>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    




<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// payment
$('#payment').click(function(){
  var name = $(this).closest('tr').find('td:first').text();
$('.modal-title').html('Thanh toán hóa đơn: '+name);

 var diachi = $(this).closest('tr').find('td:nth-child(2)').text();
 var sophong = $(this).closest('tr').find('td:nth-child(2)').text();
 var checkin = $(this).closest('tr').find('td:nth-child(2)').text();
//
 var today = new Date();
 var checkout = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
// lấy số tiền theo check out hiện tại viết ajax

 

 $('.modal-body').html('Thanh toán hóa đơn: '+checkout);



});

//


const labels = ['January',
    'Febuary',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',];
const data = {
  labels: labels,
  datasets: [{
    label: 'Doanh thu (VND)',
    data: [65, 59, 80, 81, 56, 55, 40,8,7,9,5,10],
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
 </script>



    @endsection