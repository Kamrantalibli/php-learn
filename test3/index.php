<?php
    // $list = array( 1 => "Book" , "ikinci" => "test" );

    // foreach ($list as $key => $value) {
    //     echo  $key . " " . $value . " ";
    // }

    $list = [ "programing_language"=>array("php","C#","java") , "human_language" => array("inglish","turkish","russian") ];
    
    foreach ($list as $key => $value) {
        echo "<br>" . $key . "<hr>";
        foreach ($value as $item) {
            echo $item;
        }   
    }



    
?>
