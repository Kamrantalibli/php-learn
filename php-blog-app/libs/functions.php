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


    function createBlog(string $title, string $description, string $imageUrl, string $url, int $comments=0, int $likes=0) {
        $db = getData();
        
        array_push($db["movies"], array(
            "id" => count($db["movies"])+1,
            "title" => $title,
            "description" => $description,
            "image-url" => $imageUrl,
            "url" => $url
            "likes" => $likes
            "comments" => $comments
        ));
        $myfile = fopen("db.json","w");
        fwrite($myfile, json_encode($db, JSON_PRETTY_PRINT));
        fclose($myfile);
    }

    function shortDescription($description, $limit) {
        if(strlen($description) > $limit) {
            echo substr($description, 0, $limit)."...";
        } else {
            echo $description;
        };
    }
?>