<?php
    $sql = "SELECT * FROM taikhoannhanvien ";
    $query = mysqli_query($connect, $sql);
?>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
    <div class="container-xxl bg-white p-0">
        <div class="container-fluid">
       
            <div class="card">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="navbar-nav">
                        <a class="nav-link active">
                            <h5 style="color:#00B98E;" class="brand-title">Tài khoản nhân viên</h5>
                        </a>
                        <a class="nav-link " aria-current="page" href="index_admin.php">Trang chủ</a>
                    </div>
                    </div>
                </div>
                </nav>
        <div class="card-body">
            <table id="table" class="table">
                <thead class="table-success">
                    <tr>
                        <th>ID</th> <!-- id book -->
                        <th>Tên đăng nhập</th> 
                        <th>Mật khẩu</th>
                        <th>Vai trò</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_assoc($query))
                    { ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['TenDangNhap']; ?></td>
                        <td><?php echo $row['MatKhau'];?></td>
                        <td><?php echo ($row['role'] == 1) ? 'Admin' : (($row['role'] == 2) ? 'Kế toán' : ''); ?></td>
                        
                        <td>
                            <a href="ac_taikhoan.php?page_layout=sua&id=<?php echo $row['TaiKhoanID'] ?>">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return Del('<?php echo $row['TenDangNhap']; ?>')" href="ac_taikhoan.php?page_layout=xoa&id=<?php echo $row['TaiKhoanID'] ?>">Xóa</a>
                            
                          
                        </td> 
                    </tr>
                   <?php } ?>

                </tbody>
            </table>
            <a class="btn btn-primary" href="ac_taikhoan.php?page_layout=them">Thêm mới</a>
        </div>

    </div>
</div>

<script>

    function Del(name)
    {

        return confirm("Bạn có chắc là muốn xóa tài khoản : "+ name + " ?" );
    }

</script>
