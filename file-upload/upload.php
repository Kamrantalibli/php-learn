<?php 
    if(isset($_POST["btnUpload"]) && $_POST["btnUpload"]=="Upload") {
        echo "<pre>";
        print_r($_FILES["fileToUpload"]);

        $fileTmpPath = $_FILES["fileToUpload"]["tmp_name"];
        $fileName = $_FILES["fileToUpload"]["name"];
        
        $uploadFolder = "./files/";
        $dest_path = $uploadFolder.$fileName;


        if(empty($fileName)){
            echo "file secin"
        }

        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            echo "File yuklendi";
        } else{
            echo "xeta";
        }

    }
?>