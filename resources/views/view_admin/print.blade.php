<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hóa đơn khách hàng</title>
    <style>body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tohoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 21cm;
        overflow:hidden;
        min-height:297mm;
        padding: 2.5cm;
        margin-left:auto;
        margin-right:auto;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 237mm;
        outline: 2cm #FFEAEA solid;
    }
     @page {
     size: A4;
     margin: 0;
    }
    button {
        width:100px;
        height: 24px;
    }
    .header {
        overflow:hidden;
    }
    .logo {
        background-color:#FFFFFF;
        text-align:left;
        float:left;
    }
    .company {
        padding-top:24px;
        text-transform:uppercase;
        background-color:#FFFFFF;
        text-align:right;
        float:right;
        font-size:16px;
    }
    .title {
        text-align:center;
        position:relative;
        color:#0000FF;
        font-size: 24px;
        top:1px;
    }
    .footer-left {
        text-align:center;
        text-transform:uppercase;
        padding-top:24px;
        position:relative;
        height: 150px;
        width:50%;
        color:#000;
        float:left;
        font-size: 12px;
        bottom:1px;
    }
    .footer-right {
        text-align:center;
        text-transform:uppercase;
        padding-top:24px;
        position:relative;
        height: 150px;
        width:50%;
        color:#000;
        font-size: 12px;
        float:right;
        bottom:1px;
    }
    .TableData {
        background:#ffffff;
        font: 11px;
        width:100%;
        border-collapse:collapse;
        font-family:Verdana, Arial, Helvetica, sans-serif;
        font-size:12px;
        border:thin solid #d3d3d3;
    }
    .TableData TH {
        background: rgba(0,0,255,0.1);
        text-align: center;
        font-weight: bold;
        color: #000;
        border: solid 1px #ccc;
        height: 24px;
    }
    .TableData TR {
        height: 24px;
        border:thin solid #d3d3d3;
    }
    .TableData TR TD {
        padding-right: 2px;
        padding-left: 2px;
        border:thin solid #d3d3d3;
    }
    .TableData TR:hover {
        background: rgba(0,0,0,0.05);
    }
    .TableData .cotSTT {
        text-align:center;
        width: 10%;
    }
    .TableData .cotTenSanPham {
        text-align:left;
        width: 40%;
    }
    .TableData .cotHangSanXuat {
        text-align:left;
        width: 20%;
    }
    .TableData .cotGia {
        text-align:right;
        width: 120px;
    }
    .TableData .cotSoLuong {
        text-align: center;
        width: 50px;
    }
    .TableData .cotSo {
        text-align: right;
        width: 120px;
    }
    .TableData .tong {
        text-align: right;
        font-weight:bold;
        text-transform:uppercase;
        padding-right: 4px;
    }
    .TableData .cotSoLuong input {
        text-align: center;
    }
    @media print {
     @page {
     margin: 0;
     border: initial;
     border-radius: initial;
     width: initial;
     min-height: initial;
     box-shadow: initial;
     background: initial;
     page-break-after: always;
    }
    }</style>
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION["user"])){
                 header('Location: http://localhost:8080/baitaplon_nhom7/admin/login');
                 exit();
        }
        
        ?>
    <div id="page" class="page">
        <div class="header">
            <div class="company">Khách sạn SUN RISE</div>
        </div>
      <br/>
      <div class="title">
            HÓA ĐƠN THANH TOÁN
            <br/>
            -------oOo-------
      </div>
      <br/>
      <br/>
      <table class="TableData">
       
        <?php
        $first_date = strtotime( $booking->CheckIn);
            $second_date = strtotime( $booking->CheckOut);
            $datediff = abs($first_date - $second_date);
            $ngay ='';
            if(floor($datediff/(60*60*24))<=0){
               $ngay = 1;
            }else $ngay = floor($datediff / (60*60*24));
         # code...
    echo "<tr>
          <td>Họ tên: $booking->TenKH </td> <td> Ngày vào: $booking->CheckIn</td>
        </tr>
         <tr>
          <td>Địa chỉ: $booking->DiaChi </td> <td> Ngày ra: $booking->CheckOut</td>
        </tr>
         <tr>
          <td>Số điện thoại: $booking->SoDienThoai </td> <td> Số ngày:".$ngay
           ."
            </td>
        </tr>
         <tr>
          <td>Loại phòng: $booking->ID_LoaiPhong</td> <td> Số phòng $booking->SoPhong</td>
        </tr> ";
    
      
    ?>
       
        
      </table>
     Dịch vụ
      <hr>
      <table class="TableData"><tr><th>Tên</th><th>Số tiền</th></tr>
        <?php
        
        echo "
        <tr>
          <td>Dịch vụ: $dichvu->TenDichVu </td> <td id='giadv' data-id ='".$dichvu->GiaTien."' >".number_format($dichvu->GiaTien)."</td>
        </tr>
         <tr>
          <td data-id='$ngay' id = 'ngay'>Giá phòng: (". $ngay." ngày) </td> <td id='giaphong'></td>
        </tr>
         <tr>
          <td>Giảm giá cho toàn hóa đơn (%)</td> <td id='khuyenmai'data-id='$HoaDon->KhuyenMai' >$HoaDon->KhuyenMai </td>
        </tr>
         <tr>
          <td colspan='1' class='tong'>Tổng cộng (VND)</td>
          <td class='cotSo' data-id='$HoaDon->TongTien'>".number_format($HoaDon->TongTien)."</td>
        </tr> ";
        ?>
      </table>
      <div class="footer-left"> Hà Nội, ngày <?php echo  date_format(date_create($HoaDon->NgayTao),'d')?> 
        tháng <?php echo  date_format(date_create($HoaDon->NgayTao),'m')?> 
        năm <?php echo  date_format(date_create($HoaDon->NgayTao),'Y')?><br/>
        Khách hàng <br>
        <?php echo $booking->TenKH?>
    </div>
    <div class="footer-right"> Hà Nội, ngày <?php echo  date_format(date_create($HoaDon->NgayTao),'d')?> 
    tháng <?php echo  date_format(date_create($HoaDon->NgayTao),'m')?> 
    năm <?php echo  date_format(date_create($HoaDon->NgayTao),'Y')?><br/>
         Khách sạn<br>
        Sun Rise
    </div>
   
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
      $(document).ready(function(){
           var giadv = $('#giadv').data('id');
           var tongtien = $('.cotSo').data('id');
           var khuyenmai = $('#khuyenmai').data('id');
           var ngay = $('#ngay').data('id');
           var giaphong = parseInt(tongtien)/(100 - parseInt(khuyenmai))*100 - parseInt(giadv);
           console.log(giaphong);
           $('#giaphong').html(giaphong.toLocaleString('en'));



      })


   </script>


</html>