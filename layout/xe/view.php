<?php

    $sql = "SELECT *
            FROM xe
            INNER JOIN loaixe ON xe.LoaiXeID = loaixe.LoaiXeID
            ORDER BY xe.XeID ASC;";
    $query = mysqli_query($connect, $sql);
        
?>

<?php
// Kết nối đến cơ sở dữ liệu (đã được thực hiện trong tập lệnh của bạn)

// 1. Lấy tùy chọn từ cơ sở dữ liệu
$loaixeOptions = [];


// Lấy tùy chọn cho loại xe
$sqlLoaixeOptions = "SELECT * FROM loaixe";
$queryLoaixeOptions = mysqli_query($connect, $sqlLoaixeOptions);
while ($row = mysqli_fetch_assoc($queryLoaixeOptions)) {
    $loaixeOptions[] = $row;
}



?>

<?php
// 3. Xử lý bộ lọc và truy vấn tương ứng
if (isset($_GET['loaixe'])) {
    $loaixeFilter = $_GET['loaixe'];
} else {
    $loaixeFilter = '';
}



if (isset($_GET['search'])) {
    $searchKeyword = mysqli_real_escape_string($connect, $_GET['search']);
} else {
    $searchKeyword = '';
}



$sql = "SELECT *
        FROM xe
        INNER JOIN loaixe ON xe.LoaiXeID = loaixe.LoaiXeID
    
        WHERE 1"; // Điều kiện ban đầu

if (!empty($loaixeFilter)) {
    $sql .= " AND loaixe.LoaiXeID = '$loaixeFilter'";
}

if (!empty($searchKeyword)) {
    $sql .= " AND xe.TenXe LIKE '%" . $searchKeyword . "%'";
}
$query = mysqli_query($connect, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thuê xe</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <div class="container-fluid">
       
            <div class="card">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="navbar-nav">
                        <a class="nav-link active">
                            <h5 style="color:#00B98E;" class="brand-title">Thông tin Xe</h5>
                        </a>
                        <a class="nav-link " aria-current="page" href="index_admin.php">Trang chủ</a>
                    </div>
                    </div>
                </div>
                </nav>

                <!-- 2. Hiển thị tùy chọn trong bộ lọc -->
                <form method="GET" action="ac_xe.php">
                    <br>
                    <label style="padding: 10px;" for="loaixe">Loại xe:</label>

                    <select name="loaixe" id="loaixe">
                        <option value="">Tất cả</option>
                        <?php foreach ($loaixeOptions as $loaixeOption) { ?>
                            <option value="<?php echo $loaixeOption['LoaiXeID']; ?>"><?php echo $loaixeOption['TenLoaiXe']; ?></option>
                        <?php } ?>
                    </select>

                 

                    <input type="submit" value="Lọc">
                    
                    <form method="GET" action="ac_xe.php">
                <label style="padding: 10px;" for="search"></label>
            <input type="text" name="search" id="search" placeholder="Nhập tên xe...">
            <input type="submit" value="Search">
        </form>
                </form>
        <div class="card-body">
            <table id="table"class="table">
            <a class="btn btn-primary" href="ac_xe.php?page_layout=them">Thêm mới</a> <br><br>
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Loại xe</th>      
                        <th>Tên xe</th>
                        <th>Ảnh xe</th>
                       
                        <th>Tình trạng</th>
                        <th>Giá</th>
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
                    
                        <td><?php echo $row['XeID'];?></td>
                       <td><?php echo $row['TenLoaiXe'];?></td>
                       <td><?php echo $row['TenXe'];?></td>
                                 
            
                       <td>
                         <img style="width:150px;" src="<?php echo $row['AnhXe'];?> " >
                       </td>
                        
                        
                        <td><?php echo $row['TinhTrangXe'];?></td>
                         <td><?php echo $row['GiaXe']; ?></td>
                        <td>
                            <a href="ac_xe.php?page_layout=sua&id=<?php echo $row['XeID'] ?>">Sửa</a>
                        </td>
                       
                       
                
                      
                    </tr>
                   <?php } ?>

                </tbody>
            </table>
       
         
        </div>

    </div>
</div>


<script>
    function Del(name)
    {
        return confirm("Bạn có chắc là muốn Xe : "+ name + " ?" );
    }
</script>