<?php
    require "libs/vars.php";
    require "libs/functions.php";
    
?>

<?php include "views/_header.php"; ?>
<?php include "views/_message.php"; ?>
<?php include "views/_navbar.php"; ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">

            <div class="card mb-1">
                <div class="card-body">
                    <a href="blog-create.php" class="btn btn-primary">New Blog</a>
                </div>
            </div>


            <table class="table table-bordered">
                <thead>
                    <th style="width: 80px;">Image</th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Category</th>
                    <th style="width: 100px;">Is active</th>
                    <th style="width: 130px;"></th>
                </thead>
                <tbody>
                    <?php $result = getBlogs(); while($film = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><img class="img-fluid" src="img/<?php echo $film["imageUrl"]?>" alt=""></td>
                            <td><?php echo $film["title"];?></td>
                            <td><?php echo $film["url"];?></td>
                            <td>
                            
                            <?php
                                echo "<ul>";
                                    $data = getCategoriesByBlogId($film["id"]);

                                    if (mysqli_num_rows($data) > 0) {
                                        while($category = mysqli_fetch_assoc($data)) {
                                            echo "<li>".$category["name"]."</li>";
                                        }
                                    } else {
                                        echo "<li>Category was not selected</li>";
                                    }
                                echo "</ul>";
                            ?>

                            </td>
                            <td>
                                <?php if($film["isActive"]): ?>
                                    <i class="fas fa-check"></i>
                                <?php else: ?>
                                    <i class="fas fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="blog-edit.php?id=<?php echo $film["id"]?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="blog-delete.php?id=<?php echo $film["id"]?>">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>