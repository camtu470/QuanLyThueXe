<?php
// Kết nối với cơ sở dữ liệu (bạn cần định nghĩa biến $connect trước đoạn mã này)
require_once 'config/data.php';

$sql_query_kh = "SELECT * FROM khachhang";
$query_kh = mysqli_query($connect, $sql_query_kh);

// Fetch the contract details you want to process.
$id = $_GET['id'];
$sql = "SELECT *
FROM datxe 
INNER JOIN xe ON datxe.XeID = xe.XeID
INNER JOIN khachhang ON datxe.KhachHangID = khachhang.KhachHangID
WHERE DatXeID = $id";

$query = mysqli_query($connect, $sql);
$row_up = mysqli_fetch_assoc($query);

if (isset($_POST['sbm'])) {
    $DatXeID = $row_up['DatXeID'];
    $NgayLapHopDong = isset($_POST['NgayLapHopDong']) ? $_POST['NgayLapHopDong'] : null;

    $DiaDiemNhanXe = $_POST['DiaDiemNhanXe'];
    $DiaDiemTraXe = $_POST['DiaDiemTraXe'];

    $NgayNhanXe = $row_up['NgayNhanXe'];
    $NgayTraXe = $row_up['NgayTraXe'];

    $soNgay = (int) date_diff(date_create($NgayNhanXe), date_create($NgayTraXe))->format('%a') + 1;
    $GiaXe = $row_up['GiaXe'];
    $XeID = $row_up['XeID'];
    $TongTien = $soNgay * $GiaXe;
    $TienCoc = $TongTien / 2;
    $TienConLai = $TienCoc;
    $trangthaihopdong = $_POST['trangthaihopdong'];

    $sql_insert_hopdong = "INSERT INTO hopdong (DatXeID, NgayLapHopDong, DiaDiemNhanXe, DiaDiemTraXe, TienCoc, TienConLai, trangthaihopdong) 
    VALUES ($DatXeID,'$NgayLapHopDong', '$DiaDiemNhanXe', '$DiaDiemTraXe', $TienCoc, $TienConLai, '$trangthaihopdong')";

    $query_insert_hopdong = mysqli_query($connect, $sql_insert_hopdong);

    if ($query_insert_hopdong) {
        $HopDongID = mysqli_insert_id($connect);

        $sql_update_datxe = "UPDATE datxe SET TrangThai = 'Hoàn Thành' WHERE DatXeID = $DatXeID";
        $query_update_datxe = mysqli_query($connect, $sql_update_datxe);

        // Check if the update was successful
        if ($query_update_datxe) {
            $sql_update_xe = "UPDATE xe SET TinhTrangXe = 'Đang thuê' WHERE XeID = $XeID";
            $query_update_xe = mysqli_query($connect, $sql_update_xe);

            $NgayLapHoaDon = $NgayLapHopDong;
            $sql_insert_hoadon = "INSERT INTO hoadon (HopDongID, NgayLapHoaDon, TongTien, DaThanhToan) 
            VALUES ($HopDongID, '$NgayLapHoaDon', $TongTien, $TienCoc)";

            $query_insert_hoadon = mysqli_query($connect, $sql_insert_hoadon);

            if ($query_insert_hoadon) {
                header('location: ac_hopdong.php?page_layout=view_cht');
            } else {
                echo "Lỗi khi thêm vào bảng hóa đơn: " . mysqli_error($connect);
            }
        } else {
            echo "Lỗi khi cập nhật trạng thái đặt xe: " . mysqli_error($connect);
        }
    } else {
        echo "Lỗi khi thêm vào bảng hợp đồng: " . mysqli_error($connect);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Thêm nội dung head của bạn tại đây -->
    <link rel="stylesheet" href="css/forms2.css">
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-logo">
                <a href="index_admin.php" class="inner-logo">
                    <div class="logo-icon">
                        <img src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="logo-text">Mioto</h1>

                </a>
            </div>
            <div class="card-header">
                <h2>Tạo hợp đồng</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label for="DatXeID">ID Đặt xe</label>
                    <input type="text" name="DatXeID" class="form-control" readonly value="<?php echo $row_up['DatXeID']; ?>">
                </div>
              
                <div class="form-group">
                    <label for="GiaXe">Giá Xe 1 ngày</label>
                    <input type="text" name="GiaXe" class="form-control" readonly value="<?php echo $row_up['GiaXe']; ?>">
                </div>

                    <div class="form-group">
                        <label for="NgayLapHD">Ngày lập hợp đồng</label>
                        <input type="date" name="NgayLapHopDong" class="form-control" id="NgayLapHopDong">
                    </div>

                    <div class="form-group">
                    <label for="NgayNhanXe">Ngày nhận xe</label>
                    <input type="text" name="NgayNhanXe" class="form-control" readonly value="<?php echo $row_up['NgayNhanXe']; ?>">
                </div>
                <div class="form-group">
                    <label for="NgayTraXe">Ngày trả xe</label>
                    <input type="text" name="NgayTraXe" class="form-control" readonly value="<?php echo $row_up['NgayTraXe']; ?>">
                </div>

                    <div class="form-group">
                        <label for="DiaDiemNhanXe">Địa điểm nhận xe</label>
                        <input type="text" name="DiaDiemNhanXe" class= "form-control" id="DiaDiemNhanXe">
                    </div>

                    <div class="form-group">
                        <label for="DiaDiemTraXe">Địa điểm trả xe</label>
                        <input type="text" name="DiaDiemTraXe" class="form-control" id="DiaDiemTraXe">
                    </div>
           

                    <div class="from-group">
                    <label for="">Tình trạng hợp đồng</label>
                    <select name="trangthaihopdong" class="form-control" required>
                        <option value="Đã đóng 50%">Đã đóng 50%</option>
                        <option value="Hoàn thành">Hoàn thành</option>
                      
                    </select>
                </div>
                <div class="inner-button">
                    <a href="ac_datxe.php"><p class="btn btn-back"  >Trở về</p></a>
                    <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
                </div>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>
