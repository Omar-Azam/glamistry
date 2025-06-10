<?php

if ($product_result = $conn->query($product_sql)) {
    while ($row = $product_result->fetch_assoc()) {
        $id = $row['id'];
        $category_id = $row['category_id'];
        $name = $row['name'];
        $price = $row['price'];
        $image_path = $row['image_path'];
        echo "<div class='col-12 col-md-4 col-lg-3 mb-5'>
						<a class='product-item' href='?product_detail=true&product_id=$id&category_id=$category_id'>
							<img src='$image_path' class='img-fluid product-thumbnail'>
							<h3 class='product-title'>$name</h3>
							<strong class='product-price'>$$price.00</strong>

							<span class='icon-cross'>
								<img src='./public/images/cross.svg' class='img-fluid'>
							</span>
						</a>
					</div>";
    }
}

?>