<?php
    require "libs/vars.php";
    require "libs/functions.php";

    $title = $description = $sdescription = $category = $image = "";
    $title_err = $description_err = $sdescription_err = $category_err = $image_err = "";

    $categories = getCategories();

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

        print_r($_FILES["image"]);
        if(empty($_FILES["image"]["name"])) {
            $image_err = "Please select a file";
        } else {
            $result = saveImage($_FILES["image"]);

            if($result["isSuccess"] == 0) {
                $image_err = $result["message"];
            } else {
                $image = $result["image"];
            }
        }


        $sdescription = $_POST['sdescription'];
        $url = $_POST['url'];

        if(empty($title_err) && empty($description_err)) {
            if(createBlog($title, $sdescription, $description, $image, $url)) {
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
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <form action="blog-create.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : '' ?>" name="title" id="title" value="<?php echo $title; ?>">
                            <span class="invalid-feedback"><?php echo $title_err?></span>
                        </div>

                        <div class="mb-3">
                            <label for="sderscription" class="form-label">Short Description</label>
                            <textarea name="sdescription" id="sdescription" class="form-control <?php echo (!empty($sdescription_err)) ? 'is-invalid' : '' ?>"><?php echo $sdescription;?></textarea>
                            <span class="invalid-feedback"><?php echo $sdescription_err?></span>
                        </div>
                        
                        <div class="mb-3">
                            <label for="derscription" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : '' ?>"><?php echo $description;?></textarea>
                            <span class="invalid-feedback"><?php echo $description_err?></span>
                        </div>
                        
                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : '' ?>">
                            <span class="invalid-feedback"><?php echo $image_err?></span>
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">Url</label>
                            <input type="text" class="form-control" name="url" id="url">
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
    
<?php include "views/_ckeditor.php"; ?>
<?php include "views/_footer.php"; ?>