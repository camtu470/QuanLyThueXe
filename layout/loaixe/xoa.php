<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM LoaiXe WHERE LoaiXeID = $id";
    $query = mysqli_query($connect , $sql);
    header('location: ac_loaixe.php?page_layout=view');
?>