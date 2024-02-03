<?php
    $sql = "SELECT * FROM loaixe ";
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
                            <h5 style="color:#00B98E;" class="brand-title">Loại xe</h5>
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
                        
                        <th>ID</th> 
                        <th>Tên loại xe</th>
                        <th>Sửa</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_assoc($query))
                    { ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                 
                        <td><?php echo $row['TenLoaiXe'];?></td>
                        <td>
                            <a href="ac_loaixe.php?page_layout=sua&id=<?php echo $row['LoaiXeID'] ?>">Sửa</a>
                        </td>
                
                        
                     
                    </tr>
                   <?php } ?>

                </tbody>
            </table>
            <a class="btn btn-primary" href="ac_loaixe.php?page_layout=them">Thêm mới</a>
        </div>

    </div>
</div>

<script>
    function Del(name)
    {
        return confirm("Bạn có chắc là muốn xóa loại xe : "+ name + " này, nếu xóa thì tất cả dữ liệu xe liên quan đến loại xe sẽ bị xóa ?" );
    }
</script>