<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang quản lý khách sạn </title>
    <!-- Bootstrap Styles-->
    <link href="{{url('public/adsite')}}/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{url('public/adsite')}}/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{url('public/adsite')}}/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{url('public/adsite')}}/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <?php
    session_start();
   if(!isset($_SESSION["user"])){
    header("Location: admin/login");
    exit();
   }
    ?>
    
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin"> Quản lý </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Thông tin người dùng</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="http://localhost:8080/baitaplon_nhom7/admin/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu" >

                    <li>
                        <a  href="http://localhost:8080/baitaplon_nhom7/admin"><i class="fa fa-dashboard"></i> Trang đặt phòng</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> Thư mới</a>
                    </li>
                    <li>
                        <a href="http://localhost:8080/baitaplon_nhom7/admin/roombooking"><i class="fa fa-qrcode"></i> Phòng</a>
                    </li>
                    <li>
                        <a href="http://localhost:8080/baitaplon_nhom7/admin/payment"><i class="fa fa-qrcode"></i> Thanh toán</a>
                    </li>
                    <li>
                        <a href="http://localhost:8080/baitaplon_nhom7/admin/customer"><i class="fa fa-qrcode"></i> Khách hàng</a>
                    </li>
                    <li>
                        <a href="http://localhost:8080/baitaplon_nhom7/admin/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                    </li>
                </ul>

            </div>
           <style> 
           .nav li:hover{
             background-color: rgb(108, 108, 236);

           }
         </style>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Status <small>Hotel </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                        @section('main_admin')   
                        @show 
                        </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- DEOMO-->
             </div>
        </div>

        <!--DEMO END-->




        <!-- /. ROW  -->

    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{url('public/adsite')}}/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="{{url('public/adsite')}}/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="{{url('public/adsite')}}/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="{{url('public/adsite')}}/js/morris/raphael-2.1.0.min.js"></script>
    <script src="{{url('public/adsite')}}/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="{{url('public/adsite')}}/js/custom-scripts.js"></script>


</body>

</html>