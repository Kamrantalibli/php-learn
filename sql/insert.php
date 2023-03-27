<?php 

    include "settings.php";

    $query = "INSERT INTO blogs(title, description,imageUrl,url,isActive) VALUES ('film 8','film 8 description','1.jpeg','film-8',1);";
    // $query .= "INSERT INTO blogs(title, description,imageUrl,url,isActive) VALUES ('film 6','film 6 description','2.jpeg','film-6',0);";
    // $query .= "INSERT INTO blogs(title, description,imageUrl,url,isActive) VALUES ('film 7','film 7 description','3.jpeg','film-7',1);";

    $result = mysqli_query($connect,$query);
    $lastid = mysqli_insert_id($connect);

    // $result = mysqli_multi_query($connect,$query);

    if($result) {
        echo "Record added id: ". $lastid;
    } else {
        echo "Record not added";
    }

    mysqli_close($connect);

?>