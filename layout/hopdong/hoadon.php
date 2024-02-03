
     
     <?php
if (isset($_GET['id']))  {
    // Lấy ID của cuốn sách từ tham số truy vấn
    $sach_id = $_GET['id'];

    // Truy vấn cơ sở dữ liệu để lấy thông tin của cuốn sách dựa trên ID
    $sql = "SELECT *
    FROM hopdong
    INNER JOIN datxe ON hopdong.DatXeID = datxe.DatXeID
    INNER JOIN khachhang ON datxe.KhachHangID = khachhang.KhachHangID
    INNER JOIN xe ON datxe.XeID = xe.XeID
    -- INNER JOIN hoadon ON hopdong.HoaDonID = hoadon.HoaDonID
    WHERE hopdong.HopDongID = $sach_id";

$query = mysqli_query($connect, $sql);

    if ($row = mysqli_fetch_assoc($query)) {
        $TongTien = $row['TienCoc'] * 2;
        echo '

     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<style>
  body {
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
    text-align:left;
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
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.footer-center {
    text-align:center;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:center;
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
}



.text-left{text-align:left;}
.text-right{text-align:right;}
.text-center{text-align:center;}
.border{border:2px solid #000;border-bottom:unset;}
.border thead{border-bottom:2px solid #000;}
.border tbody{border-bottom:2px solid #000;}
.border-bottom{border-bottom:2px solid #000 !important;}
.border-right{border-right:2px solid #000 !important;}
.border-left{border-left:2px solid #000 !important;}
.border-top{border-top:2px solid #000 !important;}
.border-unset{border:none !important;}
.border-unset td{border:none !important;}
.TableData{border:none !important;}

.logo{width: 30%;}
.logo img{
  width: 150px;
  height: auto;
  float:left;
}
.company{
  float:left;
  width:70%;
}
.footer-left{font-size:15px}
.NguoiThue {
    text-align:left;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 20px;
    bottom:1px;
    padding-left: 50px;
}
.choThue{
    text-align:center;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 20px;
    float:right;
    bottom:1px;
   padding-left: 150px ;
}
button {
    background-color: #007BFF; /* Màu nền cho nút */
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    width: auto;
    height: auto;
    margin-bottom: 20px;
  
}

button:hover {
    background-color: #0056b3; /* Màu nền khi rê chuột vào nút */
}


   

</style>

    <title>Document</title>
</head>
<body>
    
</body>
</html>
<div id="page" class="page">
    <div class="header">
    
    <div class="logo"><img src="img/logo.jpg"></div>
    <div class="company">Quản Lý Thuê Xe<br/>ĐC.10 QL22, Tân Xuân, Hóc Môn, TP Hồ Chí Minh <br/>ĐT: 02253.623.088 - Fax: 02253.623.089</div>
    </div>
  <br> ----------------------------------------------------------------------------------------------------------------
  <br/>
  <div class="title">
    <b>HÓA ĐƠN THUÊ XE
        <br/>
    </b>
    <br/>
    <br/>

 <div class="footer-left">Mã hóa đơn : ' . $row['HopDongID'] . '
    <br><br/>Khách Hàng : ' . $row['HoTen'] . '
    <br><br/>CCCD/CMND : ' . $row['CMND'] . '
</div>
<div class="footer-left">Ngày lập : ' . $row['NgayLapHopDong'] . '
    <br><br/>Trạng thái : ' . $row['trangthaihopdong'] . '
    <br><br/>Cơ quan: ' . $row['CoQuan'] . '
</div>
  </div>
  <table class="TableData border-top">
    <thead class="border-left border-right border-bottom border-top">
      <tr>
        <th>Stt</th>
            <th>Xe</th>
            <th>Giá xe</th>
            <th>Địa điểm nhận</th>
            <th>Địa điểm trả</th>
            <th>Ngày Bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Thành tiền</th>
      </tr>
    </thead>
    <tbody  class="border-left border-right border-bottom">
      <tr>
        <td class="text-center">1</td>
        <td>' . $row['TenXe'] . '</td>
        <td class="text-center">' . $row['GiaXe'] . '</td>
        <td class="text-right">' . $row['DiaDiemNhanXe'] . '</td>
        <td class="text-right">' . $row['DiaDiemTraXe'] . '</td>
        <td class="text-right">' . $row['NgayNhanXe'] . '</td>
        <td class="text-right">' . $row['NgayTraXe'] . '</td>
        <td class="text-right">' . $TongTien . '</td>
      </tr>
      <tr>
        <td class="text-center">2</td>
        <td></td>
        <td class="text-center"></td>
        <td class="text-right"></td>
        <td class="text-right"></td>
        <td class="text-right"></td>
        <td class="text-right"></td>
      
      </tr>
       <tr>
        <td class="text-center">3</td>
        <td></td>
        <td class="text-center"></td>
        <td class="text-right"></td>
        <td class="text-right"></td>
        <td class="text-right"></td>
        <td class="text-right"></td>
      </tr>
       <tr>
        <td class="text-center">4</td>
        <td></td>
        <td class="text-center"></td>
        <td class="text-right"></td>
        <td class="text-right"></td>
        <td class="text-right"></td>
        <td class="text-right"></td>
      </tr>
    </tbody>
    <tfoot>
      <tr class="border-left border-right">
        <td colspan="6" class="text-right"><b>Tổng tiền</b></td>
        <td class="text-right"><b>  <td class="text-right">' . $TongTien . '</td></b></td>
      </tr>
      <tr class="border-left border-right">
        <td colspan="6" class="text-right">%Chiết khấu tổng hóa đơn</td>
        <td class="text-right"> <td class="text-right">0</td></td>
      </tr>
      <tr class="border-left border-right">
        <td colspan="6" class="text-right">Tiền Đã Ứng</td>
        <td class="text-right">  <td class="text-right">' . $row['TienCoc'] . '</td></td>
      </tr>
      <tr class="border-bottom border-left border-right">
        <td colspan="6" class="text-right border-bottom"><b>Phải thanh toán</b></td>
        <td class="text-right"><b>  <td class="text-right">' . $row['TienConLai'] . '</td></b></td>
      <!-- </tr>
            <tr class="border-unset">
        <td colspan="5" class="text-right">Tiền khách đưa: </td>
        <td class="text-right"><b>400.000</b></td>
      </tr> -->
            <!-- <tr class="border-unset">
        <td colspan="5" class="text-right">Tiên thừa trả lại cho khách: </td>
        <td class="text-right"><b>10.000</b></td>
      </tr> -->
    </tfoot>
  </table>
  <br/>
  <div class = "NguoiThue" > Người Thuê</div>
  <div class ="choThue" > Cho Thuê </div>
  <button type="submit">In đơn</button>
  <div class="text-center">(Vui lòng trả xe vào giờ hành chính)<br/><br/><b><i>Cảm ơn và hẹn gặp lại quý khách!</i></b></div>
</div>

</body>
</html>
';
    } else {
        echo "Không tìm thấy cuốn sách.";
    }
} else {
    echo "ID sách không hợp lệ.";
}
?>
