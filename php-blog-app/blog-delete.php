<?php 
    require "libs/vars.php";
    require "libs/functions.php";

    if(!isAdmin()) {
        header("location: unauthorize.php");
        exit;
    }

    $id = $_GET["id"];

    if(deleteBlog($id)) {
        $_SESSION['message'] = $id." blog has been deleted.";
        $_SESSION['type'] = "danger";
    
        header('Location: admin-blogs.php');
    } else {
        echo "Error";
    }

?>