@extends('layouts.ladmin')

@section('main_admin')


    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Đặt phòng <small>khách sạn </small>
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
                                                    Danh sách đặt phòng mới <span
                                                        class="badge">{{ count($data) }}</span>
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
                                                            <input type="text" name="seaching" id="searching">
                                                            <button type="submit">Tìm kiếm</button>
                                                        </div>
                                                        <h3 style="text-align: center">Danh sách đặt phòng</h3><br>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Tên khách hàng</th>
                                                                    <th>Email</th>
                                                                    <th>Thẻ</th>
                                                                    <th>Địa chỉ</th>
                                                                    <th>Phòng</th>
                                                                    <th>Số người</th>
                                                                    <th>Dịch vụ</th>
                                                                    <th>Ngày vào</th>
                                                                    <th>Ngày ra</th>
                                                                    <th>Số điện thoại</th>
                                                                    <th>Tính năng</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody id="bookroom">
                                                                <?php
                                                                
                                                                foreach ($data as $d) {
                                                                    # code...
                                                                    $style = '';
                                                                    $xoa = '';
                                                                
                                                                    if ($d->CheckIn >= date('Y-m-d')) {
                                                                        $style = "style='background-color: #CCFFCC'";
                                                                    } else {
                                                                        # code...
                                                                        $style = "style='background-color: #FF9966'";
                                                                        $xoa = "<button class='btn btn-primary deletebook' data-id='$d->ID'>Xóa</button>";
                                                                    }
                                                                    echo "<tr ".$style."><td >$d->TenKH</td><td>$d->Email</td><td>$d->LoaiThe : $d->SoThe</td>
                                                                       <td>$d->DiaChi</td><td data-id=" .$d->SoGiuong .' data-typeroom=' .$d->loaiphongID .
                                                                        ">$d->LoaiPhong</td><td>$d->SoNguoi</td><td data-id=" .$d->TienDV .
                                                                        ">$d->TenDichVu</td><td>$d->CheckIn</td><td>$d->CheckOut</td><td data-id = " .
                                                                        $d->GiaTien .">$d->SoDienThoai</td><td><button class='btn btn-primary selected' data-id='$d->ID'>Chọn</button>" .
                                                                        $xoa .'</td>';
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="d-flex justify-content-center">
                                                            {{ $data->links() }}
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
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                                class="collapsed">
                                                <button class="btn btn-primary" type="button">
                                                    Danh sách khách ở: <span class="badge bookedr"></span>
                                                </button>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <h3  style="text-align: center">Danh khách ở phòng</h3><br>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Tên khách hàng</th>
                                                        <th>Số phòng</th>
                                                        <th>Thẻ</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Phòng</th>
                                                        <th>Số người</th>
                                                        <th>Dịch vụ</th>
                                                        <th>Ngày vào</th>
                                                        <th>Ngày ra</th>
                                                        <th>Số điện thoại</th>
                                                  
                                                    </tr>
                                                </thead>
                                                <tbody id="bookedroom">
                                                    <?php
                                                                
                                                                foreach ($useBill as $d) {
                                                                    # code...
                                                                    $style = '';
                                                                    $xoa = '';
                                                                
                                                                    if ($d->CheckOut >= date('Y-m-d')) {
                                                                        $style = "style='background-color: #CCFFCC'";
                                                                    } else {
                                                                        # code...
                                                                        $style = "style='background-color: #FF9966'";
                                                                        $xoa = "<button class='btn btn-primary deletebook' data-id='$d->ID'>Xóa</button>";
                                                                    }
                                                                    echo "<tr ".$style."><td >$d->TenKH</td><td>$d->LoaiPhong : $d->SoPhong</td><td>$d->LoaiThe : $d->SoThe</td>
                                                                       <td>$d->DiaChi</td><td data-id=" .$d->SoGiuong .' data-typeroom=' .$d->loaiphongID .
                                                                        ">$d->LoaiPhong</td><td>$d->SoNguoi</td><td data-id=" .$d->TienDV .
                                                                        ">$d->TenDichVu</td><td>$d->CheckIn</td><td>$d->CheckOut</td><td>$d->SoDienThoai</td>";
                                                                }
                                                                ?>
                                                            </tbody>
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {{ $useBill->links() }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{-- chart booking --}}
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                                class="collapsed">
                                                <button class="btn btn-primary" type="button">
                                                    Biểu đồ số lượng khách <span class="badge"></span>
                                                </button>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <h3>Số khách đến trong năm <?php
                                                        echo date('Y'); ?></h3>
                                                    <div>
                                                        <canvas id="myChart" style="height: 10em;"></canvas>
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
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"></h4>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <button id="update" type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cập nhật</button>
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>

                                        </div>
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
    <form id="deletebooking" action="post" method="POST">
        @csrf @method('post')
        <input type="text" name="id" class="delId" value="-1">
    </form>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            // get element selected
            $(".selected").attr("data-toggle", "modal");
            $('.selected').attr("data-target", "#myModal");
            // loadbookedroom();
            getnumcuswent();
            // click selected
            var id, idroom, numroom, cin, cout, moneyservice = 0;
            var typeroomid = "";
            // lấy dữ liệu khi click vào dòng của bảng
            $('.selected').click(function() {
                id = $(this).data('id');
                $(this).closest('tr').attr('id', id);
                var phone = $(this).closest('tr').find('td:nth-child(10)').text();
                var name = $(this).closest('tr').find('td:first').text();
                var adress = $(this).closest('tr').find('td:nth-child(4)').text();
                var typeroom = $(this).closest('tr').find('td:nth-child(5)').text();
                var numerbed = $(this).closest('tr').find('td:nth-child(5)').data('id');
                var card = $(this).closest('tr').find('td:nth-child(3)').text();
                var money = $(this).closest('tr').find('td:nth-child(10)').data("id") + "VND";
                var numperson = $(this).closest('tr').find('td:nth-child(6)').text();
                typeroomid = $(this).closest('tr').find('td:nth-child(5)').data('typeroom');
                moneyservice = $(this).closest('tr').find('td:nth-child(7)').data('id');
                cin = $(this).closest('tr').find('td:nth-child(8)').text();
                cout = $(this).closest('tr').find('td:nth-child(9)').text();
                // title of modal
                var title = "Xác nhận đặt phòng";
                $('.modal-title').html(title);
                // chèn các dữ liệu đc lấy vào modal toggle
                var date = new Date();
                var str =
                    "<table class='table''><tr><td> <label>Số điện thoại khách hàng: </label> </td><td> " +
                    phone + "</td><tr>";

                str += "<tr> <td> <label>Tên khách hàng: </label> </td><td> " + name + " </td></tr>";
                str += "<tr> <td> <label>Địa chỉ: </label> </td><td> " + adress + "  </td></tr>";
                str += "<tr> <td> <label>Ngày vào: </label> </td><td> " + date.getFullYear()+"-"+date.getMonth() +"-"+date.getDate() +"  </td></tr>";
                str += "<tr> <td> <label>Loại phòng: </label> </td><td> " + typeroom + "  </td></tr>";
                str += "<tr> <td> <label>Số giường khách đặt: </label> </td><td> " + numerbed +
                    " giường cho " + numperson + " người </td></tr>";
                str += "<tr> <td> <label>Số phòng: </label> </td><td> " +
                    " <select class='form-control' id=" + "numroom" + ">  </select> </td></tr>";
                str += "<tr> <td> <label>Thẻ: </label> </td><td> " + card + "  </td></tr>";
                str += "<tr> <td> <label>Số tiền: </label> </td><td id=" + "totalprice" + "> " + money +
                    "  </td></tr>";
                $('.modal-body').html(str);

                $.ajax({
                    url: 'http://localhost:8080/baitaplon_nhom7/roombytype/' + typeroom,
                    datatype: 'JSON',
                    success: function(data) {
                        console.log(data);
                        var r = JSON.parse(data);
                        var room = "<option value='null'> </option>";
                        for (var i = 0; i < r.length; i++) {
                            room += "<option value=" + r[i]['ID'] + ">" + r[i]['SoPhong'] +
                                " (" + r[i]['SoGiuong'] + " Giường)</option>";
                        }
                        $('#numroom').html(room);
                    }
                });
                // update money of booking room
                var moneyroom = 0;
                // lấy tiền khi thay đổi số phòng
                $('#numroom').change(function() {
                    var nameroom = $(this).val();
                    if (nameroom == " ") return;
                    console.log('So phong: ' + nameroom);
                    // todo 
                    $.ajax({
                        url: 'http://localhost:8080/baitaplon_nhom7/getmoney/' +
                            typeroomid + '/' + nameroom,
                        datatype: 'JSON',
                        success: function(data) {
                            var datas = JSON.parse(data);
                            moneyroom = datas[0]['GiaTien'];
                            var day = getday(Date('Y-m-d'), cout);
                            console.log("Tien phong: " + moneyroom);
                            console.log("So ngay: " + day);
                            console.log('Tien dich vu: ' + moneyservice);
                            getmoney(moneyroom, moneyservice, day);
                        }
                    });
                });

            }); // update  element cập nhật vào csdl
            $('#update').click(function() {
                console.log(id);
                var idroom = $('#numroom').val();
                $.ajax({
                    url: 'http://localhost:8080/baitaplon_nhom7/updatebook/' + id + '/' + idroom,
                    datatype: 'JSON',
                    success: function(data) {

                        if (data == 1) {
                            // jquery xóa hàng
                            $("#" + id).remove();
                            id = -1;
                            alert('Cập nhật thành công');
                            //loadbookedroom();
                            location.reload(true);
                        } else {
                            alert('Vui lòng nhập đầy đủ');
                        }
                    }
                });
            })
    
        });
        $('.deletebook').click(function() {
                // to do
                // update bên trường booking chứ không xóa
                var idb = $(this).data('id');
                //console.log(id);
                if (confirm('Bạn có chắc muốn xóa đơn đặt phòng?')) {
                $('#deletebooking').attr('action','deletebook');
                $('.delId').val(idb);
                //console.log($('.delId').val());
                $('#deletebooking').submit();

                }
            })
        // function caculator money for customer
        function getmoney(typemoney, servicemoney, day) {
            var total = (typemoney * day + servicemoney);
            console.log("total price: " + total);
            $('#totalprice').html(total.toLocaleString('en')+" VND");
        }
        // function get nums day 
        function getday(from, to) {
            const start = new Date(from) //clone
            const end = new Date(to) //clone
            let dayCount = 0
            while (end > start) {
                dayCount++
                start.setDate(start.getDate() + 1)
            }
            return dayCount
        }
        //  chart js
        var objectdata = [1, 5];
        // lấy số người đến và bùng
        function getnumcuswent() {
            // tao ham get date
            $.ajax({
                url: 'http://localhost:8080/baitaplon_nhom7/getnumcuswent/2021',
                datatype: 'JSON',
                success: function(datas) {
                    console.log('so khach ' + datas);
                    const data = {
                        labels: [
                            'khách chưa đến',
                            'Khách đã ở',
                        ],
                        datasets: [{
                            label: 'Số khách hàng đến khách sạn sau đặt phòng',
                            data: JSON.parse(datas),
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'
                            ],
                            hoverOffset: 4
                        }]
                    };
                    const config = {
                        type: 'doughnut',
                        data: data,
                    };
                    var myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                }
            });


        }
        $('#searching').keyup(function(){
          console.log($(this).val());
            $.ajax({
             url: 'search/'+$(this).val(),
             datatype: 'JSON',
             success : function(respone){
              $('#bookroom').html(respone);

             }


            })

        });

           //    hàm load lại đặt phòng đã đc cập nhật số phòng

        // function loadbookedroom() {
        //     console.log("ready!");
        //     $.ajax({
        //         url: 'http://localhost:8080/baitaplon_nhom7/booked',
        //         datatype: 'JSON',
        //         success: function(data) {
        //             var s = JSON.parse(data);
        //             var str = ""
        //             console.log(s[0]['ID']);
        //             for (let i = 0; i < s.length; i++) {
        //                 str += "<tr><td>" + s[i]['TenKH'] + "</td>" +
        //                     "<td>" + s[i]['Email'] + "</td>" + "<td>" + s[i]['LoaiThe'] + ": " + s[i]['SoThe'] +
        //                     "</td>" + "<td>" + s[i]['DiaChi'] + "</td>" + "<td>" + s[i]['LoaiPhong'] + "</td>" +
        //                     "<td>" + s[i]['SoNguoi'] + "</td>" + "<td>" + s[i]['TenDichVu'] + "</td>" + "<td>" +
        //                     s[i]['CheckIn'] + "</td>" +
        //                     "<td>" + s[i]['CheckOut'] + "</td>" + "<td>" + s[i]['SoDienThoai'] + "</td>" +
        //                     "<td><button class='btn btn-primary'>Payment</button></td>" +
        //                     "</tr>";
        //             }
        //             $('#bookedroom').html(str);
        //             $('.bookedr').html(s.length);
        //         }
        //     });
        // }

    </script>




@endsection
