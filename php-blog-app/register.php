<?php
    require "libs/vars.php";
    require "libs/functions.php";

    if(isset($_POST["register"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(empty($name) or empty($email) or empty($username) or empty($password)) {
            echo "<div class='alert alert-danger mb-0 text-center'>Fill in the required fields</div>";
            return;
        }

        $user = getUser($username);

        if(!is_null($user)) {
            echo "<div class='alert alert-danger mb-0 text-center'>Username already created</div>";
            return;
        }

        createUser($name,$email,$username,$password);
            header("Location: login.php");

    }

?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password">
                        </div>

                        <input type="submit" name="register" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>