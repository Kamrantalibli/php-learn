<?php 
    // echo readfile("file.txt");

    $myfile = fopen("file.txt" , "r"); # oxuma modunda acilir
    $size = filesize("file.txt");
    echo fread($myfile,$size); #ekranda yazdirir

    echo fgets($myfile) # ekrana yazdirir ama 1 setir

    while(!feof($myfile)) { # butun setirleri yazdirir
        echo fgets($myfile)."<br>";
    }

    fclose("file.txt"); # file baglanilir

?>