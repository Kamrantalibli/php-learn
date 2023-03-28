<?php
    require "libs/vars.php";
    require "libs/functions.php";

    $id = $_GET["id"];
    $result = getBlogById($id);
    $selectedMovie = mysqli_fetch_assoc($result);

    $categories = getCategories();
    $selectedcategories = getCategoriesByBlogId($id);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST['title'];
        $description = control_input($_POST['description']);
        $imageUrl = $_POST['imageUrl'];
        $url = $_POST['url'];
        $categories = $_POST['categories'];
        $isActive = isset($_POST['isActive']) ? 1 : 0;
        

        if(editBlog($id, $title, $description, $imageUrl, $url, $isActive)) {
            clearBlogCategories($id); # clear blog categories
            if(count($categories) > 0) {
                addBlogToCategories($id, $categories); # add blog to categories
            }
            $_SESSION['message'] = $title." blog has been updated.";
            $_SESSION['type'] = "success";
            
            header("Location: admin-blogs.php");
        } else {
            echo "Error";
        }

    }

?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>

<div class="container my-3">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="row">
                    <div class="col-9">
                        <div id="edit-form">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?php echo $selectedMovie["title"] ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="derscription" class="form-label">Aciglama</label>
                                <textarea name="description" id="description" class="form-control"><?php echo $selectedMovie["description"] ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="imageUrl" class="form-label">imageUrl</label>
                                <input type="text" class="form-control" name="imageUrl" id="imageUrl" value="<?php echo $selectedMovie["imageUrl"] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">Url</label>
                                <input type="text" class="form-control" name="url" id="url" value="<?php echo $selectedMovie["url"] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-select <?php echo (!empty($category_err)) ? 'is-invalid' : '' ?>">
                                    <?php foreach ($categories as $c) {
                                        if($selectedMovie["category_id"] == $c["id"]) {
                                            echo "<option selected value='{$c["id"]}'> {$c["name"]} </option>";
                                        } else {
                                            echo "<option value='{$c["id"]}'> {$c["name"]} </option>";
                                        }
                                    }?>
                                </select>
                                <span class="invalid-feedback"><?php echo $category_err?></span>
                                <script type="text/javascript">
                                    document.getElementById("category").value = "<?php echo $category;?>"
                                </script>
                            </div>

                            <div class="form-check mb-3">
                                <label for="isActive" class="form-check-label">is Active</label>
                                <input type="checkbox" class="form-check-input" name="isActive" id="isActive" <?php if($selectedMovie["isActive"]) {echo "checked";}?> >
                            </div>

                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                        
                    </div>
                    <div class="col-3">
                        <?php foreach ($categories as $c): ?>
                            <div class="form-check">
                                <label for="category_<?php echo $c["name"]?>"><?php echo $c["name"]?></label>
                                <input 
                                    type="checkbox"
                                    name="categories[]"
                                    id="category_<?php echo $c["name"]?>" 
                                    class="form-check-input" 
                                    value="<?php echo $c["id"]?>"
                                    <?php 
                                        $isChecked = false;

                                        foreach ($selectedcategories as $s) {
                                            if($s["id"] == $c["id"]) {
                                                $isChecked = true;
                                            }
                                        }

                                        if($isChecked) {
                                            echo "checked";
                                        }
                                ?>

                                >
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "views/_ckeditor.php"; ?>
<?php include "views/_footer.php"; ?>