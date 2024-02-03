<?php
$sql_query_kh = "SELECT * FROM khachhang";
$query_kh = mysqli_query($connect, $sql_query_kh);


$id = $_GET['id'];
$sql = "SELECT *
FROM xe 
WHERE XeID = $id";

$query = mysqli_query($connect, $sql);
$row_up = mysqli_fetch_assoc($query);

$error_message = ""; // Khởi tạo biến thông báo lỗi

if (isset($_POST['sbm'])) {

    $KhachHangID = $_POST['KhachHangID'];
    $XeID = $row_up['XeID'];
    $NgayDat = $_POST['NgayDat'];
    $NgayNhanXe = $_POST['NgayNhanXe'];
    $NgayTraXe = $_POST['NgayTraXe'];
    $TrangThai = $_POST['TrangThai'];


    $sql = "INSERT INTO datxe(KhachHangID, XeID, NgayDat, NgayNhanXe,NgayTraXe,TrangThai) 
            VALUES ('$KhachHangID', '$XeID', '$NgayDat','$NgayNhanXe','$NgayTraXe','$TrangThai')";
    $query = mysqli_query($connect, $sql);

    $sql_update_xe = "UPDATE xe SET TinhTrangXe = 'Đã đặt trước' WHERE XeID = $XeID";
    $query_update_xe = mysqli_query($connect, $sql_update_xe);

    if ($query_update_xe) {
        header('location: ac_datxe.php?page_layout=view');
    } else {
        $error_message = "Có lỗi xảy ra khi cập nhật trạng thái xe.";
    }

    header('location: ac_datxe.php?page_layout=view');
}
?>

<!-- Phần còn lại của biểu mẫu HTML -->
<head>
    <link rel="stylesheet" href="css/forms2.css">
</head>
<div class="container-fluid">
    <div class="card">
        <div class="card-logo">
            <a href="index.html" class="inner-logo">
                <div class="logo-icon">
                    <img src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h1 class="logo-text">Mioto</h1>
            </a>
        </div>
        <div class="card-header">
            <h2>Đặt xe</h2>
        </div>
        <div class="card-body">
            <?php
            if (!empty($error_message)) {
                echo '<div class="alert alert-danger">' . $error_message . '</div>';
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên khách hàng</label>
                    <select class="form-control" name="KhachHangID">
                        <?php
                        while ($row_brand = mysqli_fetch_assoc($query_kh)) { ?>
                            <option value="<?php echo $row_brand['KhachHangID']; ?>"><?php echo $row_brand['HoTen']; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="DatXeID">ID xe</label>
                    <input type="text" name="XeID" class="form-control" readonly value="<?php echo $row_up['TenXe']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Ngày đặt</label>
                    <input type="date" name="NgayDat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Ngày nhận</label>
                    <input type="date" name="NgayNhanXe" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Ngày trả xe</label>
                    <input type="date" name="NgayTraXe" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <input type="text" name="TrangThai" class="form-control" value="Chờ xác nhận" readonly>
                </div>
                <div class="inner-button">
                    <a href="ac_banggia.php"><p class="btn btn-back" type="submit" >Trở về</p></a>
                    <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>