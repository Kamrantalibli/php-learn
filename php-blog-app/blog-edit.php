<?php
    require "libs/vars.php";
    require "libs/functions.php";

    if(!isAdmin()) {
        header("location: unauthorize.php");
        exit;
    }

    $id = $_GET["id"];
    $result = getBlogById($id);
    $selectedMovie = mysqli_fetch_assoc($result);

    $categories = getCategories();
    $selectedcategories = getCategoriesByBlogId($id);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST['title'];
        $sdescription = control_input($_POST['sdescription']);
        $description = control_input($_POST['description']);
        $imageUrl = $_POST['imageUrl'];
        $url = $_POST['url'];
        $categories = $_POST['categories'];
        $isActive = isset($_POST['isActive']) ? 1 : 0;
        $isHome = isset($_POST['isHome']) ? 1 : 0;
        
        if(!empty($_FILES["image"]["name"])) {
            $result =  saveImage($_FILES["image"]);

            if($result["isSuccess"] == 1) {
                $imageUrl = $result["image"];
            }
        }

        if(editBlog($id, $title, $description, $sdescription, $imageUrl, $url, $isActive, $isHome)) {
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
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-9">
                        <div id="edit-form">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?php echo $selectedMovie["title"] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="sderscription" class="form-label">Short Description</label>
                                <textarea name="sdescription" id="sdescription" class="form-control"><?php echo $selectedMovie["short_description"];?></textarea>
                                <span class="invalid-feedback"><?php echo $sdescription_err?></span>
                            </div>
                            
                            <div class="mb-3">
                                <label for="derscription" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control"><?php echo $selectedMovie["description"] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="imageUrl" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">Url</label>
                                <input type="text" class="form-control" name="url" id="url" value="<?php echo $selectedMovie["url"] ?>">
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

                        <hr>

                        <div class="form-check mb-3">
                            <label for="isActive" class="form-check-label">is Active</label>
                            <input type="checkbox" class="form-check-input" name="isActive" id="isActive" <?php if($selectedMovie["isActive"]) {echo "checked";}?> >
                        </div>

                        <div class="form-check mb-3">
                            <label for="isHome" class="form-check-label">is Home</label>
                            <input type="checkbox" class="form-check-input" name="isHome" id="isHome" <?php if($selectedMovie["isHome"]) {echo "checked";}?> >
                        </div>

                        <hr>
                    
                        <input type="hidden" name="imageUrl" value="<?php echo $selectedMovie["imageUrl"]; ?>">
                        <img src="img/<?php echo $selectedMovie["imageUrl"]; ?>" class="img-fluid">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "views/_ckeditor.php"; ?>
<?php include "views/_footer.php"; ?>