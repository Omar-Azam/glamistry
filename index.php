<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />
	<title>Glamistry</title>
	<?php include('./client/common_files.php') ?>
</head>

<body>
	<div id="preloader">
		<span class="loader"></span>
	</div>

	<?php

	session_start();

	include('./common/db_connect.php');

	include('./server/error_handling.php');

	if (!isset($_SESSION['user']['id']) && isset($_COOKIE['remember'])) {
		$token = $_COOKIE['remember'];

		$user = $conn->prepare("SELECT * FROM user_tokens WHERE token = ? AND expires_at > NOW()");
		$user->bind_param("s", $token);
		$user->execute();
		$tokenData = $stmt->fetch();

		if ($tokenData) {
			$_SESSION['user'] = $tokenData['user_id'];
			$_SESSION['user'] = ['id' => $tokenData['user_id'], 'name' => $tokenData['name'], 'email' => $tokenData['email'], 'number' => $tokenData['number']];
			// Optional: refresh cookie/token expiration
		}
	}


	include('./client/header.php');

	if (isset($_GET['login'])) {
		if (!isset($_SESSION['user']['id'])) {
			include('./client/login.php');
		} else {
			include('./client/home.php');
		}
	} elseif (isset($_GET['signup'])) {
		if (!isset($_SESSION['user']['id'])) {
			include('./client/signup.php');
		} else {
			include('./client/home.php');
		}
	} elseif (isset($_GET['shop'])) {
		include('./client/shop.php');
	} elseif (isset($_GET['product_detail'])) {
		include('./client/product_detail.php');
	} elseif (isset($_GET['about'])) {
		include('./client/about.php');
	} elseif (isset($_GET['services'])) {
		include('./client/services.php');
	} elseif (isset($_GET['blog'])) {
		include('./client/blog.php');
	} elseif (isset($_GET['contact'])) {
		include('./client/contact.php');
	} elseif (isset($_GET['cart'])) {
		if (isset($_SESSION['user']['id'])) {
			include('./client/cart.php');
		} else {
			include('./client/home.php');
		}
	} elseif (isset($_GET['checkout'])) {
		if (isset($_SESSION['user']['id'])) {
			include('./client/checkout.php');
		} else {
			include('./client/home.php');
		}
	} else {
		include('./client/home.php');
	}

	include('./client/footer.php');

	?>
	
	<script>
		let loader = document.querySelector("#preloader");

		window.addEventListener("load", () => {
			loader.style.display = "none";
		});
	</script>
</body>

</html>