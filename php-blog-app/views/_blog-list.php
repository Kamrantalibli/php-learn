<?php 
    if(isset($_GET["categoryid"]) && is_numeric($_GET["categoryid"])) {
        $result = getBlogsByCategoryId($_GET["categoryid"]); 
    } elseif(isset($_GET["q"])) {
        $result = getBlogsByKeyword($_GET["q"]);
    } else {
        $result = getBlogs();
    }
    
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
                        <p class="card-text"><?php echo shortDescription(htmlspecialchars_decode($film["description"]),100); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endwhile; ?>

<?php else: ?>
    <div class="alert alert-warning">Blog not found in this category</div>
<?php endif; ?>
