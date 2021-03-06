@extends('layouts.ladmin')

@section('main_admin')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                   Quản lý <small>phòng ban </small>
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
                                Phòng đang dùng <span class="badge"><?php echo count($roombooked) ?></span>
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
                                        <h3 style="text-align: center">Danh sách phòng đang hoạt động</h3><br>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="">Tìm kiếm</label>
                                        <input type="text">
                                        <button type="submit">Tìm kiếm</button>
                                    </div> --}}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Loại phòng</th>
                                                <th>Số phòng</th>
                                                <th>Khách hàng</th>
                                                <th>Giá tiền 1 ngày</th>
                                                {{-- <th>Tính năng</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody id="booked">
                                          <?php
                                          foreach ($roombooked as  $r) {
                                            # code...
                                            echo "
                                              <tr><td>$r->TenLoai</td><td>$r->SoPhong</td>
                                              <td>$r->TenKH</td><td>".number_format($r->GiaTien)." VND</td>";
            
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
                                Phòng <span class="badgeroom"><?php echo count($roomfree) ?></span>
                            </button>
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                        {{-- <div class="form-group">
                            <label for="">Search</label>
                            <input type="text" name="" id="" aria-describedby="helpId" placeholder="">
                        </div> --}}
                        <h3 style="text-align: center">Danh sách phòng trống</h3><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Loại Phòng</th>
                                    <th>Số phòng</th>
                                    <th>Số người</th>
                                    <th>Số giường</th>
                                    <th>Trạng thái</th>
                                    <th>Ảnh</th>
                                    <th>Giá tiền (VNĐ)</th>
                                    <th>Tính năng</th>

                                </tr>
                            </thead>
                            <tbody id="rooms">
                              <?php
                              foreach ($roomfree as  $r) {
                                # code...
                                echo "
                                  <tr><td>$r->TenLoai</td><td data-id='$r->ID'>$r->SoPhong</td>
                                  <td>$r->SoNguoi</td><td>$r->SoGiuong</td>
                                  <td>$r->KiemTra</td><td><img src='$r->Anh' style='width:10em;height:8em;'></td>
                                  <td data-money='$r->GiaTien'>".number_format($r->GiaTien)."</td>
                                  <td><button class='btn btn-primary edit' data-toggle='modal' data-target='#myModal'>
                                    Sửa</button>
                                  <button class='btn btn-primary'>Xóa</button> </td></tr>";
                              }                                          
                              ?>
                            </tbody>
                        </table>
                        <button id="createroom" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tạo phòng</button>
                    </div>
                </div>
            </div>

            <div class="container">
                <!-- Trigger the modal with a button -->

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <form method="POST"  id="submitroom">
                            @csrf  <p id="putmethod" > </p>
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="create" class="btn btn-default modals"  data-dismiss="modal">Tạo
                                        phòng</button>
                                    <button  type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <button style="display: none;" id="togglemodal" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> modal</button>
                 
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
            <script>
                // create room
                $('#createroom').click(function() {

                    var title = "Tạo phòng mới";
                    $(".modal-title").html(title);
                    //
                    $.ajax({
                        url: 'http://localhost:8080/baitaplon_nhom7/gettyperoom',
                        datatype: 'JSON',
                        success: function(data) {
                            var tr = JSON.parse(data);
                            var str = "";
                            for (let i = 0; i < tr.length; i++) {
                                str += "<option value='" + tr[i]['ID'] + "'>" + tr[i]['TenLoai'] + "</option>"
                            }
                            // console.log(str);
                            var strcreate =
                                "<table class='table'><tr><td> <label>Loại phòng:</label> </td><td> <select class='form-control' name='ID_LoaiPhong'>" +
                                str + "</select> </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số phòng: </label> </td><td> <input class='form-control' name='SoPhong' required>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Ảnh: </label> </td><td> <input class='form-control' name='Anh' required>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số người: </label> </td><td> <input class='form-control' name='SoNguoi' type='number' min='1' value='1' class='form-group' required> </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số giường: </label> </td><td>  <select name='SoGiuong' class='form-control'> " +
                                "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>" +
                                "<option value='4'>4</option></select>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Giá tiền(VND): </label> </td><td> <input class='form-control' name='GiaTien' type='number' min='1000' value='10000'>  </td></tr></table>";
                            $(".modal-body").html(strcreate);

                        }
                    });
                    // 
                    document.getElementById('edit').id = 'create';
                    $('#putmethod').html('@method("post")');
                    $('.modals').html('Tạo mới');

                });
               // button update last form
                $('#create').click(function() {
                   if($(this).attr('id') == 'create'){
                    $('#submitroom').attr('action','createroom');
                   }
                   if($(this).attr('id') == 'edit'){
                    $('#submitroom').attr('action','updateroom');
                   }

                   $('#submitroom').submit();
                });
                $('.edit').click(function(){
                // alert();
                var title = "Sửa phòng";
                    $(".modal-title").html(title);
                    var idr = $(this).closest('tr').find('td:nth-child(2)').data('id');
                    var sophong = $(this).closest('tr').find('td:nth-child(2)').text();
                    
                    var songuoi = $(this).closest('tr').find('td:nth-child(3)').text();
                    var sogiuong = $(this).closest('tr').find('td:nth-child(4)').text();
                    var trangthai = $(this).closest('tr').find('td:nth-child(5)').text();
                    var anh = $(this).closest('tr').find('td:nth-child(6)').find('img').attr('src');
                    var giatien =  $(this).closest('tr').find('td:nth-child(7)').data('money');
                    console.log(giatien)
                    // call ajax cập nhật phòng ban
                    $.ajax({
                        url: 'http://localhost:8080/baitaplon_nhom7/gettyperoom',
                        datatype: 'JSON',
                        success: function(data) {
                            var tr = JSON.parse(data);
                            var str = "";
                            for (let i = 0; i < tr.length; i++) {
                                str += "<option value='" + tr[i]['ID'] + "'>" + tr[i]['TenLoai'] + "</option>"
                            }
                             console.log(idr);
                            var strcreate =
                                "<table class='table'><tr><td> <label>Loại phòng:</label><input name='ID' value='"+idr+"' type='hidden'> </td><td> <select class='form-control' name='ID_LoaiPhong'>" +
                                str + "</select> </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số phòng: </label> </td><td> <input class='form-control' name='SoPhong' value='"+sophong+"' required>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Ảnh: </label> </td><td> <input class='form-control' name='Anh' value = '"+anh+"' required>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số người: </label> </td><td> <input class='form-control' name='SoNguoi' type='number' min='1' value='"+songuoi+"' required> </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số giường: </label> </td><td>  <select class='form-control' name='SoGiuong' > " +
                                "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>" +
                                "<option value='4'>4</option></select>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Giá tiền(VND): </label> </td><td> <input class='form-control' name='GiaTien' type='number' min='1000' value='"+giatien+"'>  </td></tr></table>";
                            $(".modal-body").html(strcreate);
                              }
                    }); 
                           document.getElementById('create').id = 'edit';
                           $('#putmethod').html('@method("put")');
                            $('.modals').html('Cập nhật');
//
                });
                 // xóa phòng
                $('.delete').click(function(){
                 var idr = $(this).closest('tr').find('td:nth-child(2)').data('id');
                 if(confirm('Bạn có chắc muốn xóa')){
                  //
                  $.ajax({
                        url: 'http://localhost:8080/baitaplon_nhom7/admin/deleteroom/'+idr,
                        datatype: 'JSON',
                        success: function() {
                            alert('Xóa thành công!!!');
                        }
                        });
                 $(this).closest('tr').remove();
                 //$('#deleter').submit();
                 }
                 
                });

   
            </script>
        @endsection
