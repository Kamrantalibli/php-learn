<?php 
    if(isset($_GET["categoryid"]) && is_numeric($_GET["categoryid"])) {
        $selectedCategory = $_GET["categoryid"];
    }
?>

<ul class="list-group">
    <a href='blogs.php' class="list-group-item list-group-item-action <?php echo ($selectedCategory==NULL) ? 'active' : '';?>">All Categories</a>
    <?php $result = getCategories(); while($item = mysqli_fetch_assoc($result)): ?>
        <?php if($item["isActive"]): ?>

            <a href='<?php echo "blogs.php?categoryid=".$item["id"]?>' class="list-group-item list-group-item-action <?php echo ($item["id"] == $selectedCategory) ? 'active' : '';?>">
                <?php echo ucfirst($item["name"])?>
            </a>

        <?php endif; ?>
    <?php endwhile; ?>

</ul>