<?php

session_start();

include('../common/db_connect.php');

if (isset($_POST['contact'])) {
    if (empty($_POST['name'])) {
        $_SESSION['name_error'] = "*Name is Required!";
    } else {
        unset($_SESSION['name_error']);
        $_SESSION['name'] = htmlspecialchars($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $_SESSION['email_error'] = "*Email is Required!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = "*Email is not correctly formatted!";
    } else {
        unset($_SESSION['email_error']);
        $_SESSION['email'] = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['message'])) {
        $_SESSION['message_error'] = "*Please write something!";
    } else {
        unset($_SESSION['message_error']);
        $_SESSION['message'] = htmlspecialchars($_POST['message']);
    }

    if (!isset($_SESSION['message_error']) && !isset($_SESSION['email_error']) && !isset($_SESSION['name_error'])) {

        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $message = $_SESSION['message'];

        $contact = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
        $contact->bind_param("sss", $name, $email, $message);
        $result = $contact->execute();

        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['message']);

        header("Location: /glamistry/");
        die();
    } else{
        header("Location: /glamistry/?contact=true");
        die();
    }
} else{
    header("Location: /glamistry/");
    die();
}
