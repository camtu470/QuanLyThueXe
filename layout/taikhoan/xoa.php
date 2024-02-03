<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM taikhoannhanvien WHERE TaiKhoanID = $id";
    $query = mysqli_query($connect , $sql);
    header('location: ac_taikhoan.php?page_layout=view');
?>