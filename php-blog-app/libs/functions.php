<?php 
    function addFilm(string $title, string $description, string $image, string $url, int $commentcount=0, int $likecount=0, bool $vision=false) {
        $myfile = fopen("data.txt","a");
        $content = $title."|".$description."|".$image."|".$url."|".$commentcount."|".$likecount."|".(int)$vision;
        fwrite($myfile,$content."\n");
        fclose($myfile);
    }

    function getFilms() {
        $myfile = fopen("data.txt","r");
        $list = [];

        while(($line = fgets($myfile)) !== false) {
            $slices = explode("|", $line);

            array_push($list, array(
                "title" => $slices[0],
                "description" => $slices[1],
                "image" => $slices[2],
                "url" => $slices[3],
                "commentcount" => $slices[4],
                "likecount" => $slices[5],
                "vision" => $slices[6]
            ));
        }
        fclose($myfile);
        return $list;
    }

    function shortDescription($description, $limit) {
        if(strlen($description) > $limit) {
            echo substr($description, 0, $limit)."...";
        } else {
            echo $description;
        };
    }
?>