<?php
// $sql_brand1 = "SELECT * FROM LoaiXe";
// $query_brand1 = mysqli_query($connect, $sql_brand1);


$sql_query_loaixe = "SELECT LoaiXeID, TenLoaiXe FROM loaixe";
$query_loaixe = mysqli_query($connect, $sql_query_loaixe);


if (isset($_POST['sbm'])) {
    $LoaiXeID =  $_POST['LoaiXeID'];
    $TenXe =  $_POST['TenXe'];
    $AnhXe =  $_POST['AnhXe'];
    $TinhTrangXe =  $_POST['TinhTrangXe'];
    $GiaXe =  $_POST['GiaXe'];
    $sql = "INSERT INTO xe (LoaiXeID, TenXe, AnhXe, TinhTrangXe, GiaXe) 
           VALUES ('$LoaiXeID', '$TenXe', '$AnhXe', '$TinhTrangXe', '$GiaXe')";

    $query = mysqli_query($connect, $sql);

    header('location: ac_xe.php?page_layout=view');
}
?>

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
            <h2>Thêm xe mới</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Loại xe</label>
                    <select class="form-control" name="LoaiXeID">
                        <?php
                        while ($row_brand = mysqli_fetch_assoc($query_loaixe)) { ?>
                            <option value="<?php echo $row_brand['LoaiXeID']; ?>"><?php echo $row_brand['TenLoaiXe']; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tên xe</label>
                    <input type="text" name="TenXe" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Link ảnh xe</label> <br>
                    <input type="text" name="AnhXe" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tình trạng xe</label>
                    <select name="TinhTrangXe" class="form-control" required>
                        <option value="Có sẵn">Có sẵn</option>
                        <option value="Đang thuê">Đang thuê</option>
                        <option value="Đã đặt trước">Đã đặt trước</option>
                        <option value="Không hoạt động">Không hoạt động</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Giá xe</label>
                    <input type="number" name="GiaXe" class="form-control" required>
                </div>
                <div class="inner-button">
                    <a href="ac_xe.php"><p class="btn btn-back" type="submit" >Trở về</p></a>
                    <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>