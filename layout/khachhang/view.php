<?php
    $sql = "SELECT * FROM khachhang";
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
                            <h5 style="color:#00B98E;" class="brand-title">Danh sách khách hàng</h5>
                        </a>
                        <a class="nav-link " aria-current="page" href="index_admin.php">Trang chủ</a>
                    </div>
                    </div>
                </div>
                </nav>
        <div class="card-body">
            <table id="table" class="table">
            <a class="btn btn-primary" href="ac_khachhang.php?page_layout=them1">Thêm mới</a><br><br>
                <thead class="table-success">
                    <tr>
                        <th>ID</th> 
                        <th>Họ tên</th> 
                        <th>CMND</th>
                        <th>BLX</th>
                        <th>Cơ quan</th>
                        <th>Email</th>
                 
                        <th>Sửa</th>
                        <!-- <th>Xóa</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_assoc($query))
                    { ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['HoTen']; ?></td>
                        <td><?php echo $row['CMND'];?></td>
                        <td><?php echo $row['BLX'];?></td>
                        <td><?php echo $row['CoQuan'];?></td>
                        <td><?php echo $row['Email'];?></td>
                       
                        
                        <td>
                            <a href="ac_khachhang.php?page_layout=sua&id=<?php echo $row['KhachHangID'] ?>">Sửa</a>
                        </td>
                      
                    </tr>
                   <?php } ?>

                </tbody>
            </table>
          
        </div>

    </div>
</div>

<script>
