<?php
session_start();
include('./common/db_connect.php');
include('./server/error_handling.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./public/css/style.css">

	<title>AdminHub</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminPanel</span>
		</a>
		<ul class="side-menu top">
			<li class="<?php if ($_SERVER['REQUEST_URI'] === '/glamistry/admin/' || $_SERVER['REQUEST_URI'] === '/glamistry/admin' || $_SERVER['REQUEST_URI'] === '/glamistry/admin/index.php') {echo "active";} ?>">
				<a href="/glamistry/admin/">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li class="<?php if (isset($_GET['categories']) || isset($_GET['add_category']) || isset($_GET['edit_category'])) {echo "active";} ?>">
				<a href="?categories=true">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Categories</span>
				</a>
			</li>
			<li class="<?php if (isset($_GET['products']) || isset($_GET['add_product']) || isset($_GET['edit_product'])) {echo "active";} ?>">
				<a href="?products=true">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Products</span>
				</a>
			</li>
			<li class="<?php if (isset($_GET['analytics'])) {echo "active";} ?>">
				<a href="?analytics=true">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li class="<?php if (isset($_GET['message'])) {echo "active";} ?>">
				<a href="?message=true">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Message</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="/glamistry/">
					<i class='bx bxs-cog'></i>
					<span class="text">Act as a User</span>
				</a>
			</li>
			<li>
				<a href="./server/backup_database.php">
					<i class='bx bxs-cog'></i>
					<span class="text">Backup Database</span>
				</a>
			</li>
			<li>
				<a href="./server/logout_request.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Menu</a>
			<form action="#" style="visibility: hidden;">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<a class="text">Theme Switch</a>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<?php

			if (isset($_SESSION['user']['role']) == 'admin') {


				if ($_SERVER['REQUEST_URI'] === '/glamistry/admin/' || $_SERVER['REQUEST_URI'] === '/glamistry/admin' || $_SERVER['REQUEST_URI'] === '/glamistry/admin/index.php') {
					include('./client/home.php');
				}

				if (isset($_GET['categories'])) {
					include('./client/categories.php');
				}

				if (isset($_GET['add_category'])) {
					include('./client/add_category.php');
				}

				if (isset($_GET['edit_category'])) {
					include('./client/edit_category.php');
				}

				if (isset($_GET['products'])) {
					include('./client/products.php');
				}

				if (isset($_GET['add_product'])) {
					include('./client/add_product.php');
				}

				if (isset($_GET['edit_product']) && isset($_GET['product_id'])) {
					include('./client/edit_product.php');
				}

				if (isset($_GET['analytics'])) {
					include('./client/analytics.php');
				}
				
				if (isset($_GET['message'])) {
					include('./client/message.php');
				}

				// delete category

				if (isset($_GET["delete_category"]) && isset($_GET["category_id"])) {

					$id = intval($_GET['category_id']);

					$sql = "DELETE FROM category WHERE id = $id;";

					$conn->query($sql);

					header("Location: /glamistry/admin/?categories=true");
					die();
				}


				// delete product

				if (isset($_GET["delete_product"]) && isset($_GET["product_id"]) && isset($_GET["product_image"])) {

					$id = intval($_GET['product_id']);

					$sql = "DELETE FROM products WHERE id = $id;";

					$image_name = $_GET['product_image'];

					$imagePath = "./server/product_images/$image_name";

					if ($conn->query($sql)) {
						if (file_exists($imagePath)) {
							unlink($imagePath);
						}
					}

					header("Location: /glamistry/admin/?products=true");
					die();
				}
			} else {
				header('Location: /glamistry/');
				die();
			}
			?>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="./public/js/1.js"></script>
</body>

</html>