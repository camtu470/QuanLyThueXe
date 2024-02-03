<?php
    $id = $_GET['id'];
    $sql_up = "SELECT * FROM loaixe WHERE LoaiXeID = $id";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm']))
    {

       $TenLoaiXe =  $_POST['TenLoaiXe'];

       $sql = "UPDATE loaixe SET TenLoaiXe = '$TenLoaiXe' WHERE LoaiXeID = $id";
        $query = mysqli_query($connect, $sql);
        header('location: ac_loaixe.php?page_layout=view');
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
            <h2>Sửa thông tin loại xe</h2>
        </div>
        <div class="card-body">
           <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tên loại xe</label>
                <input type="text" name="TenLoaiXe" class="form-control" required value="<?php echo $row_up['TenLoaiXe']; ?>">
            </div>
            <div class="inner-button">
                    <a href="ac_loaixe.php"><p class="btn btn-back" type="submit" >Trở về</p></a>
                    <button name="sbm" class="btn btn-success" type="submit">Lưu</button>
            </div>
           </form>   
        </div>
    </div>
</div>