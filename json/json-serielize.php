<?php 
    // serialize => array => json string

    $products = array("samsung s21","samsung s22","iphone 13");

    $jsonString = json_encode($products);

    echo gettype($jsonString);
    echo $jsonString;

    // $myfile = fopen("products.json", "w");
    // fwrite($myfile, $jsonString);
    // fclose($myfile);

    $user = array(
        "username" => "kamrantalibli",
        "password" => "1234",
        "name" => "Kamran Talibli",
    );

    $jsonUser = json_encode($user, JSON_PRETTY_PRINT);

    $myfile = fopen("user.json","w");
    fwrite($myfile, $jsonUser);
    fclose($myfile);
?>