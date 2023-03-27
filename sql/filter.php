<?php 

    include "settings.php";

    $query = "SELECT * FROM blogs where title like '%film%'";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["id"]." ".$row["title"]." ".$row["description"]." ".$row["isActive"];
            echo "<br>";
        };
    } else {
        echo "Record not found";
    }


    mysqli_close($connect);


?>