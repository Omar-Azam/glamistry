

<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Products</a>
            </li>
        </ul>
    </div>
</div>

<ul class="box-info">

    <li style="display: flex; justify-content: space-between; ">
        <!-- <i class='bx bxs-calendar-check'></i> -->
        <span class="text">
            <h3>Add Product</h3>
            <!-- <p>New Order</p> -->
        </span>
        <a href="?add_product=true"><button class="add-btn">Add</button></a>
    </li>

    <!-- <li>
        <i class='bx bxs-group'></i>
        <span class="text">
            <h3>2834</h3>
            <p>Visitors</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-dollar-circle'></i>
        <span class="text">
            <h3>$2543</h3>
            <p>Total Sales</p>
        </span>
    </li> -->
</ul>


<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Avaible Products</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category_ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Date_Created</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>
                        <p>1</p>
                    </td>
                    <td>Lipstick</td>
                    <td>02-11-2029</td>
                    <td><span class='status completed'>Edit</span></td>
                    <td><span class='status pending'>Delete</span></td>
                </tr> -->
                <?php






                $sql = "SELECT * FROM products ORDER BY id DESC;";
                $result = $conn->query($sql);
                if (isset($result)) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $category_id = ucfirst($row['category_id']);
                            $name = $row['name'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $created_at = $row['created_at'];
                            echo "<tr>
                    <td>
                    <p>$id</p>
                    </td>
                    <td><p>$category_id</p></td>
                    <td>$name</td>
                    <td>$$price.00</td>
                    <td>$created_at</td>
                    <input type='hidden' value'$id' name='id'>
                    <input type='hidden' value'$image_name' name='image_name'>
                    <td><a href='?edit_product=true&product_id=$id'><button class='edit'>Edit</button></a></td>
                    <td><a href='?delete_product=true&product_id=$id&product_image=$image_name'><button class='delete'>Delete</button></a></td>
                </tr>";
                        }
                    }
                }





                ?>
                <!-- <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status process">Process</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status completed">Completed</span></td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>