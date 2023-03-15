<?php 

    if(isset($_POST["btnUpload"]) && $_POST["btnUpload"]=="Upload") {

        $file_sayi = count($_FILES["fileToUpload"]["name"]);
        $maxFileSize = (1024 * 1024) * 1; # 1MB
        $fileTypes = array(
            "image/png",
            "image/jpg",
            "image/jpeg"
        );

        if($file_sayi > 3) {
            die("En cox 3 file secmek mumkundur.");
        }

        for ($i=0; $i<$file_sayi; $i++) { 
            $fileTmpPath = $_FILES["fileToUpload"]["tmp_name"][$i];
            $fileName = $_FILES["fileToUpload"]["name"][$i];
            $fileSize = $_FILES["fileToUpload"]["size"][$i];
            $fileType = $_FILES["fileToUpload"]["type"][$i]; # image/jpeg
        

            if(in_array($fileType,$fileTypes)) {

                if($fileSize > $maxFileSize) {
                    die("Faylin olcusu maksimum 1 mb olabiler.");
                } else{
                    $fileName_Arr = explode(".", $fileName);
                    $fileName_uzantisiz = $fileName_Arr[0];
                    $file_uzantisi = $fileName_Arr[1];

                    $newFileName = md5(rand(0,9999999)).".".$file_uzantisi;

                    $dest_path = "images/".$newFileName;
            
                    if(move_uploaded_file($fileTmpPath, $dest_path)) {
                        echo $newFileName." file yuklendi.<br>";
                    } else {
                        echo $newFileName." file yuklenmedi.<br>";
                    }

                }

            } else {
                echo "File type qebul edilmir.<br>";
                echo "qebul edilen file tipleri". implode(",",$fileTypes);
            }
        
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
</head>
<body>
    
    <form method="POST" enctype="multipart/form-data">
        <input type="file" multiple="multiple" name="fileToUpload[]">
        <input type="submit" value="Upload" name="btnUpload">
    </form>

</body>
</html>