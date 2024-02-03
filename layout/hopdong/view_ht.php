<?php

require_once 'config/data.php';

   $sql = "SELECT *
   FROM hopdong
   INNER JOIN datxe ON hopdong.DatXeID = datxe.DatXeID
   WHERE hopdong.trangthaihopdong = 'Hoàn thành'
   ORDER BY hopdong.HopDongID ASC;";
$query = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <div class="container-fluid">
       
            <div class="card">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="navbar-nav">
                        <a class="nav-link active">
                            <h5 style="color:#00B98E;" class="brand-title">Danh sách hợp đồng</h5>
                        </a>
                        <a class="nav-link " aria-current="page" href="index_admin.php">Trang chủ</a>
                        <a class="nav-link" href="ac_hopdong.php?page_layout=view_cht">Hợp đồng chưa hoàn thành</a>
                    </div>
                    </div>
                </div>
                </nav>
        <div class="card-body">
    
            <table id="table" class="table">
                <thead class="table-success">
                    <tr>
                        <th>ID</th> 
                        <th>Đặt xe ID</th>
                        <th>Ngày lập hợp đồng </th>
                        <th>Địa điểm nhận xe</th>
                        <th>Địa điểm trả xe</th>
                        <th>Tiền cọc</th>
                        <!-- tiền còn lại phải = 0 // set lại -->
                        <th>Tiền còn lại</th> 
                 
                        <th>Thao tác</th>
                       
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1; 
                    while($row = mysqli_fetch_assoc($query))
                    { ?>
                        <tr>
                        <td><?php echo $row['HopDongID'];?></td>
                         <td><?php echo $row['DatXeID'];?></td>
                    

                        <td><?php echo $row['NgayLapHopDong'];?></td>
                        <td><?php echo $row['DiaDiemNhanXe'];?></td>
                        <td><?php echo $row['DiaDiemTraXe'];?></td>
                      
                        <td><?php echo $row['TienCoc'];?></td>
                        <td><?php echo $row['TienConLai'];?></td>
                
                        <td>    
                        
                        <a href="ac_hopdong.php?page_layout=hoadon&id=<?php echo $row['HopDongID'] ?>">
                        <i class="fas fa-print text-primary"></i></a>
                        
                        </td>
                       
                       

                       
                       
                    </tr>
                   <?php } ?>

                </tbody>
            </table>
 
        </div>

    </div>
</div>
 
</body>
</html>
