<?php

session_start();

include('../common/db_connect.php');

if (isset($_POST['checkout']) && isset($_SESSION['user']['id'])) {

    $user_id = $_SESSION['user']['id'];

    if (empty($_POST['f_name'])) {
        $_SESSION['f_name_error'] = "*Write your first name!";
    } else {
        unset($_SESSION['f_name_error']);
        $_SESSION['f_name'] = htmlspecialchars($_POST['f_name']);
    }

    if (empty($_POST['l_name'])) {
        $_SESSION['l_name_error'] = "*Write your last name!";
    } else {
        unset($_SESSION['l_name_error']);
        $_SESSION['l_name'] = htmlspecialchars($_POST['l_name']);
    }

    if (empty($_POST['email'])) {
        $_SESSION['email_error'] = "*Email is Required!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = "*Email is not correctly formatted!";
    } else {
        unset($_SESSION['email_error']);
        $_SESSION['email'] = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['number'])) {
        $_SESSION['number_error'] = "*Phone Number is Required!";
    } elseif (!is_numeric($_POST['number'])) {
        $_SESSION['number_error'] = "*Phone Number should be integer!";
    } elseif (strlen($_POST['number']) != 11) {
        $_SESSION['number_error'] = "*Phone Number should be of 11 numbers!";
    } else {
        unset($_SESSION['number_error']);
        $_SESSION['number'] = htmlspecialchars($_POST['number']);
    }

    if (empty($_POST['country'])) {
        $_SESSION['country_error'] = "*Please select your country!";
    } else {
        unset($_SESSION['country_error']);
        $_SESSION['country'] = htmlspecialchars($_POST['country']);
    }

    if (empty($_POST['address'])) {
        $_SESSION['address_error'] = "*Please write your address!";
    } else {
        unset($_SESSION['address_error']);
        $_SESSION['address'] = htmlspecialchars($_POST['address']);
    }

    if (empty($_POST['state'])) {
        $_SESSION['state_error'] = "*Write your state / province name!";
    } else {
        unset($_SESSION['state_error']);
        $_SESSION['state'] = htmlspecialchars($_POST['state']);
    }

    if (empty($_POST['postal'])) {
        $_SESSION['postal_error'] = "*Postal / Zip is Required!";
    } elseif (!is_numeric($_POST['postal'])) {
        $_SESSION['postal_error'] = "*Postal / Zip should be integer!";
    } else {
        unset($_SESSION['postal_error']);
        $_SESSION['postal'] = htmlspecialchars($_POST['postal']);
    }

    if (!empty($_POST['company'])) {
        $_SESSION['company'] = htmlspecialchars($_POST['company']);
    }
    
    if (!empty($_POST['address_2'])) {
        $_SESSION['address_2'] = htmlspecialchars($_POST['address_2']);
    }
    
    if (
        !isset($_SESSION['email_error'])  &&
        !isset($_SESSION['number_error']) &&
        !isset($_SESSION['f_name_error']) &&
        !isset($_SESSION['l_name_error']) &&
        !isset($_SESSION['country_error']) &&
        !isset($_SESSION['address_error']) &&
        !isset($_SESSION['postal_error']) &&
        !isset($_SESSION['state_error'])
        ) {
            
            $f_name = trim($_SESSION['f_name']);
            $l_name = trim($_SESSION['l_name']);
            $name = $f_name . " " . $l_name;
            $email = trim($_SESSION['email']);
            $number = trim($_SESSION['number']);
            $postal = trim($_SESSION['postal']);
            $country = trim($_SESSION['country']);
            $state = trim($_SESSION['state']);
            $address = trim($_SESSION['address']);
            if(isset($_SESSION['address_2'])){
                $address_2 = trim($_SESSION['address_2']);
            }
            if(isset($_SESSION['company'])){
                $company = trim($_SESSION['company']);
            }




        $cart_sql = "SELECT * FROM cart WHERE user_id = $user_id;";

        $cart_result = $conn->query($cart_sql);

        if ($cart_result->num_rows > 0) {

            $address_sql = $conn->prepare("INSERT INTO addresses (name, email, phone, company, address_line1, address_line2, state, postal_code, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $address_sql->bind_param("sssssssss", $name, $email, $number, $company, $address, $address_2, $state, $postal, $country);
            $address_result = $address_sql->execute();

            $address_id = $address_sql->insert_id;

            $total_price_sql = "SELECT SUM(p.price * c.quantity) AS total_price FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = $user_id;
";

            $total_price_result = $conn->query($total_price_sql);

            $total_price_row = $total_price_result->fetch_assoc();

            $total_price = $total_price_row['total_price'];

            $order_sql = $conn->prepare("INSERT INTO orders (user_id, address_id, total_amount) VALUES (?, ?, ?)");
            $order_sql->bind_param("iii", $user_id, $address_id, $total_price);
            $order_result = $order_sql->execute();

            $order_id = $order_sql->insert_id;

            while ($cart_row = $cart_result->fetch_assoc()) {
                $product_id = $cart_row['product_id'];
                $quantity = $cart_row['quantity'];
                $product_sql = "SELECT * FROM products WHERE id = $product_id;";
                $product_result = $conn->query($product_sql);
                while ($product_row = $product_result->fetch_assoc()) {
                    $price = $product_row['price'];
                    $total = $price * $quantity;

                    $sql = "DELETE FROM cart WHERE product_id = $product_id AND user_id = $user_id;";
                    $conn->query($sql);

                    $order_items_sql = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
                    $order_items_sql->bind_param("iiii", $order_id, $product_id, $quantity, $total);
                    $order_items_result = $order_items_sql->execute();
                }
            }

            unset($_SESSION['f_name']);
            unset($_SESSION['l_name']);
            unset($_SESSION['email']);
            unset($_SESSION['number']);
            unset($_SESSION['country']);
            unset($_SESSION['postal']);
            unset($_SESSION['state']);
            unset($_SESSION['address']);
            $_SESSION['allow_thankyou'] = true;
            header("Location: /glamistry/?thankyou=true");
            die();
        } else {
            header("Location: /glamistry/?cart=true");
            die();
        }
    } else {
        $_SESSION['allow_checkout'];
        header("Location: /glamistry/?checkout=true");
        die();
    }
} else {
    header("Location: /glamistry/");
    die();
}
