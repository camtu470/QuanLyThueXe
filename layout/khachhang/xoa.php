<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM khachhang WHERE KhachHangID = $id";
    $query = mysqli_query($connect , $sql);
    header('location: ac_khachhang.php?page_layout=view');
?>