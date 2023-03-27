<?php 

    include "settings.php";

    $query = "SELECT id,title, isActive FROM blogs";
    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_row($result)) {
        echo $row[0]." ".$row[1]." ".$row[2];
        echo "<br>";
    };


    mysqli_close($connect);


?>