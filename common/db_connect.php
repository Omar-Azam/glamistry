<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "glamistry";

    $conn = new mysqli($host, $user, $pass, $db_name);

    if($conn->connect_error){
        die("ERROR: $conn->connect_error");
    }

?>