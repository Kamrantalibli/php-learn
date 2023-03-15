<?php 

    function file_save($file, $productName, $price) {
        $myfile = fopen($file,"a");
        $content = $productName.'|'.$price;
        fwrite($myfile,$content."\n");
        fclose($myfile);
    }

    function file_read($file) {
        $myfile = fopen($file,"r");
        $list = [];
        while(($setir = fgets($myfile)) !== false) {
            $slices = explode("|", $setir);
            array_push($list, [$slices[0], $slices[1]]);
        }

        fclose($myfile);
        return $list;
    }

    // file_save("products.txt","Iphone 13","3000");
    // file_save("products.txt","Iphone 12","2000");
    // file_save("products.txt","Iphone 11","1000");
    $content = file_read("products.txt");

    foreach($content as $setir) {
        echo "name: ".$setir[0]." qiymet: ".$setir[1]."<br>";
    }
?>