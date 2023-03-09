 <?php
/*
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username . " " .$password;
*/

    error_reporting(0);

    if (isset($_POST['submit'])) {
        
        $name = $_POST['name'];
        echo $name . "<br>";
    
        $gender = $_POST['gender'];
        echo $gender . "<br>";
        
        $lessons = $_POST['lessons'];
    
        foreach ($lessons as $key => $value) {
            echo $value. "<br>";
        }
    }


    ?>

<?php

    if (isset($_POST['submit_2'])) {
        $lesson = $_POST['lesson'];
        echo "Almag istediyin ders. <br>";
        foreach($lesson as $key => $value){
            echo $value . "<br>";
        }
    } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    
    <form action="" method="post">
        <h2>Sign Up</h2>
        <h3>Ad soyad:</h3>
        <input type="text" name="name">
        <h3>Gender:</h3>
        <input type="radio" name="gender" value="male">Kisi
        <input type="radio" name="gender" value="famale">Qadin
        <h3>Ders secimi</h3>
        <input type="checkbox" name="lessons[]" value="HTML"> HTML
        <input type="checkbox" name="lessons[]" value="CSS"> CSS
        <input type="checkbox" name="lessons[]" value="PHP"> PHP
        <input type="submit" name="submit" value="Gonder">
    </form>
<hr>
    <form action="" method="post">
        <h3>Almag istediyiniz dersi secin.</h3>
        <select multiple name="lesson[]">
            <option value="HTML">HTML</option>
            <option value="CSS">CSS</option>
            <option value="PHP">PHP</option>
        </select>

        <input type="submit" name="submit_2" value="Gonder">
    </form>

    <?php

        $array = ["ad" => "Kamran" , "soyad" => "Talibli" , "ixtisas" => "Proqramlama"];
        print_r(array_values($array));
        echo("<br>");
        print_r(array_count_values($array));
        echo("<br>");
        var_dump(array_search("Kamran" , $array));
    ?>
</body>
</html>