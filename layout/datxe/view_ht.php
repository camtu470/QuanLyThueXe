<?php
$connect = mysqli_connect('localhost','root','','thuexemain');
if($connect)
{
    mysqli_query($connect, "SET NAMES 'UTF8'");
    // echo "ket noi thanh cong";

}
else
{
    echo "KET NOI THAT BAI";
}

    $sql = "SELECT *
    FROM datxe
    INNER JOIN xe ON datxe.XeID = xe.XeID
    INNER JOIN khachhang ON datxe.KhachHangID = khachhang.KhachHangID
    WHERE datxe.TrangThai = 'Hoàn thành'
    ORDER BY DatXeID ASC;";
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
                            <h5 style="color:#00B98E;" class="brand-title">Danh sách đặt xe</h5>
                        </a>
                        <a class="nav-link " aria-current="page" href="index_admin.php">Trang chủ</a>
                        <a class="nav-link" href="ac_datxe.php?page_layout=view">Danh sách đặt xe chưa xác nhận</a>
                    </div>
                    </div>
                </div>
                </nav>
        <div class="card-body">
            <table id="table" class="table">
                <thead class="table-success">
                    <tr>
                        <th>ID</th> <!-- id book -->
                        <th>Tên khách hàng</th> 
                        <th>Tên xe</th>
                        <th>Ngày đặt</th>
                        <th>Ngày nhận</th>
                        <th>Ngày trả xe</th>
                        <th>Trạng thái</th>
                     
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1; 
                    while($row = mysqli_fetch_assoc($query))
                    { ?>
                        <tr>
                        <td><?php echo $row['DatXeID']; ?></td>
                        <td><?php echo $row['HoTen']; ?></td>
                        <td><?php echo $row['TenXe'];?></td>
                    
                        <td><?php echo $row['NgayDat'];?></td>
                        <td><?php echo $row['NgayNhanXe'];?></td>
                        <td><?php echo $row['NgayTraXe'];?></td>
                        <td><?php echo $row['TrangThai'];?></td>

                       
                    </tr>
                   <?php } ?>

                </tbody>
            </table>
          
        </div>

    </div>
</div>

