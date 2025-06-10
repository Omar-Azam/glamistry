<?php

session_start();

include('../common/db_connect.php');

if (isset($_POST['login'])) {

    if (empty($_POST['email'])) {
        $_SESSION['email_error'] = "*Email is Required!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = "*Email is not correctly formated!";
    } else {
        unset($_SESSION['email_error']);
        $_SESSION['login_email'] = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['pass'])) {
        $_SESSION['pass_error'] = "*Password is Required!";
    } else {
        unset($_SESSION['pass_error']);
        $_SESSION['login_pass'] = htmlspecialchars($_POST['pass']);
    }

    if (
        !isset($_SESSION['email_error'])  &&
        !isset($_SESSION['pass_error'])
    ) {

        $name = "";
        $email = trim($_SESSION['login_email']);
        $pass = trim($_SESSION['login_pass']);
        $id = 0;

        // $user = $conn->prepare("SELECT * FROM users WHERE email='$email' and pass='$pass';");

        // $result = $user->execute();

        $sql = "SELECT * FROM users WHERE email='$email';";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $id = $row['id'];
            $number = $row['number'];
            if (password_verify($pass, $row['password'])) {
                $_SESSION['user'] = ['id' => $id, 'name' => $name, 'email' => $email, 'number' => $number];
                if (isset($_POST['remember'])) {
                    $token = bin2hex(random_bytes(32));
                    $expires = date('Y-m-d H:i:s', strtotime('+30 days'));

                    setcookie('remember', $token, time() + (86400 * 30), "/", "", false, true);

                    $user = $conn->prepare("INSERT INTO user_tokens (user_id, name, email, number, token, expires_at) VALUES (?, ?, ?, ?, ?, ?)");
                    $user->bind_param("isssss", $_SESSION['user']['id'], $_SESSION['user']['name'], $_SESSION['user']['email'], $_SESSION['user']['number'], $token, $expires);
                    $user->execute();
                }
                unset($_SESSION['login_email']);
                unset($_SESSION['login_pass']);
                header("Location: /glamistry/");
                die();
            } else {
                $_SESSION['pass_error'] = "*Wrong Password!";
                unset($_SESSION['login_pass']);
                header("Location: /glamistry/?login=true");
                die();
            }
        } else {
            $_SESSION['email_error'] = "*This email is not registered!";
            unset($_SESSION['login_email']);
            header("Location: /glamistry/?login=true");
            die();
        }
    } else {
        header("Location: /glamistry/?login=true");
        die();
    }
}
