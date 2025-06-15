<?php
session_start();

include('../common/db_connect.php');

if (isset($_SESSION['user']['id'])) {

    $user_id = $_SESSION['user']['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_GET['load'])) {


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
                        $image_path = $product_row['image_path'];

                        echo "<tr>
                                        <td class='product-thumbnail'>
                                        <img src='./admin/server/$image_path' alt='Image' class='img-fluid'>
                                        </td>
                                        <td class='product-name'>
                                        <h2 class='h5 text-black'>$name</h2>
                                        </td>
                                        <td>$$price.00</td>
                                        <td>
                                        <div class='input-group mb-3 d-flex align-items-center quantity-container' style='max-width: 120px;'>
                                        <div class='input-group-prepend'>
                                        <button class='btn btn-outline-black' id='decrease' value='$product_id' type='button'>&minus;</button>
                                                </div>
                                                <input type='text' class='form-control text-center quantity-amount' value='$quantity' aria-label='Example text with button addon' aria-describedby='button-addon1'>
                                                <div class='input-group-append'>
                                                <button class='btn btn-outline-black' id='increase' value='$product_id' type='button'>&plus;</button>
                                                </div>
                                                </div>
                                                
                                                </td>
                                                <td>$$total.00</td>
                                                <td><a class='btn btn-black btn-sm' id='delete' data-id='$product_id' data-action='delete'>X</a></td>
                                                </tr>";
                    }
                }
            } else {
                echo "<tr>
                                        <td class='product-thumbnail'>
                                        empty
                                        </td>
                                        <td class='product-name'>
                                        empty
                                        </td>
                                        <td>empty</td>
                                        <td>
                                        empty
                                                </td>
                                                <td>empty</td>
                                                <td>empty</td>
                                                </tr>";
                unset($_SESSION['checkout_data']);
            }
        }

        if (isset($_GET['total'])) {

            $sql = "SELECT SUM(p.price * c.quantity) AS total_price FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = $user_id;
";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_price = $row['total_price'];
                if ($total_price > 0) {
                    echo "<div class='row'>
                                        <div class='col-md-12 text-right border-bottom mb-5'>
                                            <h3 class='text-black h4 text-uppercase'>Cart Totals</h3>
                                        </div>
                                    </div>
                                    <div class='row mb-3'>
                                        <div class='col-md-6'>
                                            <span class='text-black'>Subtotal</span>
                                        </div>
                                        <div class='col-md-6 text-right'>
                                            <strong class='text-black'>$$total_price.00</strong>
                                        </div>
                                    </div>
                                    <div class='row mb-5'>
                                        <div class='col-md-6'>
                                            <span class='text-black'>Total</span>
                                        </div>
                                        <div class='col-md-6 text-right'>
                                            <strong class='text-black'>$$total_price.00</strong>
                                        </div>
                                    </div>
        
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <a class='btn btn-black btn-lg py-3 btn-block' id='checkout'>Proceed To Checkout</a>
                                        </div>
                                    </div>";
                } else {
                    echo "<div class='row'>
								<div class='col-md-12 text-right border-bottom mb-5'>
									<h3 class='text-black h4 text-uppercase'>Cart Totals</h3>
								</div>
							</div>
							<div class='row mb-3'>
								<div class='col-md-6'>
									<span class='text-black'>Subtotal</span>
								</div>
								<div class='col-md-6 text-right'>
									<strong class='text-black'>$00.00</strong>
								</div>
							</div>
							<div class='row mb-5'>
								<div class='col-md-6'>
									<span class='text-black'>Total</span>
								</div>
								<div class='col-md-6 text-right'>
									<strong class='text-black'>$00.00</strong>
								</div>
							</div>
                            <div class='row'>";
                }
            }
        }

        if (isset($_GET['checkout'])) {
            $_SESSION['allow_checkout'] = true;
            echo 1;
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['product_id']) && isset($_POST['increase'])) {
            $product_id = $_POST['product_id'];

            $sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id;";

            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                // $row = $result->fetch_assoc();
                // $quantity = $row['quantity'];
                // if($quantity > 1){

                // }
                $update_cart = $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE product_id = ?;");
                $update_cart->bind_param("i", $product_id);
                $update_cart->execute();
            }
        }

        if (isset($_POST['product_id']) && isset($_POST['decrease'])) {
            $product_id = $_POST['product_id'];

            $sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id;";

            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $quantity = $row['quantity'];
                if ($quantity > 1) {
                    $update_cart = $conn->prepare("UPDATE cart SET quantity = quantity - 1 WHERE product_id = ?;");
                    $update_cart->bind_param("i", $product_id);
                    $update_cart->execute();
                }
            }
        }

        if (isset($_POST['product_id']) && isset($_POST['delete'])) {
            $product_id = $_POST['product_id'];

            $sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id;";

            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                // $update_cart = $conn->prepare("DELETE FROM cart WHERE product_id = $product_id AND user_id = $user_id;");
                // $update_cart->bind_param("i,i", $product_id, $user_id);
                // $update_cart->execute();

                $sql = "DELETE FROM cart WHERE product_id = $product_id AND user_id = $user_id;";
                $conn->query($sql);
            }
        }
    }
}
