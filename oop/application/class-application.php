<?php 
    require "Comment.php";

    $c1 = new Comment("kamran","very good",10,5);
    $c2 = new Comment("nurlan","good");
    $c3 = new Comment("kenan","bad",10);

    $comments = [$c1,$c2,$c3];

    foreach($comments as $comment) {
       echo $comment-> display_comments();
    }
?>