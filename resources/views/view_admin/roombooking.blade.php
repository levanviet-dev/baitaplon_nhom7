@extends('layouts.ladmin')

@section('main_admin')


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
                                          <?php
                                          foreach ($roombooked as  $r) {
                                            # code...
                                            echo "
                                              <tr><td>$r->TenLoai</td><td>$r->SoPhong</td>
                                              <td>$r->TenKH</td>";
            
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
                        <div class="form-group">
                            <label for="">Search</label>
                            <input type="text" name="" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <h3>Danh sách phòng trống</h3>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Loại Phòng</th>
                                    <th>Số phòng</th>
                                    <th>Số người</th>
                                    <th>Số giường</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
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
                                  <td><button class='btn btn-info btn-lg edit' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>
                                    <span class='glyphicon glyphicon-wrench'></span></button>
                                  <button class='btn btn-info btn-lg delete'><span  class='glyphicon glyphicon-trash'></span></button> </td></tr>";
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
                                "<table class='table'><tr><td> <label>Loại phòng:</label> </td><td> <select name='ID_LoaiPhong'>" +
                                str + "</select> </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số phòng: </label> </td><td> <input name='SoPhong' required>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Ảnh: </label> </td><td> <input name='Anh' required>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số người: </label> </td><td> <input name='SoNguoi' type='number' min='1' value='1' required> </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số giường: </label> </td><td>  <select name='SoGiuong'> " +
                                "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>" +
                                "<option value='4'>4</option></select>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Giá tiền(VND): </label> </td><td> <input name='GiaTien' type='number' min='1000' value='10000'>  </td></tr></table>";
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

                    // call ajax
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
                                "<table class='table'><tr><td> <label>Loại phòng:</label><input name='ID' value='"+idr+"' type='hidden'> </td><td> <select name='ID_LoaiPhong'>" +
                                str + "</select> </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số phòng: </label> </td><td> <input name='SoPhong' value='"+sophong+"' required>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Ảnh: </label> </td><td> <input name='Anh' required>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số người: </label> </td><td> <input name='SoNguoi' type='number' min='1' value='"+songuoi+"' required> </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Số giường: </label> </td><td>  <select name='SoGiuong' > " +
                                "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>" +
                                "<option value='4'>4</option></select>  </td></tr>";
                            strcreate +=
                                "<tr> <td> <label>Giá tiền(VND): </label> </td><td> <input name='GiaTien' type='number' min='1000' value='10000'>  </td></tr></table>";
                            $(".modal-body").html(strcreate);
                              }
                    }); 
                           document.getElementById('create').id = 'edit';
                           $('#putmethod').html('@method("put")');
                            $('.modals').html('Cập nhật');
//


                });
                
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
