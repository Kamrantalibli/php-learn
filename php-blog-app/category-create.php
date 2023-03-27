<?php
    require "libs/vars.php";
    require "libs/functions.php";

    $categoryname = "";
    $categoryname_err = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        // validate title
        $input_categoryname = trim($_POST['categoryname']);

        if(empty($input_categoryname)) {
            $categoryname_err = "Categoryname cannot be empty";
        } else if (strlen($input_categoryname) > 50) {
            $categoryname_err = "Categoryname cannot be more than 50 characters";
        } else{
            $categoryname = control_input($input_categoryname);
        }


        if(empty($categoryname_err)) {
            if(createCategory($categoryname)) {
                $_SESSION['message'] = $categoryname." category has been added.";
                $_SESSION['type'] = "success";
        
                header("Location: admin-categories.php");
            } else {
                echo "Error";
            }
        }
    }

?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>

<div class="container my-3">
    <div class="row">
        <dib class="col-12">

            <div class="card">
                <div class="card-body">
                    <form action="category-create.php" method="POST">
                        <div class="mb-3">
                            <label for="categoryname" class="form-label">Title</label>
                            <input type="text" class="form-control <?php echo (!empty($categoryname_err)) ? 'is-invalid' : '' ?>" name="categoryname" id="categoryname" value="<?php echo $categoryname; ?>">
                            <span class="invalid-feedback"><?php echo $categoryname_err?></span>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </dib>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>