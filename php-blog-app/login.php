<?php
    require "libs/vars.php";
    require "libs/functions.php";

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username == user["username"] && $password == user["password"]) {

            setcookie("auth[username]", user["username"], time() + (60 * 60));
            setcookie("auth[name]", user["name"], time() + (60 * 60));
            header("Location: index.php");

        } else {
            echo "<div class='alert alert-danger mb-0 text-center'>Username or Password wrong</div>";
        }
    }

?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password">
                        </div>

                        <input type="submit" name="login" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>