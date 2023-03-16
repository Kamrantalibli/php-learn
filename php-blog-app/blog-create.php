<?php
    require "libs/vars.php";
    require "libs/functions.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $imageUrl = $_POST['imagUurl'];
        $url = $_POST['url'];

        createBlog($title, $description, $imageUrl, $url);
        header("Location: index.php");
    }

?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>

<div class="container my-3">
    <div class="row">
        <dib class="col-3">
            <?php include "views/_menu.php";  ?>    
        </dib>
        <dib class="col-9">

            <div class="card">
                <div class="card-body">
                    <form action="blog-create.php" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        
                        <div class="mb-3">
                            <label for="derscription" class="form-label">Aciglama</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
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