<?php
    require "libs/vars.php";
    require "libs/functions.php";
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
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        
                        <div class="mb-3">
                            <label for="derscription" class="form-label">Aciglama</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="imageurl" class="form-label">Image</label>
                            <input type="text" class="form-control" name="imageurl" id="imageurl">
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </dib>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>