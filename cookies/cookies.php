<?php 
    // Create cookie
    setcookie("username","kamrantalibli", time() + (60 * 60 * 24 * 30));
    setcookie("login","true", time() + (60 * 60 * 24 * 30));
    setcookie("fullname","kamrantalibli", time() + (60 * 60 * 24 * 30),"/cookies/admin");

    // Cookie ni ekranda gostermek
    echo $_COOKIE["username"];

    // Updade cookie 
    setcookie("username","kamrantalibli2", time() + (60 * 60 * 24 * 30));

    // Delete cookie
    setcookie("username","kamrantalibli", time() - 3600 );
?>