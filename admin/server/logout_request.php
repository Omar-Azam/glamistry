<?php

session_start();

// logout admin

if (isset($_SESSION['user']['role']) == 'admin') {
    session_unset();
    if (isset($_COOKIE['remember'])) {
        setcookie('remember', '', time() - 3600, '/');
    }
    header('Location: /glamistry/');
} else {
    header('Location: /glamistry/');
    die();
}
