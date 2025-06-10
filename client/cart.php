	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Cart</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->



	<div class="untree_co-section before-footer-section">
		<div class="container">
			<div class="row mb-5">
				<form class="col-md-12" method="post">
					<div class="site-blocks-table">
						<table class="table">
							<thead>
								<tr>
									<th class="product-thumbnail">Image</th>
									<th class="product-name">Product</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
									<th class="product-remove">Remove</th>
								</tr>
							</thead>
							<tbody id="cart_products">
								<!-- empty dekhana hai idhar -->
							</tbody>
						</table>
					</div>
				</form>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="row mb-5">
						<!-- <div class="col-md-6 mb-3 mb-md-0">
							<button class="btn btn-black btn-sm btn-block">Update Cart</button>
						</div> -->
						<div class="col-md-6">
							<button class="btn btn-outline-black btn-sm btn-block" onclick="window.location='?shop=true'">Continue Shopping</button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="text-black h4" for="coupon">Coupon</label>
							<p>Enter your coupon code if you have one.</p>
						</div>
						<div class="col-md-8 mb-3 mb-md-0">
							<input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
						</div>
						<div class="col-md-4">
							<button class="btn btn-black">Apply Coupon</button>
						</div>
					</div>
				</div>
				<div class="col-md-6 pl-5">
					<div class="row justify-content-end">
						<div class="col-md-7" id="total_prices">
							<div class='row'>
								<div class='col-md-12 text-right border-bottom mb-5'>
									<h3 class='text-black h4 text-uppercase'>Cart Totals</h3>
								</div>
							</div>
							<div class='row mb-3'>
								<div class='col-md-6'>
									<span class='text-black'>Subtotal</span>
								</div>
								<div class='col-md-6 text-right'>
									<strong class='text-black'>$230.00</strong>
								</div>
							</div>
							<div class='row mb-5'>
								<div class='col-md-6'>
									<span class='text-black'>Total</span>
								</div>
								<div class='col-md-6 text-right'>
									<strong class='text-black'>$230.00</strong>
								</div>
							</div>

							<div class='row'>
								<div class='col-md-12'>
									<button class='btn btn-black btn-lg py-3 btn-block' onclick='window.location="checkout.html"'>Proceed To Checkout</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script defer>
		$("document").ready(function() {
			function load() {
				$.ajax({
					url: "./server/cart_page_request.php",
					type: "GET",
					data: {load: true},
					success: function(data) {
						$("#cart_products").html(data);
					}
				});
			}
			load();
			function total() {
				$.ajax({
					url: "./server/cart_page_request.php",
					type: "GET",
					data: {total: true},
					success: function(data) {
						$("#total_prices").html(data);
					}
				});
			}
			total();
			$(document).on('click', '#increase', function(e) {
				// $('#increase').on('click', function(e) {
					var product_id = $(e.target).val();
					$.ajax({
						url: "./server/cart_page_request.php",
						type: "POST",
						data: {
							product_id: product_id,
							increase: true
						},
						success: function(data) {
							load();
							total();
						}
					});
					// });
				});
				$(document).on('click', '#decrease', function(e) {
					// $('#decrease').on('click', function(e) {
						var product_id = $(e.target).val();
					console.log(product_id);
					$.ajax({
						url: "./server/cart_page_request.php",
						type: "POST",
						data: {
							product_id: product_id,
							decrease: true
						},
						success: function(data) {
							load();
							total();
						}
					});
			// });
			});
			$(document).on('click', '#delete', function(e) {
					// $('#decrease').on('click', function(e) {
						var product_id = $(e.target).data('id');
					console.log(product_id);
					$.ajax({
						url: "./server/cart_page_request.php",
						type: "POST",
						data: {
							product_id: product_id,
							delete: true
						},
						success: function(data) {
							load();
							total();
						}
					});
			// });
			});
		});
	</script>