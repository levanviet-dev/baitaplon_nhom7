<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đặt phòng</title>
    <!-- Bootstrap Styles-->
    <link href="{{ url('public/sites') }}/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ url('public/sites') }}/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{ url('public/sites') }}/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="./"><i class="fa fa-home"></i> Trang chủ</a>
                    </li>

                </ul>

            </div>

        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Đặt phòng <small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-5 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Thông tin người dùng
                            </div>
                            <div class="panel-body">
                                <form name="form" method="post" action="{{ route('createbooking')}}">
                                    @csrf
                                    {{-- person info --}}
                                    <div class="form-group">
                                        <label>Tên của bạn<span style="color:red" id ="errorname" >(*)</span></label>
                                        <input name="name" id="name" class="form-control" required onblur="validate()">
                                    
                                    </div>
                                    <div class="form-group">
                                        <label>Email<span style="color:red" id ="erroremail" >(*)</span></label>
                                        <input name="email" id="email" type="email" class="form-control" required onblur="validate()">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Loại thẻ</label>
                                        <select name="cardtype" class="form-control" required>
                                            <option value selected></option>
                                            <?php
                                            foreach ($cardtypes as $card) {
                                                # code...
                                                echo '<option value="' . $card->ID . '">' . $card->TenLoai . '</option>';
                                            }
                                            
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số thẻ</label>
                                        <input type="text" name="cardnumber" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Số điện thoại<span style="color:red" id ="errorphone" >(*)</span></label>
                                        <input name="phone" id="phone" type="text" class="form-control" required onblur="validate()">

                                    </div>
                                   
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Thông tin đặt phòng
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Loại phòng *</label>
                                        <select name="troom" class="form-control troom" required>
                                            <option value selected></option>
                                            <?php
                                            foreach ($roomtype as $r) {
                                                # code...
                                                echo '<option value="' . $r->ID . ' ">' . $r->TenLoai . '</option>';
                                            }
                                            
                                            ?>

                                            {{-- <option value="Superior Room">SUPERIOR ROOM</option>
                                                <option value="Deluxe Room">DELUXE ROOM</option>
												<option value="Guest House">GUEST HOUSE</option>
												<option value="Single Room">SINGLE ROOM</option> --}}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Số giường</label>
                                        <select name="bed" class="form-control" id="bed" required>
                                            <option value selected></option>
                                            {{-- <option value="1">Double</option> --}}

                                            {{-- <option value="Single">Single</option>
                                                <option value="Double">Double</option>
												<option value="Triple">Triple</option>
                                                <option value="Quad">Quad</option>
												<option value="None">None</option> --}}


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Số người</label>
                                        <select name="nperson" class="form-control" required>
                                            <option value selected></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <!--  <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option> -->
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Dịch vụ</label>
                                        <select id="service" name="service" class="form-control" required>
                                            <option value selected></option>
                                            <?php
                                            foreach ($service as $s) {
                                                # code...
                                                echo '<option value="' . $s->ID . '" data-id="' . $s->GiaTien . '">' . $s->TenDichVu . '</option>';
                                            }
                                            
                                            ?>


                                            {{-- <option value="Room only">Room only</option>
                                                <option value="Breakfast">Breakfast</option>
												<option value="Half Board">Half Board</option>
												<option value="Full Board">Full Board</option> --}}

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày vào<span style="color:red" id ="errorcheckin" >(*)</span></label>
                                        <input name="cin" type="date" id="cin" class="form-control" required onblur="checkday()">

                                    </div>
                                    <div class="form-group">
                                        <label>Ngày ra<span style="color:red" id ="errorcheckout" >(*)</label>
                                        <input name="cout" type="date" id="cout" class="form-control" required onblur="checkday()">

                                    </div>

                                </div>

                            </div>
                            <div class="form-group">
                                <label>Số tiền dự kiến (VND)</label>
                                <input id="totalprice" name="totalprice" readonly type="text" value="0">
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="well">
                                <h4>Xác nhận</h4>
                                <p>Nhập bên dưới mã này <?php $Random_code = rand();
                                echo $Random_code; ?> </p><br />
                                <p>Nhập dãy mã ngẫu nhiên <br /></p>
                                <input type="text" name="code1" title="random code" required     />
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                <input type="submit" id="sent" name="Gửi" class="btn btn-primary">
                            {{-- end from --}}
                            </form>
                           
                            </div>
                        </div>
                    </div>


                </div>



            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

{{-- notice success booking --}}




</body>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $(document).ready(function() {
        console.log("Ready!");


        $(".troom").change(function() {
            var ID = $(this).val();

            $.ajax({
                url: 'http://localhost:8080/baitaplon_nhom7/getbed/' + ID,
                datatype: 'JSON',
                success: function(data) {
                    console.log(data);
                    var numbed = JSON.parse(data);

                    var str = "<option value selected  ></option>";
                    for (var i = 0; i < numbed.length; i++) {
                        str += "<option data-id='" + numbed[i]['GiaTien'] + "' value= " +
                            numbed[i]['SoGiuong'] + ">" + numbed[i]['SoGiuong'] +
                            "</option> <br>"
                    }
                    console.log(str);
                    $('#bed').html(str);
                }
            });



        });
        // get money:

        var typemoney = 0;
        var servicemoney = 0;
        var day = 0;
        // money of bed
        $('#bed').change(function() {

            typemoney = $("#bed").find(":selected").data("id");
            console.log(typemoney);
            getmoney(typemoney, servicemoney, day);
        });
        // money of service
        $('#service').change(function() {
            if ($("#service").find(":selected").data("id")) {
                servicemoney = $("#service").find(":selected").data("id");
                console.log(servicemoney);
                getmoney(typemoney, servicemoney, day);
            } else {
                servicemoney = 0
                getmoney(typemoney, servicemoney, day);
            };
        });
        // money of day
        $('#cin').change(function() {
            console.log($(this).val());
            if ($('#cout').val()) {
                day = getday($(this).val(), $('#cout').val());
                getmoney(typemoney, servicemoney, day);
            }

        });
        $('#cout').change(function() {
            console.log($(this).val());
            if ($('#cin').val()) {
                day = getday($('#cin').val(), $('#cout').val());
                getmoney(typemoney, servicemoney, day);
            }

        });

    });

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


    function getmoney(typemoney, servicemoney, day) {
        var total = (typemoney * day + servicemoney);
        $('#totalprice').val(total);
    }
</script>
<script>
    var co = 0;
    function validate()
       {
           var name= document.getElementById('name').value;
           var errorname = document.getElementById('errorname');
           var phone =document.getElementById('phone').value; 
           var errorphone = document.getElementById('errorphone');
           var email = document.getElementById('email').value; 
           var erroremail = document.getElementById('erroremail');
   
   
               var regexName = /^[^\d+]*[\d+]{0}[^\d+]*$/;
               var regexPhone =/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
               var regexEmail =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
               if(name == null || name =='' )
               {
                   errorname.innerHTML = " Không được để trống!";
                   co = 1;
               }
               else if(!regexName.test(name))
               {
                   errorname.innerHTML = " Tên không hợp lệ!";
                   co = 1;
               }
               else
               {
                   errorname.innerHTML = "";
                   co = 0;
               }
   
               //Phone 
               if(phone == null || phone =='' )
               {
                   errorphone.innerHTML = " Không được để trống!";
                   co = 1;
               }
               else if(!regexPhone.test(phone))
               {
                   errorphone.innerHTML = " Số điện thoại không hợp lệ !";
                   co = 1;
               }
               else
               {
                   errorphone.innerHTML = "";
                   co = 0;
               }
               // Email
               if(email == null || email =='' )
               {
                   erroremail.innerHTML = " Không được để trống!";
                   co = 1;
               }
               else if(!regexEmail.test(email))
               {
                   erroremail.innerHTML = " Địa chỉ email không hợp lệ!";
                   co = 1;
               }
               else
               {
                   erroremail.innerHTML = "";
                   co = 0;
               }
               kiemtraco();
               return false;
       }
       
        function checkday()
            {
              var date = new Date();
               var errorcheckout = document.getElementById('errorcheckout');
               Datein = document.getElementById('cin').value;
               var errorcheckin = document.getElementById('errorcheckin');
               var datecheckin = new Date(Datein);
   
   
               Dateout = document.getElementById('cout').value;
               var datecheckout = new Date(Dateout);
             
               if(datecheckout <= datecheckin)
               {
                   errorcheckout.innerHTML = " Ngày ra phải khác ngày vào";
                   co = 1;
               }
               else if(datecheckin < date )
               {
                   errorcheckin.innerHTML = " Ngày vào không hợp lệ";
                   co = 1;
               }
             else if(datecheckout< date )
             {
               errorcheckout.innerHTML = " Ngày ra không hợp lệ";
               co = 1;
             }
             else
             {
                   errorcheckout.innerHTML = " ";
                   errorcheckin.innerHTML = " ";
                   co = 0;
               }
               kiemtraco();
               return false;
            }
            function kiemtraco(){
                if(co == 1){
                    console.log('chưa đc gửi');
                    document.getElementById("sent").disabled = true;
                }
                if(co == 0){
                    console.log('gửi');
                    document.getElementById("sent").disabled = false;
                }

            }
       </script>
   
</html>
