<?php 
    require "libs/vars.php";
    require "libs/functions.php";

    if(!isAdmin()) {
        header("location: unauthorize.php");
        exit;
    }

    $id = $_GET["id"];

    if(deleteCategory($id)) {
        $_SESSION['message'] = $id." id category has been deleted.";
        $_SESSION['type'] = "danger";
    
        header('Location: admin-categories.php');
    } else {
        echo "Error";
    }

?>