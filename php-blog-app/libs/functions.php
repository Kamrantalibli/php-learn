<?php 

    function getData() {
        $myfile = fopen("db.json","r");
        $size = filesize("db.json");
        $result = json_decode(fread($myfile,$size), true);
        fclose($myfile);
        return $result;
    };

    function createUser(string $name, string $email, string $username, string $password,) {
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

    function createBlog(string $title, string $description, string $imageUrl, string $url, int $isActive=0) {
        include "settings.php";

        #Query.
        $query = "INSERT INTO blogs(title, description, imageUrl, url, isActive) VALUES (?,?,?,?,?)";
        $result = mysqli_prepare($connection,$query);
        
        mysqli_stmt_bind_param($result, 'ssssi', $title,$description,$imageUrl,$url,$isActive);
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

    function editBlog(int $id, string $title, string $description, string $imageUrl, string $url, int $isActive) {
        include "settings.php";

        $query = "UPDATE blogs SET title='$title', description='$description', imageUrl='$imageUrl', url='$url', isActive='$isActive' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
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

?>