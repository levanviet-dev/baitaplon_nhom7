@extends('layouts.ladmin')

@section('main_admin')
<div id="page-wrapper">
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12">
              <h1 class="page-header">
                  Quản lý <small>dịch vụ </small>
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
                            Dịch vụ <span class="badge"></span>
                        </button>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                <div class="panel-body">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                               {{-- <div class="form-group">
                                 <label for="">Tìm kiếm</label>
                                 <input type="text">
                                 <button type="submit">Tìm kiếm</button>
                               </div> --}}
                               <table class="table">
                                <thead>
                                    <tr>        <th>Mã dịch vụ</th>  
                                                <th>Dịch vụ</th> 
                                                <th>Giá (VNĐ)</th> 
                                                <th>Tính năng</th>

                                    </tr>
                                </thead>
                                <tbody id="customer">
                                    <?php
                                        foreach ($data as $sv) {                                            
                                            # code...
                                            echo "<tr><td>$sv->ID</td><td>$sv->TenDichVu</td>
                                                <td data-money='$sv->GiaTien'>".number_format($sv->GiaTien)."</td>
                                                <td><button class='btn btn-primary edit' data-toggle = 'modal' data-target = '#myModal' >Sửa</button>
                                                    <button class='btn btn-primary deletecus'>Xóa</button></td>";
                                        }
                                        ?>
                                   
                                </tbody>
                            </table>
                            <button class="btn btn-primary create"data-toggle = 'modal' data-target = '#myModal'>Thêm</button>
                            {{-- {{ $data->links() }} --}}
                            </div>
                        </div>
                    </div>
                    <!-- End  Basic Table  -->
                </div>
            </div>
        </div>
            {{-- aaaaaaaa --}}
         
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
              <form id="formsubmit" method="POST">
                  @csrf
                    <table class="table">
                        <tr><td><label for="">ID</label></td><td><input type="text" name="iddv" id="iddv" ></td></tr>
                        
                        <tr><td><label for="">Tên dịch vụ</label></td><td><input type="text" name="tendv" id="tendv"></td></tr>
                        
                        <tr><td><label for="">Giá tiền</label></td><td><input type="number" name="giadv" id="giadv" min="1000" value="500000"></td></tr>
                            

                    </table>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btnedit" data-dismiss="modal">Cập nhật</button>
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
// delete customer
$(document).ready(function(){
 $('.deletecus').click(function(){
    var id = $(this).closest('tr').find('td:first').text();
    console.log(id);
 if(confirm("Bạn có chắc muốn xóa?")){
 // xóa dịch vụ
  $.ajax({
   url: 'http://localhost:8080/baitaplon_nhom7/admin/deleteservice/'+id,
   datatype: 'JSON',
   success: function(data){
     if(data == 1) alert('Xóa thành công');
     location.reload(true);
   }

  });


 //
 }

 })

});
$('.edit').click(function(){
  var id = $(this).closest('tr').find('td:first').text();
  console.log(id);
  var tendv = $(this).closest('tr').find('td:nth-child(2)').text();
  console.log(tendv);
  var giatien = $(this).closest('tr').find('td:nth-child(3)').data('money');
  $('#iddv').val(id);
  $('#tendv').val(tendv);
  $('#giadv').val(giatien);
  $('#iddv').attr('readonly',true);
  $('.modal-title').html('Chỉnh sửa dịch vụ');
  $('.btnedit').html('Cập nhật');

  $('#formsubmit').attr('action','editservice');
});

$('.create').click(function(){
    
    $('.modal-title').html('Tạo mới dịch vụ');
    $('.btnedit').html('Tạo mới');
    $('#iddv').val('');
    $('#tendv').val('');
    $('#giadv').val('');  
    $('#iddv').attr('readonly',false);
    $('#formsubmit').attr('action','createservice');
});
$('.btnedit').click(function(){
    $('#formsubmit').submit();
});

 </script>



    @endsection