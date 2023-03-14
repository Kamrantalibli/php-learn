<?php 
    if(isset($_POST["btnUpload"]) && $_POST["btnUpload"]=="Upload") {
        
        if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"]==0) {


            $uploadOk = 1;
            $fileTmpPath = $_FILES["fileToUpload"]["tmp_name"];
            $fileName = $_FILES["fileToUpload"]["name"];
            $file_uzantilari = array('jpg','jpeg','png');
            

            # file secilib secilmediyini yoxlamaq.
            if(empty($fileName)){
                echo "file secin.<br>";
                $uploadOk = 0;
            }

            # file boyukluyunu control etmek.
            $fileSize = $_FILES["fileToUpload"]["size"];

            if($fileSize > 500000) { # 500KB
                echo "File boyukluyu Coxdur.<br>";
                $uploadOk = 0;
            }

            # file uzantisinin kontrol edilmesi.
            $fileadi_Arr = explode(".",$fileName);  // [file.jpeg]
            $file_uzantisiz = $fileadi_Arr[0];      // file
            $file_uzantisi = $fileadi_Arr[1];       // jpeg

            if(!in_array($file_uzantisi, $file_uzantilari)) {
                echo "File uzantisi qebul olunmur.<br>";
                echo "kabul edilen file uzantilari: ". implode(',', $file_uzantilari);
                $uploadOk = 0;
            }

            # file adini kontrol ederek random ad qoymaq.
            $yeni_fileAdi = md5(time().$file_uzantisiz).'.'.$file_uzantisi;

            $uploadFolder = "./files/";
            $dest_path = $uploadFolder.$yeni_fileAdi; // uplad edilen faylin saxlanmasi


            if ($uploadOk == 0) {
                echo "file yuklenmedi";
            } else {
                if(move_uploaded_file($fileTmpPath, $dest_path)) {
                    echo "File yuklendi";
                } else{
                    echo "xeta";
                }
            }
        } else {
            echo "bir xeta oldu.<br>";
            echo 'xeta: '.$_FILES["fileToUpload"]["error"];
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
        <input type="file" name="fileToUpload">
        <input type="submit" value="Upload" name="btnUpload">
    </form>

</body>
</html>