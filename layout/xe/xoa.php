<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM xe WHERE XeID = $id";
    $query = mysqli_query($connect , $sql);
    header('location: ac_xe.php?page_layout=view');
?>