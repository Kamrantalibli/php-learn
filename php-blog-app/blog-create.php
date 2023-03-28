<?php
    require "libs/vars.php";
    require "libs/functions.php";

    $title = $description = $category = "";
    $title_err = $description_err = $category_err = "";

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

        // validate category
        $select_category = $_POST["category"];

        if($select_category == "0") {
            $category_err = "Please select category.";
        } else {
            $category = $_POST["category"];
        }

        $imageUrl = $_POST['imageUrl'];
        $url = $_POST['url'];

        if(empty($title_err) && empty($description_err) && empty($category_err)) {
            if(createBlog($title, $description, $imageUrl, $url, $category)) {
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

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select <?php echo (!empty($category_err)) ? 'is-invalid' : '' ?>">
                                <option selected value="0">Select</option>
                                <?php foreach ($categories as $c) {
                                    echo "<option value='{$c["id"]}'> {$c["name"]} </option>";
                                }?>
                            </select>
                            <span class="invalid-feedback"><?php echo $category_err?></span>
                            <script type="text/javascript">
                                document.getElementById("category").value = "<?php echo $category;?>"
                            </script>
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