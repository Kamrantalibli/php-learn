<?php 
    $connect = mysqli_connect("localhost","root","Kamran355426","blogappnew");

    mysqli_set_charset($connect, "UTF8");

    if(mysqli_connect_errno() > 0) {
        die("Error: ". mysqli_connect_errno());

    }
?>