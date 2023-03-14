<?php
    require "libs/vars.php";
    require "libs/functions.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $imageurl = $_POST['imageurl'];

        addFilm($films,$title,$description,$imageurl);
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
            
            <?php include "views/_title.php";  ?> 
            <?php include "views/_blog-list.php";  ?> 
        
        </dib>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>