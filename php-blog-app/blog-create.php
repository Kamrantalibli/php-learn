<?php
    require "libs/vars.php";
    require "libs/functions.php";

    $title = $description = "";
    $title_err = $description_err = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        // validate title
        $input_title = trim($_POST['title']);

        if(empty($input_title)) {
            $title_err = "Title cannot be empty";
        } else if (strlen($input_title) > 150) {
            $title_err = "title cannot be more than 150 characters";
        } else{
            $title = control_input($input_title);
        }

        // validate description
        $input_description = trim($_POST['description']);

        if(empty($input_description)) {
            $description_err = "Description cannot be empty";
        } else if (strlen($input_description) < 10) {
            $description_err = "Description should be more than 10 characters";
        } else{
            $description = control_input($input_description);
        }

        $imageUrl = $_POST['imageUrl'];
        $url = $_POST['url'];

        echo $title;
        echo "<br>";
        echo $description;

        if(empty($title_err) && empty($description_err)) {
            if(createBlog($title, $description, $imageUrl, $url)) {
                $_SESSION['message'] = $title." blog has been added.";
                $_SESSION['type'] = "success";
        
                header("Location: admin-blogs.php");
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
                    <form action="blog-create.php" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : '' ?>" name="title" id="title" value="<?php echo $title; ?>">
                            <span class="invalid-feedback"><?php echo $title_err?></span>
                        </div>
                        
                        <div class="mb-3">
                            <label for="derscription" class="form-label">Aciglama</label>
                            <textarea name="description" id="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : '' ?>"><?php echo $description;?></textarea>
                            <span class="invalid-feedback"><?php echo $description_err?></span>
                        </div>
                        
                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">imageUrl</label>
                            <input type="text" class="form-control" name="imageUrl" id="imageUrl">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">Url</label>
                            <input type="text" class="form-control" name="url" id="url">
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </dib>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>