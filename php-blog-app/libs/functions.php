<?php 
    function addFilm(&$films, string $title, string $description, string $image, int $commentcount=0, int $likecount=0, bool $vision=false) {
        global $films;
        $new_item[count($films) + 1] = array(
            "title" => $title,
            "description" => $description,
            "image" => $image,
            "commentcount" => $commentcount,
            "likecount" => $likecount,
            "vision" => $vision
        );
        
        $films = array_merge($films, $new_item);

        foreach($films as $key => $film) {
            $films[$key]["url"] = strtolower($films[$key]["title"]);
            $films[$key]["url"] = str_replace([" ","ç"],["-","c"],$films[$key]["url"]);
        }
    }

    function shortDescription($description, $limit) {
        if(strlen($description) > $limit) {
            echo substr($description, 0, $limit)."...";
        } else {
            echo $description;
        };
    }
?>