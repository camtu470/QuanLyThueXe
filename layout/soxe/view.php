<?php
require_once 'config/data.php';

    $sql = "SELECT * FROM soxe";
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
                            <h5 style="color:#00B98E;" class="brand-title">Sổ xe</h5>
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
                        <th>STT</th> 
                        <th>ID xe</th> 
                        <th>Ngày thuê</th>
                        <th>Ngày trả</th>
                        <th>ID Hợp đồng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_assoc($query))
                    { 
                     
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['XeID']; ?></td>
                                <td><?php echo $row['NgayThue']; ?></td>
                                <td><?php echo $row['NgayTra']; ?></td>
                                <td><?php echo $row['HopDongID'];?></td>
                            </tr>
                            <?php 
                        
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
