	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Shop</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->



	<div class="untree_co-section product-section before-footer-section">
		<div class="container">
			<div class="row">

				<div class="col-lg-12 mb-5">
					<form action="./server/search_request.php" method="post" class="">

						<input type="search" name="search_product" class="form-control" placeholder="Search...">

					</form>
					<form action="./server/category_request.php" method="post" class="col-lg-12 d-flex mt-4 mb-5">
						<select class="form-select" name="category_id" id="category_id">
							<option value=''>All</option>
							<?php include('./client/category.php') ?>
						</select>
						<input type="submit" class="btn ms-4" value="Filter" name="filter">
					</form>
				</div>

				<!-- Start Columns -->
				<?php
				if (isset($_GET["search_product"])) {

					$product = $_GET["search_product"];

					$product_sql = "SELECT * FROM products WHERE name LIKE '%$product%' ORDER BY id DESC;";

					include('./client/product.php');
				} else {

					if (isset($_GET["category_id"])) {

						$category_id = intval($_GET["category_id"]);

						$product_sql = "SELECT * FROM products WHERE category_id = $category_id ORDER BY id DESC;";

						include('./client/product.php');
					} else {

						$product_sql = "SELECT * FROM products ORDER BY id DESC;";

						include('./client/product.php');
					}
				}
				?>
				<!-- End Columns -->

			</div>
		</div>
	</div>