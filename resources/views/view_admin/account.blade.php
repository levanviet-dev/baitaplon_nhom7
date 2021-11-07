@extends('layouts.ladmin')

@section('main_admin')
    
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Quản lý <small>tài khoản </small>
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
                            Danh sách tài khoản <span class="badge"></span>
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
                                                <th>Tên tài khoản</th> 
                                                <th>Họ và tên</th> 
                                                <th>Email</th>
                                                <th>Chức vụ</th>
                                                <th>Tính năng</th>

                                    </tr>
                                </thead>
                                <tbody id="customer">
                                   <?php
                                    foreach ($data as $us) {
                                        # code...
                                      echo "<tr><td>$us->TaiKhoan</td><td>$us->HoTen</td>
                                        <td>$us->Email</td><td>$us->GhiChu</td>
                                        <td><button class='btn btn-primary' data-toggle = 'modal' data-target = '#myModal'>Sửa</button>
                                        <button class='btn btn-primary' >Xóa</button></td></tr>";
                                    }
                                    
                                    ?>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary" data-toggle = 'modal' data-target = '#myModal'>Tạo mới</a>
                            </div>
                        </div>
                    </div>
                    <!-- End  Basic Table  -->
                </div>
            </div>
        </div>
        {{-- api chart --}}
                {{-- <div class="panel panel-info">
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
                                // echo date('Y');
                                ?>
                        </h3>
                    </div>
                </div>
            </div> --}}
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
            <h4 class="modal-title">Tài khoản </h4>
          </div>
          <div class="modal-body">
           <table class="table">
            <tr><td><label >Họ tên</label></td><td><input type="text" required></td></tr>
            <tr><td><label >Email</label></td><td><input type="text" required></td></tr>
            <tr><td><label >Chức vụ</label></td><td><input type="text" required></td></tr>

           </table>
          </div>
          <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Cập nhật</button>
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

    @endsection