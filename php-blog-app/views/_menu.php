<ul class="list-group">
    
    <?php foreach (getData()["categories"] as $category): ?>
        <a href='<?php echo "movies/".$category["id"]?>' class="list-group-item list-group-item-action">
            <?php echo $category["name"]?>
        </a>

    <?php endforeach; ?>
</ul>