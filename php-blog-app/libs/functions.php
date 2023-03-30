<?php 

    function getData() {
        $myfile = fopen("db.json","r");
        $size = filesize("db.json");
        $result = json_decode(fread($myfile,$size), true);
        fclose($myfile);
        return $result;
    };

    function createUser(string $name, string $email, string $username, string $password) {
        $db = getData();
        
        array_push($db["users"], array(
            "id" => count($db["users"])+1,
            "username" => $username,
            "password" => $password,
            "name" => $name,
            "email" => $email
        ));
        $myfile = fopen("db.json","w");
        fwrite($myfile, json_encode($db, JSON_PRETTY_PRINT));
        fclose($myfile);
    }

    function getUser(string $username) {
        $users = getData()["users"];

        foreach($users as $user) {
            if($user["username"] == $username) {
                return $user;
            }
        }
        return null;
    }

    function getBlogs() {
        include "settings.php";

        $query = "SELECT * FROM blogs";
        $result = mysqli_query($connection,$query);
        mysqli_close($connection);
        
        return $result;
    }

    function getBlogsByFilters($categoryId, $keyword, $page) {
        include "settings.php";

        $pageCount = 2;
        $offset = ($page-1) * $pageCount;
        $query = "";

        if(!empty($categoryId)) {
            $query = "FROM blog_category bc INNER JOIN blogs b ON bc.blog_id=b.id WHERE bc.category_id= $categoryId AND b.isActive=1 ";
        } else {
            $query = "FROM blogs b WHERE b.isActive=1 ";
        }

        if(!empty($keyword)) {
            $query .= " && b.title LIKE '%$keyword%' OR b.description LIKE '%$keyword%' ";
        }
        $total_sql = "SELECT COUNT(*) ".$query;

        $count_data = mysqli_query($connection,$total_sql);
        $count = mysqli_fetch_array($count_data)[0];
        $total_pages = ceil($count / $pageCount);

        $sql = "SELECT * ".$query." LIMIT $offset, $pageCount";
        $result = mysqli_query($connection,$sql);
        mysqli_close($connection);
        
        return array(
            "total_pages" => $total_pages,
            "data" => $result
        );
    }

    function getHomePageBlogs() {
        include "settings.php";

        $query = "SELECT * FROM blogs WHERE isActive=1 AND isHome=1 ORDER BY dateAdded DESC";
        $result = mysqli_query($connection,$query);
        mysqli_close($connection);
        
        return $result;
    }

    function createBlog(string $title, string $sdescription, string $description, string $imageUrl, string $url, int $isActive=0) {
        include "settings.php";

        #Query.
        $query = "INSERT INTO blogs(title, short_description, description, imageUrl, url, isActive) VALUES (?, ?, ?, ?, ?, ?)";
        $result = mysqli_prepare($connection,$query);
        
        mysqli_stmt_bind_param($result, 'sssssi', $title,$sdescription,$description,$imageUrl,$url,$isActive);
        mysqli_stmt_execute($result);
        mysqli_stmt_close($result);

        return $result;
    }

    function getBlogById(int $movieId) {
        include "settings.php";

        $query = "SELECT * FROM blogs WHERE id='$movieId'";
        $result = mysqli_query($connection,$query);
        mysqli_close($connection);

        return $result;
    }

    function editBlog(int $id, string $title, string $description, string $sdescription, string $imageUrl, string $url, int $isActive, int $isHome) {
        include "settings.php";

        $query = "UPDATE blogs SET title='$title', short_description='$sdescription', description='$description', imageUrl='$imageUrl', url='$url', isActive=$isActive, isHome=$isHome WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        echo mysqli_error($connection);

        return $result;
    }

    function clearBlogCategories(int $blogid) {
        include "settings.php";

        $query = "DELETE FROM blog_category WHERE blog_id=$blogid";
        $result = mysqli_query($connection, $query);
        echo mysqli_error($connection);

        return $result;
    }

    function addBlogToCategories(int $blogid, array $categories) {
        include "settings.php";

        $query = "";
     //   var_dump($categories); exit;
        foreach($categories as $catid) {
            $query .= "INSERT INTO blog_category(blog_id,category_id) VALUES ($blogid,$catid);";
        }
        $result = mysqli_multi_query($connection, $query);
        echo mysqli_error($connection);
           
        return $result;
    }

    function deleteBlog(int $id) {
        include "settings.php";

        $query = "DELETE FROM blogs WHERE id='$id'";
        $result = mysqli_query($connection,$query);

        return $result;
    }

    function getCategories() {
        include "settings.php";

        $query = "SELECT * FROM categories";
        $result = mysqli_query($connection,$query);
        mysqli_close($connection);
        
        return $result;
    }

    function getCategoriesByBlogId(int $id) {
        include "settings.php";

        $query = "SELECT c.id,c.name FROM blog_category bc INNER JOIN categories c ON bc.category_id=c.id WHERE bc.blog_id=$id";
    
        $result = mysqli_query($connection,$query);
       
       // var_dump($result); exit;
        mysqli_close($connection);

        return $result;
    }

    function getBlogsByCategoryId(int $id) {
        include "settings.php";

        $query = "SELECT * FROM blog_category bc INNER JOIN blogs b ON bc.blog_id=b.id WHERE bc.category_id=$id";
    
        $result = mysqli_query($connection,$query);
       
       // var_dump($result); exit;
        mysqli_close($connection);

        return $result;
    }

    function getBlogsByKeyword($q) {
        include "settings.php";

        $query = "SELECT * FROM blogs WHERE title LIKE '%$q%' OR description LIKE '%$q%' ";
        $result = mysqli_query($connection,$query);
       // var_dump($result); exit;
        mysqli_close($connection);

        return $result;
    }

    function createCategory(string $categoryname) {
        include "settings.php";

        #Query.
        $query = "INSERT INTO categories(name) VALUES (?)";
        $result = mysqli_prepare($connection,$query);
        
        mysqli_stmt_bind_param($result, 's', $categoryname);
        mysqli_stmt_execute($result);
        mysqli_stmt_close($result);

        return $result;
    }

    function control_input($data) {
        $data = htmlspecialchars($data);
        $data = stripslashes($data); # sql injection
        return $data;
    }

    function shortDescription($description, $limit) {
        if(strlen($description) > $limit) {
            echo substr($description, 0, $limit)."...";
        } else {
            echo $description;
        };
    }

    function getCategoryById(int $categoryId) {
        include "settings.php";

        $query = "SELECT * FROM categories WHERE id='$categoryId'";
        $result = mysqli_query($connection,$query);
        mysqli_close($connection);

        return $result;
    }

    function editCategory(int $id, string $categoryname, int $isActive) {
        include "settings.php";

        $query = "UPDATE categories SET name='$categoryname', isActive='$isActive' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        echo mysqli_error($connection);

        return $result;
    }

    function deleteCategory(int $id) {
        include "settings.php";

        $query = "DELETE FROM categories WHERE id='$id'";
        $result = mysqli_query($connection,$query);

        return $result;
    }

    function isLoggedin() {
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            return true;
        } else {
            return false;
        }
    }

    function isAdmin() {
        if(isLoggedin() && isset( $_SESSION["user_type"]) && $_SESSION["user_type"] === "admin") {
            return true;
        } else {
            return false;
        }
    }

    function saveImage($file) {
        $message = "";
        $uploadOk = 1;
        $fileTempPath = $file["tmp_name"];
        $fileName = $file["name"];
        $fileSize = $file["size"];
        $maxfileSize = ((1024 * 1024) * 1);
        $fileExtensions = array("jpg","jpeg","png");
        $uploadFolder = "./img/";


        $fileSize_Arr = explode(".",$fileName); # image.jpeg 
        $fileOrginalName = $fileSize_Arr[0];    # image
        $fileExtension = $fileSize_Arr[1];      # jpeg
        
        if($fileSize > $maxfileSize) {
            $message = "File size is too large.<br>";
        }

        if(!in_array($fileExtension,$fileExtensions)) {
            $message .= "This file extension is not accepted.<br>";
            $message .= "Acceptable file extensions ".implode(",",$fileExtensions)." <br>";
            $uploadOk = 0;
        }

        $newFileName = md5(time().$fileOrginalName).'.'.$fileExtension;
        $dest_path = $uploadFolder.$newFileName;

        if($uploadOk == 0) {
            $message .= "File is not uploaded. <br>";
        } else {
            if(move_uploaded_file($fileTempPath, $dest_path)) {
                $message = "File is uploaded. <br>";
            }
        }


        return array(
            "isSuccess" => $uploadOk,
            "message" => $message,
            "image" => $newFileName
        );
    }

?>