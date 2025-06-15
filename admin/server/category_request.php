<?php

session_start();

include('../common/db_connect.php');

if (isset($_SESSION['user']['role']) == 'admin') {


    if(isset($_POST['add_category'])){
        if (empty($_POST['category'])) {
            $_SESSION['category_error'] = "*Please Write a Category!";
        } else {
            unset($_SESSION['category_error']);
            $_SESSION['category'] = htmlspecialchars($_POST['category']);
        }
    
        if (!isset($_SESSION['category_error'])) {
            $category_name = trim(strtolower($_SESSION['category']));
            $sql = "SELECT * FROM category WHERE name = '$category_name';";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                $category = $conn->prepare("INSERT INTO category (name) VALUES (?)");
                $category->bind_param("s", $category_name);
                $result = $category->execute();
                unset($_SESSION['category']);
                header("Location: /glamistry/admin/?categories=true");
                die();
            } else {
                unset($_SESSION['category']);
                $_SESSION['category_error'] = "*This category already exist!";
                header("Location: /glamistry/admin/?add_category=true");
                die();
            }
        } else {
            header("Location: /glamistry/admin/?add_category=true");
            die();
        }
    }


    if(isset($_POST['edit_category'])){
        if (empty($_POST['category'])) {
            $_SESSION['category_error'] = "*Please Write a Category!";
        } else {
            unset($_SESSION['category_error']);
            $_SESSION['category'] = htmlspecialchars($_POST['category']);
        }
    
        if (!isset($_SESSION['category_error'])) {
            $category_name = trim($_SESSION['category']);
            $category_id = trim($_POST['id']);
            $sql = "SELECT * FROM category WHERE name = '$category_name';";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                $category = $conn->prepare("UPDATE category SET name = ? WHERE id = ?;");
                $category->bind_param("si", $category_name, $category_id);
                $result = $category->execute();
                unset($_SESSION['category']);
                header("Location: /glamistry/admin/?categories=true");
                die();
            } else {
                unset($_SESSION['category']);
                $_SESSION['category_error'] = "*This category already exist!";
                header("Location: /glamistry/admin/?edit_category=true&category_id={$_POST['id']}");
                die();
            }
        } else {
            header("Location: /glamistry/admin/?edit_category=true&category_id={$_POST['id']}");
            die();
        }
    }


} else {
    header("Location: /glamistry/");
    die();
}
