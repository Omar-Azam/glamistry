<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="" href="#">Products</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Edit Product</a>
            </li>
        </ul>
    </div>
</div>

<ul class="box-info">

    <li>
        <!-- <i class='bx bxs-calendar-check'></i> -->
        <form action="./server/product_request.php" method="post" class="form-control" enctype="multipart/form-data">

            <span class="text">
                <h3>Edit product</h3>
                <br>
                <p>Name : <?php error("name_error", 5000); ?> </p>

                <input class="form-field" type="text" name="name" value="<?php value("name") ?>">

                <br>
                <br>
                <p>Price : <?php error("price_error", 5000); ?> </p>

                <input class="form-field" type="number" name="price" value="<?php value("price") ?>">

                <br>
                <br>

                <p>Description : <?php error("description_error", 5000); ?> </p>

                <textarea class="form-field" style="height: 11vw; padding: 0.7vw;" name="description"><?php value("description") ?></textarea>
                <br>
                <br>
                <p>Category : <?php error("category_id_error", 5000); ?> </p>

                <select class="form-field" name="category_id">
                    <option value="0">Select Category</option>
                    <?php

                    $sql = "SELECT * FROM category;";
                    $result = $conn->query($sql);
                    if (isset($result)) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $category = $row['name'];
                                $id = $row['id'];
                                if (isset($_SESSION['category_id']) && $_SESSION['category_id'] == $id) {
                                    unset($_SESSION['category_id']);
                                    echo "<option value='$id' selected>";
                                } else {
                                    echo "<option value='$id'>";
                                }
                                echo ucfirst($category);
                                echo "</option>";
                            }
                        }
                    }

                    ?>
                </select>

                <br>
                <br>
                <p>Image : (Tip: Choose image last) <?php error("image_error", 5000); ?> </p>

                <input class="form-field" style="border: none; padding-left: .2rem;" type="file" name="image">

                <br>
                <br>
                <input type="hidden" name="product_id" value="<?php echo $_GET['product_id']?>">
                <input type="submit" class="add-btn" name="edit_product" value="Change">
            </span>
            <!-- <a href="?add_category=true"><button class="add-btn">Add</button></a> -->
        </form>
    </li>


</ul>