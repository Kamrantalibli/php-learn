<?php 

    if(isset($_POST['login'])) {

        echo $_POST["username"];
        echo $_POST["password"];

    }

    if(isset($_POST['register'])) {

        echo $_POST["email"];
        echo $_POST["username"];
        echo $_POST["password"];

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="multiple.php" method="POST">
        username: <input type="text" name="username">
        password: <input type="text" name="password">
        <input type="submit" name="login" value="Login">
    </form>

    <form action="multiple.php" method="POST">
        email: <input type="text" name="email">
        username: <input type="text" name="username">
        password: <input type="text" name="password">
        <input type="submit" name="register" value="Register">
    </form>
    
</body>
</html>