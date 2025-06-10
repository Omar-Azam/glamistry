<?php

session_start();

include('../common/db_connect.php');

if (isset($_POST['signup'])) {

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

    if (empty($_POST['dob'])) {
        $_SESSION['dob_error'] = "*Date of Birth is Required!";
    } else {
        unset($_SESSION['dob_error']);
        $_SESSION['dob'] = htmlspecialchars($_POST['dob']);
    }

    if (empty($_POST['gender'])) {
        $_SESSION['gender_error'] = "*Gender is Required!";
    } elseif (!($_POST['gender'] == "male" || $_POST['gender'] == "female" || $_POST['gender'] == "other")) {
        $_SESSION['gender_error'] = "*Gender should only be Male, Female or Other!";
    } else {
        unset($_SESSION['gender_error']);
        $_SESSION['gender'] = $_POST['gender'];
    }

    if (empty($_POST['pass'])) {
        $_SESSION['pass_error'] = "*Password is Required!";
    } elseif (strlen($_POST['pass']) < 8) {
        $_SESSION['pass_error'] = "*Password should be atleast 8 characters long!";
    } else {
        unset($_SESSION['pass_error']);
        $_SESSION['pass'] = htmlspecialchars($_POST['pass']);
    }

    if (empty($_POST['conf_pass'])) {
        $_SESSION['conf_pass_error'] = "*Confirm Password is Required!";
    } elseif ($_POST['conf_pass'] !== $_POST['pass']) {
        if (empty($_POST['pass'])) {
            $_SESSION['conf_pass_error'] = "*Please enter Password first!";
        } else {
            $_SESSION['conf_pass_error'] = "*Confirm Password is not matching with Password!";
        }
    } else {
        unset($_SESSION['conf_pass_error']);
        $_SESSION['conf_pass'] = htmlspecialchars($_POST['conf_pass']);
    }



    if (
        !isset($_SESSION['name_error'])   &&
        !isset($_SESSION['email_error'])  &&
        !isset($_SESSION['number_error'])  &&
        !isset($_SESSION['dob_error'])  &&
        !isset($_SESSION['gender_error'])  &&
        !isset($_SESSION['pass_error'])   &&
        !isset($_SESSION['conf_pass_error'])
    ) {

        $name = trim($_SESSION['name']);
        $email = trim($_SESSION['email']);
        $number = trim($_SESSION['number']);
        $dob = trim($_SESSION['dob']);
        $gender = trim($_SESSION['gender']);
        $pass = password_hash(trim($_SESSION['pass']), PASSWORD_DEFAULT);


        $sql = "SELECT email FROM users WHERE email = '$email';";

        $result = $conn->query($sql);


        // $user = $conn->prepare("SELECT email FROM users WHERE email = ?;");

        // if (!$user) {
        //     die("Prepare failed: " . $conn->error);
        // }

        // $user->bind_param("s", $email);

        // $user->execute();

        // $result = $user->fetch();

        // $result = $user->store_result();

        if ($result->num_rows > 0) {
            $_SESSION['email_error'] = "*This email is already registered!";
            unset($_SESSION['email']);
            header("Location: /glamistry/?signup=true");
            die();
        } else {

            $user = $conn->prepare("INSERT INTO users (name, email, number, dob, gender, password) VALUES (?, ?, ?, ?, ?, ?)");
            $user->bind_param("ssssss", $name, $email, $number, $dob, $gender, $pass);
            $result = $user->execute();

            if ($result) {
                $_SESSION['user'] = ['id' => $user->insert_id, 'name' => $name, 'email' => $email, 'number' => $number];
                if (isset($_POST['remember'])) {
                    $token = bin2hex(random_bytes(32));
                    $expires = date('Y-m-d H:i:s', strtotime('+30 days'));

                    setcookie('remember', $token, time() + (86400 * 30), "/", "", false, true);

                    $user = $conn->prepare("INSERT INTO user_tokens (user_id, name, email, number, token, expires_at) VALUES (?, ?, ?, ?, ?, ?)");
                    $user->bind_param("isssss", $_SESSION['user']['id'], $_SESSION['user']['name'], $_SESSION['user']['email'], $_SESSION['user']['number'], $token, $expires);
                    $user->execute();
                }
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['number']);
                unset($_SESSION['dob']);
                unset($_SESSION['gender']);
                unset($_SESSION['pass']);
                unset($_SESSION['conf_pass']);
                header("Location: /glamistry/");
                die();
            }
        }
    } else {
        header("Location: /glamistry/?signup=true");
        die();
    }
}
