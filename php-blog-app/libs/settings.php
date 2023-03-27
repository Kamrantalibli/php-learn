<?php 

    $server = "localhost";
    $username = "root";
    $password = "Kamran355426";
    $database = "blogappnew";

    $connection = mysqli_connect($server, $username, $password, $database);
    mysqli_set_charset($connection, "UTF8");
    if(mysqli_connect_errno() > 0) {
        die("Error: ".mysqli_connect_errno());
    }
    

?>