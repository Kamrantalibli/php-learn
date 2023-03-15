<?php 

    // create session.
    session_start();

    $_SESSION["username"] = "kamrantalibli";
    $_SESSION["password"] = "1234";

    // Delete Session item.
    unset($_SESSION["username"]);

    // Delete Session Items.
    session_unset();

    //Delete Session.
    session_destroy();
    // Alternativ Delete
    $_SESSION = [];

    if (isset($_SESSION["username"])) {
        echo $_SESSION["username"];
    } else {
        echo "Session not found";
    }



?>