<?php

session_start();

if(isset($_POST['filter'])){
    $category_id = $_POST['category_id'];
    if($category_id == ""){
        header("Location: /glamistry/?shop=true");
    } else{
        header("Location: /glamistry/?shop=true&category_id=$category_id");
    }
} else{
    header("Location: /glamistry/?shop=true");
}

?>