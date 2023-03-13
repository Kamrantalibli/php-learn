<?php

    $categories = array("Adventure","Drama","Comedy","Fear");


    $films = array(
        "1" => array(
            "title" => "Paper Lives",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor illo quis unde excepturi porro! Doloribus eos nostrum itaque repellendus atque blanditiis ratione voluptate eaque quia rerum? Dolorum deserunt accusantium cum!",
            "image" => "1.jpeg",
            "commentcount" => "0",
            "likecount" => "106",
            "vision" => true,
            "url" => "paper-lives"
        ),
        "2" => array(
            "title" => "Walking Dead",
            "description" => "Dolor illo quis unde excepturi porro! Doloribus eos nostrum itaque repellendus atque blanditiis ratione voluptate eaque quia rerum? Dolorum deserunt accusantium cum!",
            "image" => "2.jpeg",
            "commentcount" => "236",
            "likecount" => "305",
            "vision" => false,
            "url" => "walking-dead"
        )
    );

    // foreach ($films as $key => $film) {
    //     $films[$key]["url"] = strtolower($films[$key]["title"]);
    //     $films[$key]["url"] = str_replace( [" ","ç"], ["-","c"], $films[$key]["url"]);
    // }

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
    }

    function shortDescription($description, $limit) {
        if(strlen($description) > $limit) {
            echo substr($description, 0, $limit)."...";
        } else {
            echo $description;
        };
    }

    // addFilm($films,"new film 1" , "new film description" , "3.jpeg");
    // addFilm($films,"new film 2" , "new film description" , "1.jpeg");

    
    $title = "Popular Films";
    $about = count($films).' movies listed in '.count($categories).' categories';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Blog App</title>
</head>
<body>

    <div class="container my-5">
        <div class="row">
            <dib class="col-3">
                <ul class="list-group">
                    <?php
                        foreach ($categories as $category) {
                            echo '<li class="list-group-item">'.$category.'</li>';
                        };
                    ?>
                </ul>
            </dib>
            <dib class="col-9">
                <h1 class="mb-4"> <?php echo $title ?></h1>
                <p class="text-muted"> <?php echo $about ?></p>


                <?php foreach ($films as $id => $film): ?>
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-fluid" src="img/<?php echo $film["image"] ;?>">
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="<?php echo $film["url"] ;?>"><?php echo $film["title"] ;?></a></h5>
                                    <p class="card-text"><?php echo shortDescription($film["description"],100); ?></p>
                                    <div>
                                        <?php if($film["commentcount"] > 0): ?>
                                            <span class="badge bg-primary me-1"><?php echo $film["commentcount"] ;?> comments</span>
                                        <?php endif; ?>

                                        <span class="badge bg-primary me-1"><?php echo $film["likecount"] ;?> likes</span>
                                        <span class="badge bg-warning me-1">
                                            <?php if($film["vision"]): ?> 
                                                <span>In Vision</span>
                                            <?php else: ?>
                                                <span>Not in Vision</span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </dib>
        </div>
    </div>
    
</body>
</html>