<?php
    $sql_theloai = "SELECT * FROM taikhoannhanvien";
    $query_theloai = mysqli_query($connect, $sql_theloai);

    if(isset($_POST['sbm']))
    {
    
       $TenDangNhap =  $_POST['TenDangNhap'];
       $MatKhau =  $_POST['MatKhau'];
       $role =  $_POST['role'];
  
       $sql = "INSERT INTO taikhoannhanvien (TenDangNhap,MatKhau,role) 
       VALUES ('$TenDangNhap','$MatKhau',$role)";
        $query = mysqli_query($connect, $sql);
  
        header('location: ac_taikhoan.php?page_layout=view');
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
            <h2>Thêm tài khoản</h2>
        </div>
        <div class="card-body">
           <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input type="text" name="TenDangNhap" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Mật Khẩu</label>
                <input type="text" name="MatKhau" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Vai trò</label> <br>
                <label for="">1: Admin - 2: Kế toán</label>
                <input type="number" name="role" class="form-control" required>
            </div>
        
            <div class="inner-button">
                <a href="ac_taikhoan.php"><p class="btn btn-back" type="submit" >Trở về</p></a>
                <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
            </div>
           </form>   
        </div>
    </div>
</div>