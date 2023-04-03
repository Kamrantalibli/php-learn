<?php 

    $host = "localhost";
    $user = "root";
    $password = "Kamran355426";
    $dbName = "mydb";

    try{
        $dsn = "mysql:host=".$host.";dbname=".$dbName;
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        echo "Connection success.<br>";
    } 
    catch(PDOException $e) {
        echo "Connection error: ".$e->getMessage();
    }

 
?>