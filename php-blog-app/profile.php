<?php
    require "libs/vars.php";
    require "libs/functions.php";

    if(!isLoggedin()) {
        header("location: login.php");
        exit;
    }
?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>

<div class="container my-3">
    <div class="row">

        <div class="col-12">
            <h3>Hello, <?php echo htmlspecialchars($_SESSION["username"])?></h3>
            <div>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>

    </div>
</div>
    
<?php include "views/_footer.php"; ?>