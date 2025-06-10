<?php
    session_start();

    include('../common/db_connect.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['quantity']) && isset($_POST['product_id'])){
            if(isset($_SESSION['user']['id'])){
                $user_id = $_SESSION['user']['id'];
                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
    
                $sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id;";
    
                $result = $conn->query($sql);
                
                if($result->num_rows == 1){
                    $update_cart = $conn->prepare("UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?;");
                    $update_cart->bind_param("iii", $quantity, $user_id, $product_id);
                    if($update_cart->execute()){
                        echo 1;
                    }
                } else{
                    $cart = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
                    $cart->bind_param("iii", $user_id, $product_id, $quantity);
                    if($cart->execute()){
                        echo 1;
                    }
                }
    
            } else {
                echo 2;
            }
        }
    } 
?>