<?php 

    //deserialize => string (json) => array (DECODE)

    $jsonString = '{
        "firstName": "Kamran",
        "lansName": "Talibli",
        "hobbies": ["idman","sinema"],
        "age": 23,
        "language": [
            {
                "name": "javaScript"
            },
            {
                "name": "php"
            }
        ]
    }';

    echo $jsonString;
    echo "<br>";
    echo gettype($jsonString); 
    echo "<br>";

    $jsonArr = json_decode($jsonString,true); # assosiative array
    echo "<pre>";
    echo print_r($jsonArr);
    echo "</pre>";

    echo $jsonArr['firstName'];
    echo $jsonArr['hobbies'][0];

    //serialize => array => json string
?>