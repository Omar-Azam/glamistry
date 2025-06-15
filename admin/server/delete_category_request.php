<?php

session_start();

include('../common/db_connect.php');

if (isset($_SESSION['user']['role']) == 'admin') {
    
} else {
    header("Location: /glamistry/");
    die();
}
