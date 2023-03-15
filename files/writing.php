<?php 
    // $myfile = fopen("file2.txt","w"); # yazma modunda acilir cursor setrin evvelindedir
    $myfile = fopen("file2.txt","a"); # yazma modunda acilir cursor setrin sonundadir

    $str = "Kamran Talibli";
    fwrite($myfile, $str); #str icindekiler file2.php ye yazdirilir

    fseek($myfile,0);

    while(!feof($myfile)) {
        echo fgets($myfile)."<br>";
    }

    fclose($myfile);
?>