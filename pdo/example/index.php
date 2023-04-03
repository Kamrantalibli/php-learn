<?php 


    // MySQLi => MySQL

    // PDO => Php Data Object

    // print_r(PDO::getAvailableDrivers());

    include_once('connection.php');

////////////////////////// Get data ////////////////////////////////////////////

    // $sql = "SELECT * FROM products";
    // $results = $pdo->query($sql);

    // $products = $results->fetchAll();

    // foreach ($products as $product) {
    //     echo $product->title."<br>";
    // }


////////////////////////// Get data Prepared ///////////////////////////////////

    // $productId = 1;

    // $sql = "SELECT * FROM products WHERE id=?";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$productId]);
    // $products = $stmt->fetchAll();
    
    // foreach ($products as $product) {
    //     echo $product->title."<br>";
    // }


////////////////////////// Insert Data //////////////////////////////////////////

    // $title = "Samsung S24";
    // $price = 4000;
    // $description = "nice telephone";

    // $sql = "INSERT INTO products(title,price,description) VALUES(:title,:price,:description)";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['title'=> $title, 'price'=> $price, 'description'=> $description]);

    // echo "Data was added to base";

/////////////////////////// Multiple insert //////////////////////////////////////

    // $title = "Samsung S25";
    // $price = 4500;
    // $description = "nice telephone";

    // $sql = "INSERT INTO products(title,price,description) VALUES(:title,:price,:description)";
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindParam(':title', $title);
    // $stmt->bindParam(':price', $price);
    // $stmt->bindParam(':description', $description);
    
    // $stmt->execute();

    // $title = "Samsung S26";
    // $price = 5000;
    // $description = "nice telephone";

    // $stmt->execute();

    // echo "Data was added to base";

//////////////////////////// Update Data ///////////////////////////////////////////
    
    // $id = 1;
    // $title = "updated";

    // $sql = "UPDATE products SET title=:title WHERE id=:id";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(["id"=> $id, "title"=> $title]);

    // echo "Updated: ".$stmt->rowCount();

///////////////////////////// Delete Data //////////////////////////////////////////

    $id = 1;

    $sql = "DELETE FROM products WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id"=> $id]);

    echo "Delete: ".$stmt->rowCount();

?>