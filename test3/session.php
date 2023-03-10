<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form  method="post">
        <label>Username:</label>
        <input type="text" name="username"><br>
        <label>Password:</label>
        <input type="password" name="password"><br>
        <input type="submit" name="submit_1" value="Log in">
    </form>



<?php 
    // $random_data = rand(1,9);
    // echo $random_data;
    // $_SESSION['random_data'] = $random_data;
    
    error_reporting(0);
    
    $user = array( "murad" => "12345" , "kamran" => "12345k" );
    if ($_POST['submit_1']) {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        if(isset($user[$username]) && $user[$username] == $password){
            $_SESSION['username'] = $username;
            header("location:session2.php");
            $message = "login success";
            echo $message;
        }
        else{
            $message = "login or password wrong";
            echo $message;
        }
    }

?>  



</body>
</html>