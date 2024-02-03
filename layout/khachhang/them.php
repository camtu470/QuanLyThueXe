<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $HoTen = $_POST['HoTen'];
    $CMND = $_POST['CMND'];
    $BLX = $_POST['BLX'];
    $CoQuan = $_POST['CoQuan'];
    $Email = $_POST['Email'];

    $errors = [];

    if (empty($HoTen)) {
        $errors[] = "Vui lòng nhập tên khách hàng.";
    }

    if (empty($CMND)) {
        $errors[] = "Vui lòng nhập CMND.";
    }
    if (empty($errors)) {
        // Thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO khachhang (HoTen, CMND,BLX , CoQuan, Email) 
                VALUES ('$HoTen', $CMND, '$BLX', '$CoQuan', '$Email')";
        $query = mysqli_query($connect, $sql);

        if ($query) {
            header('location: ac_banggia.php');
        } else {
            echo "Có lỗi xảy ra khi thêm khách hàng.";
        }
    }
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
            <h2>Thêm khách hàng</h2>
        </div>
        <div class="card-body">
            <?php
            if (!empty($errors)) {
                echo '<div class="alert alert-danger"><ul>';
                foreach ($errors as $error) {
                    echo '<li>' . $error . '</li>';
                }
                echo '</ul></div>';
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên khách hàng</label>
                    <input type="text" name="HoTen" class="form-control" required value="<?php echo isset($HoTen) ? $HoTen : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="">CMND</label>
                    <input type="number" name="CMND" class="form-control" required value="<?php echo isset($CMND) ? $CMND : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="">BLX</label>
                    <input type="text" name="BLX" class="form-control" required value="<?php echo isset($BLX) ? $BLX : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="">Cơ quan</label>
                    <input type="text" name="CoQuan" class="form-control" value="<?php echo isset($CoQuan) ? $CoQuan : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="Email" class="form-control" value="<?php echo isset($Email) ? $Email : ''; ?>">
                </div>
                <div class="inner-button">    
                   

                    <a href="ac_banggia.php"><p class="btn btn-back" type="submit" >Trở về</p></a>
                    <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>