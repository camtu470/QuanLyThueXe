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
?>