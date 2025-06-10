<?php

session_start();

if (isset($_SESSION['user']['id'])) {
    unset($_SESSION['user']);
    if (isset($_COOKIE['remember'])) {
        setcookie('remember', '', time() - 3600, '/');
    }
    header('Location: /glamistry/');
} else {
    header('Location: /glamistry/');
}

?>