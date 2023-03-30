<?php
    require "libs/vars.php";
    require "libs/functions.php";

    if(!isAdmin()) {
        header("location: unauthorize.php");
        exit;
    }

    $id = $_GET["id"];
    $result = getCategoryById($id);
    $selectedCategory = mysqli_fetch_assoc($result);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $categoryname = $_POST['categoryname'];
        $isActive = isset($_POST['isActive']) ? 1 : 0;

        if(editCategory($id, $categoryname, $isActive)) {
            $_SESSION['message'] = $categoryname." category has been updated.";
            $_SESSION['type'] = "success";
            
            header("Location: admin-categories.php");
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
                            <label for="categoryname" class="form-label">Title</label>
                            <input type="text" class="form-control" name="categoryname" id="categoryname" value="<?php echo $selectedCategory["name"] ?>">
                        </div>

                        <div class="form-check mb-3">
                            <label for="isActive" class="form-check-label">is Active</label>
                            <input type="checkbox" class="form-check-input" name="isActive" id="isActive" <?php if($selectedCategory["isActive"]) {echo "checked";}?> >
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </dib>
    </div>
</div>
    
<?php include "views/_footer.php"; ?>