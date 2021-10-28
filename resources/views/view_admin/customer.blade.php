@extends('layouts.ladmin')

@section('main_admin')
    

<div class="panel-body">
    <div class="panel-group" id="accordion">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <button class="btn btn-default" type="button">
                            Khách hàng <span class="badge"></span>
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
                               <table class="table">
                                <thead>
                                    <tr>
                                                <th>Tên khách hàng</th> 
                                                <th>Số điện thoại</th> 
                                                <th>Email</th>
                                                <th>Địa chỉ</th>
                                                <th>Thẻ</th>
                                                <th>Số thẻ</th>
                                                <th>Tính năng</th>

                                    </tr>
                                </thead>
                                <tbody id="customer">
                                    <?php
                                        foreach ($data as $c) {                                            
                                            # code...
                                            echo "<tr><td>$c->TenKhachHang</td><td>$c->SoDienThoai</td>
                                                <td>$c->Email</td><td>$c->DiaChi</td>
                                                <td>$c->TenLoai</td><td>$c->SoThe</td>
                                                <td><button>Xóa</button></td>";
                                        }
                                        
                                        
                                        
                                        ?>
                                   

                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary">Tính năng</a>
                            </div>
                        </div>
                    </div>
                    <!-- End  Basic Table  -->
                </div>
            </div>
        </div>
        {{-- api chart --}}
                <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                            <button class="btn btn-primary" type="button">
                               Biểu đồ khách hàng <span class="bookedr"></span>
                            </button>

                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                        <h3>Biểu đồ số khách hàng trong năm 
                            <?php
                                echo date('Y');
                                ?>
                        </h3>

                      {{-- chart --}}

                      <div>
                        <canvas id="myChart"></canvas>
                      </div>
                      

                    </div>

                </div>



            </div>
                         

            



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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>  
const labels = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
];
const data = {
  labels: labels,
  datasets: [{
    label: 'Person',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: [2, 10, 5, 2, 20, 30, 45,7,5,9,10,55],
  }]
};
 const config = {
  type: 'line',
  data: data,
  options: {}
}; 
var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );


 </script>



    @endsection