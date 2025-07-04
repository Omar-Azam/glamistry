		<!-- Start Hero Section -->
		<div class="hero">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-5">
						<div class="intro-excerpt">
							<h1>Checkout</h1>
						</div>
					</div>
					<div class="col-lg-7">

					</div>
				</div>
			</div>
		</div>
		<!-- End Hero Section -->

		<div class="untree_co-section">
			<div class="container">

				<form action="./server/checkout_request.php" method="post">

					<div class="row">
						<div class="col-md-6 mb-5 mb-md-0">
							<h2 class="h3 mb-3 text-black">Billing Details</h2>
							<div class="p-3 p-lg-5 border bg-white">


								<div class="form-group">
									<label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
									<select id="c_country" class="form-control" name="country">
										<option value="">Select a country</option>
										<option value="Pakistan" <?php if(isset($_SESSION['country']) == "Pakistan"){echo "selected";} ?> >Pakistan</option>
										<option value="Algeria" <?php if(isset($_SESSION['country']) == "Algeria"){echo "selected";} ?> >Algeria</option>
										<option value="Afghanistan" <?php if(isset($_SESSION['country']) == "Afghanistan"){echo "selected";} ?> >Afghanistan</option>
										<option value="Ghana" <?php if(isset($_SESSION['country']) == "Ghana"){echo "selected";} ?> >Ghana</option>
										<option value="Albania" <?php if(isset($_SESSION['country']) == "Albania"){echo "selected";} ?> >Albania</option>
										<option value="Bahrain" <?php if(isset($_SESSION['country']) == "Bahrain"){echo "selected";} ?> >Bahrain</option>
										<option value="Colombia" <?php if(isset($_SESSION['country']) == "Colombia"){echo "selected";} ?> >Colombia</option>
										<option value="Dominican Republic" <?php if(isset($_SESSION['country']) == "Dominican Republic"){echo "selected";} ?> >Dominican Republic</option>
									</select>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label for="c_fname" class="text-black">First Name <span class="text-danger">*</span> <?php error("f_name_error", 5000) ?> </label>
										<input type="text" class="form-control" id="c_fname" name="f_name" value="<?php value("f_name") ?>">
									</div>
									<div class="col-md-6">
										<label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span> <?php error("l_name_error", 5000) ?> </label>
										<input type="text" class="form-control" id="c_lname" name="l_name" value="<?php value("l_name") ?>">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label for="c_companyname" class="text-black">Company Name </label>
										<input type="text" class="form-control" id="c_companyname" name="company" value="<?php value("company") ?>">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label for="c_address" class="text-black">Address <span class="text-danger">*</span> <?php error("address_error", 5000) ?> </label>
										<input type="text" class="form-control" id="c_address" name="address" placeholder="Street address">
									</div>
								</div>

								<div class="form-group mt-3">
									<input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" name="address_2" value="<?php value("address_2") ?>">
								</div>

								<div class="form-group row">
									<div class="col-md-6">
										<label for="c_state_country" class="text-black">State / Province <span class="text-danger">*</span> <?php error("state_error", 5000) ?> </label>
										<input type="text" class="form-control" id="c_state_country" name="state" value="<?php value("state") ?>">
									</div>
									<div class="col-md-6">
										<label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span> <?php error("postal_error", 5000) ?> </label>
										<input type="text" class="form-control" id="c_postal_zip" name="postal" value="<?php value("postal") ?>">
									</div>
								</div>

								<div class="form-group row mb-5">
									<div class="col-md-6">
										<label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span> <?php error("email_error", 5000) ?> </label>
										<input type="text" class="form-control" id="c_email_address" name="email" value="<?php value("email") ?>">
									</div>
									<div class="col-md-6">
										<label for="c_phone" class="text-black">Phone <span class="text-danger">*</span> <?php error("number_error", 5000) ?> </label>
										<input type="text" class="form-control" id="c_phone" name="number" placeholder="Phone Number" value="<?php value("number") ?>">
									</div>
								</div>

							</div>
						</div>
						<div class="col-md-6">

							<div class="row mb-5">
								<div class="col-md-12">
									<h2 class="h3 mb-3 text-black">Your Order</h2>
									<div class="p-3 p-lg-5 border bg-white">
										<table class="table site-block-order-table mb-5">
											<thead>
												<th>Product</th>
												<th>Total</th>
											</thead>
											<tbody>
												<?php
												if (isset($_SESSION['user']['id'])) {
													$user_id = $_SESSION['user']['id'];
													$sql = "SELECT * FROM cart WHERE user_id = $user_id ORDER BY id DESC;";

													$result = $conn->query($sql);

													if ($result->num_rows > 0) {
														while ($row = $result->fetch_assoc()) {
															$product_id = $row['product_id'];
															$quantity = $row['quantity'];
															$product_sql = "SELECT * FROM products WHERE id = $product_id;";
															$product_result = $conn->query($product_sql);
															while ($product_row = $product_result->fetch_assoc()) {
																$name = $product_row['name'];
																$price = $product_row['price'];
																$total = $price * $quantity;
																echo "<tr>
												<td>$name <strong class='mx-2'>x</strong> $quantity</td>
												<td>$$total.00</td>
											</tr>";
															}
														}
													}

													$total_sql = "SELECT SUM(p.price * c.quantity) AS total_price FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = $user_id;
";

													$result = $conn->query($total_sql);

													if ($result->num_rows > 0) {
														$row = $result->fetch_assoc();
														$total_price = $row['total_price'];
														echo "<tr>
												<td class='text-black font-weight-bold'><strong>Cart Subtotal</strong></td>
												<td class='text-black'>$$total_price.00</td>
											</tr>
											<tr>
												<td class='text-black font-weight-bold'><strong>Order Total</strong></td>
												<td class='text-black font-weight-bold'><strong>$$total_price.00</strong></td>
											</tr>";
													}
												}
												?>


											</tbody>
										</table>

										<div class="border p-3 mb-3">
											<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

											<div class="collapse" id="collapsebank">
												<div class="py-2">
													<p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
												</div>
											</div>
										</div>

										<div class="border p-3 mb-3">
											<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

											<div class="collapse" id="collapsecheque">
												<div class="py-2">
													<p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
												</div>
											</div>
										</div>

										<div class="border p-3 mb-5">
											<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

											<div class="collapse" id="collapsepaypal">
												<div class="py-2">
													<p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
												</div>
											</div>
										</div>

										<div class="form-group">
											<input type="submit" class="btn btn-black btn-lg py-3 btn-block" value="Place Order" name="checkout">
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- <script defer>
			window.addEventListener('pageshow', function(event) {
				if (!sessionStorage.getItem('hasReloaded')) {
					sessionStorage.setItem('hasReloaded', 'true');
					location.reload();
				} else {
					sessionStorage.removeItem('hasReloaded');
				}
			});
		</script> -->