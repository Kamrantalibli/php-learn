<?php
    require "libs/vars.php";
    require "libs/settings.php";
    require "libs/functions.php";

    $username = $email = $password = $confirm_password = "";
    $username_err = $email_err = $password_err = $confirm_password_err = "";

    if(isset($_POST["register"])) {
        //validate username
        if(empty(trim($_POST["username"]))) {
            $username_err = "Enter your Username";
        } elseif(strlen(trim($_POST["username"])) < 5 || strlen(trim($_POST["username"])) > 15) {
            $username_err = "Username must be between 5-15 characters";
        } elseif(!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["username"])) {
            $username_err = "Username contain only letters, numbers, underscores";
        } else {

            $sql = "SELECT id FROM users WHERE username = ?";

            if($stmt = mysqli_prepare($connection,$sql)) {
                $param_username = trim($_POST["username"]);
                mysqli_stmt_bind_param($stmt, "s" , $param_username);

                if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) ==1) {
                        $username_err = "This username has already been taken.";
                    } else {
                        $username = $_POST["username"];
                    }
                } else {
                    echo "Error.";
                }
            }

        }

        //validate email
        if(empty(trim($_POST["email"]))) {
            $email_err = "Enter your Email";
        }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_err = "You entered the wrong email";
        } else {
            
            $sql = "SELECT id FROM users WHERE email = ?";

            if($stmt = mysqli_prepare($connection,$sql)) {
                $param_email = trim($_POST["email"]);
                mysqli_stmt_bind_param($stmt, "s" , $param_email);

                if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) ==1) {
                        $email_err = "This email has already been taken.";
                    } else {
                        $email = $_POST["email"];
                    }
                } else {
                    echo "Error.";
                }
            }


        }

        //validate password
        if(empty(trim($_POST["password"]))) {
            $password_err = "Enter your Password";
        }elseif(strlen($_POST["password"]) < 6) {
            $password_err = "Password must be at least 6 characters";
        } else {
            $password = $_POST["password"];
        }

        //validate confirm password
        if(empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Enter your Confirm_password.";
        } else {
            $confirm_password = $_POST["confirm_password"];
            if(empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Passwords do not match.";
            }
        }


        if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
            $sql = "INSERT INTO users (username,email,password) VALUES (?,?,?)";

            if($stmt = mysqli_prepare($connection, $sql)) {
                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

                if(mysqli_stmt_execute($stmt)) {
                    header("location: login.php");
                } else {
                    echo mysqli_error($connection);
                    echo "Error";
                }
            }
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
                    <form action="register.php" method="POST" novalidate>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err ?></span>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''?>" value="<?php echo $email;?>">
                            <span class="invalid-feedback"><?php echo $email_err ?></span>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''?>" value="<?php echo $username?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err ?></span>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''?>" value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err ?></span>
                        </div>

                        <input type="submit" name="register" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>