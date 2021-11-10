@extends('layouts.ladmin')

@section('main_admin')
    
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Danh sách <small>liên hệ </small>
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
                            Liên hệ mới <span class="badge"></span>
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
                                                <th>Trạng thái</th>
                                                <th>Tính năng</th>

                                    </tr>
                                </thead>
                                <tbody id="customer">
                                    <?php
                                        foreach ($data as $c) {                                            
                                            # code...
                                            echo "<tr><td id='tenkh' data-id='$c->ID'>$c->TenKH</td><td>$c->SoDienThoai</td>
                                                <td>$c->Email</td><td>Chưa trả lời</td>
                                                <td><button class='btn btn-primary sentemail' data-toggle = 'modal' data-target = '#myModal'>Trả lời</button></td>";
                                        }
                                        ?>
                                </tbody>
                            </table>
                            {{-- <a href="#" class="btn btn-primary">Tính năng</a> --}}
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
                                echo date('Y');
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
            <form class="sentmail" action="sentmail" method="POST">
                @csrf
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Trả lời <label ></label></h4>
                <input type="hidden" name="email" class="nameemail">
                <input type="hidden" name="ID" class="IDemail">
             </div>
             <div class="modal-body">
              <table class="table">
            <tr><td><label >Tên liên hệ :</label></td><td> <input id="pushname" type="text" name="name" placeholder="Tên khách hàng"></td> </tr> 
             <tr><td><label >Tiêu đề :</label></td><td> <input type="text" name="title" placeholder="Nhập tiêu đề thư"></td> </tr>
             <tr><td> <label >Nội dung :</label></td><td> <textarea id="review" name="content" rows="6" cols="50">
             </textarea> </td></tr></table>
            </form>
            </div>
          <div class="modal-footer"> 
            <button type="button" class="btn btn-default sent" data-dismiss="modal">Gửi</button>
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
<script>$(document).ready(function(){
  $('.sentemail').click(function(){
     var email = $(this).closest('tr').find('td:nth-child(3)').text();
     var name = $(this).closest('tr').find('td:first').text()
     var id = $(this).closest('tr').find('td:first').data('id');
    $('.modal-title').find('label').html(email);
    $('#pushname').val(name);
    $('.nameemail').val(email);
    $('.IDemail').val(id);
  })
  $('.sent').click(function(){
 // alert('Gửi thành công');
   $('.sentmail').submit();
    //location.reload();

 })

})</script>



    @endsection