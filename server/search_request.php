<?php

session_start();

if(isset($_POST['search_product'])){
    $search = $_POST['search_product'];
    header("Location: /glamistry/?shop=true&search_product=$search");
} else{
    header("Location: /glamistry/?shop=true");
}

?>