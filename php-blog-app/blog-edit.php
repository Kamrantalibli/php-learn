<?php
    require "libs/vars.php";
    require "libs/functions.php";

    $id = $_GET["id"];
    $result = getBlogById($id);
    $selectedMovie = mysqli_fetch_assoc($result);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $imageUrl = $_POST['imageUrl'];
        $url = $_POST['url'];
        $isActive = isset($_POST['isActive']) ? 1 : 0;

        if(editBlog($id, $title, $description, $imageUrl, $url, $isActive)) {
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
    <div class="row">
        <dib class="col-12">

            <div class="card">
                <div class="card-body">
                    <form method="POST">
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

                        <div class="form-check mb-3">
                            <label for="isActive" class="form-check-label">is Active</label>
                            <input type="checkbox" class="form-check-input" name="isActive" id="isActive" <?php if($selectedMovie["isActive"]) {echo "checked";}?> >
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </dib>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>