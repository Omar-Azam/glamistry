<!-- content -->
<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <?php
                if (isset($_GET["product_id"])) {
                    $product_id = intval($_GET["product_id"]);

                    $product_sql = "SELECT * FROM products WHERE id = $product_id;";

                    if ($product_result = $conn->query($product_sql)) {
                        $row = $product_result->fetch_assoc();
                        $id = $row['id'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_path = $row['image_path'];
                        // product_id
                        echo "<input type='hidden' value='$id' id='product_id'>";

                        echo "<div class='border rounded-4 mb-3 d-flex justify-content-center'>
                    <a data-fslightbox='mygalley' class='rounded-4' data-type='image'>
                        <img style='max-width: 100%; max-height: 100vh; margin: auto;' class='rounded-4 fit' src='$image_path' />
                    </a>
                </div>

                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </aside>
            
            <main class='col-lg-6'>
                <div class='ps-lg-3'>
                    <h4 class='title text-dark'>
                        $name
                    </h4>
                    <div class='d-flex flex-row my-3'>
                        <div class='text-warning mb-1 me-2'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fas fa-star-half-alt'></i>
                            <span class='ms-1'>
                                4.5
                            </span>
                        </div>
                        <span class='text-success ms-2'>In stock</span>
                    </div>

                    <div class='mb-3'>
                        <span class='h5'>$$price.00</span>
                        <span class='text-muted'>/per box</span>
                    </div>

                    <p>
                    $description
                    </p>
";
                    }
                }



                ?>

                <hr />

                <div class="row mb-4">
                    <!-- col.// -->
                    <div class="col-md-4 col-6 mb-3">
                        <label class="mb-2 d-block">Quantity</label>
                        <div class="input-group mb-3" style="width: 170px;">
                            <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark" onclick="decreaseQty()">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="text" class="form-control text-center border border-secondary" id="quantity" value="1" min="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                            <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark" onclick="increaseQty()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                <a class="btn btn-primary shadow-0" id="add-to-cart"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
        </div>
        </main>
    </div>
    </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4">
    <div class="container">
        <div class="row gx-4">

            <div class="px-0 border rounded-2 shadow-0">
                <h3 class="heading mt-5">- Similar Products -</h3>
                <div class="untree_co-section product-section before-footer-section">
                    <div class="container">
                        <div class="row">
                            <?php
                            $category_id = intval($_GET["category_id"]);
                            $product_id = intval($_GET["product_id"]);

                            $product_sql = "SELECT * FROM products WHERE id != $product_id AND category_id = $category_id ORDER BY RAND() LIMIT 4;";

                            include('./client/product.php');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ✅ Added to the cart!
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ❌ Something went wrong. Please try again.
            </div>
        </div>
    </div>
</div>

<script defer>
    function increaseQty() {
        const qtyInput = document.getElementById('quantity');
        qtyInput.value = parseInt(qtyInput.value || 1) + 1;
    }

    function decreaseQty() {
        const qtyInput = document.getElementById('quantity');
        if (parseInt(qtyInput.value) > 1) {
            qtyInput.value = parseInt(qtyInput.value) - 1;
        }
    }

    // Show Success Modal
    function showSuccessModal() {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();

        // Auto-hide after 3 seconds
        setTimeout(() => {
            successModal.hide();
        }, 3000);
    }

    // Show Error Modal
    function showErrorModal() {
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();

        // Auto-hide after 3 seconds
        setTimeout(() => {
            errorModal.hide();
        }, 3000);
    }
</script>

<script defer>
    $('document').ready(function() {
        $('#add-to-cart').on('click', function(e) {
            var quantity = $('#quantity').val();
            var product_id = $('#product_id').val();
            console.log(quantity);
            console.log(product_id);
            $.ajax({
                url: './server/add_to_cart_request.php',
                type: 'POST',
                data: {
                    quantity: quantity,
                    product_id: product_id
                },
                success: function(data) {
                    if (data == 1) {
                        showSuccessModal();
                    } else if (data == 2) {
                        window.location = '?login=true';
                    } else {
                        showErrorModal();
                    }
                }
            });
        });
    });
</script>