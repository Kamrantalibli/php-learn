<?php
    require "libs/vars.php";
    require "libs/functions.php";
    
?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>

<div class="container my-3">
    <div class="row">
        <div class="col-3">
            <?php include "views/_menu.php";  ?>    
        </div>
        <div class="col-9">
            <?php include "views/_title.php";  ?> 
            <?php 
                $result = getHomepageBlogs();
            ?>

            <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($film = mysqli_fetch_assoc($result)): ?>
                <?php if($film["isActive"]):?>
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-fluid" src="img/<?php echo $film["imageUrl"] ;?>">
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="blog-details.php?id=<?php echo $film["id"] ;?>"><?php echo $film["title"] ;?></a></h5>
                                    <p class="card-text"><?php echo shortDescription(htmlspecialchars_decode($film["short_description"]),100); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-warning">Blog not found in this category</div>
            <?php endif; ?> 
        </div>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>