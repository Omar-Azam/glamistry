<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Analytics</a>
            </li>
        </ul>
    </div>
</div>

<ul class="box-info">

    <!-- <li>
        <i class='bx bxs-calendar-check'></i>
        <span class="text">
            <h3>1020</h3>
            <p>New Order</p>
        </span>
    </li> -->

    <li>
        <i class='bx bxs-group'></i>
        <span class="text">
            <h3>Top Users</h3>
            <!-- <p>Users</p> -->
        </span>
    </li>
    <!-- <li>
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
            <h3>Top 10 Users</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Total_Orders</th>
                    <th>Total_Purchase</th>
                    <th>Registration_Date</th>
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






                $sql = "SELECT user_id, COUNT(*) AS order_count, SUM(total_amount) AS total_spent FROM orders GROUP BY user_id ORDER BY total_spent DESC LIMIT 10;";
                $result = $conn->query($sql);
                if (isset($result)) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $user_id = $row['user_id'];
                            $total_order = $row['order_count'];
                            $total_purchase = $row['total_spent'];
                            $user_sql = "SELECT * FROM users Where id = $user_id;";
                            $user_result = $conn->query($user_sql);
                            while ($user_row = $user_result->fetch_assoc()) {
                                $name = $user_row['name'];
                                $email = $user_row['email'];
                                $registration = $user_row['created_at'];
                                echo "<tr>
                    <td>
                    <p>$user_id</p>
                    </td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$total_order</td>
                    <td>$$total_purchase.00</td>
                    <td>$registration</td>
                </tr>";
                            }
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

<ul class="box-info">

    <!-- <li>
        <i class='bx bxs-calendar-check'></i>
        <span class="text">
            <h3>1020</h3>
            <p>New Order</p>
        </span>
    </li> -->

    <li>
        <i class='bx bxs-dollar-circle'></i>
        <span class="text">
            <h3>Top Products</h3>
            <!-- <p>Users</p> -->
        </span>
    </li>
    <!-- <li>
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
            <h3>Top 10 Products</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category_ID</th>
                    <th>Name</th>
                    <th>Total_Orders</th>
                    <th>Total_Sales</th>
                    <th>Date_Created</th>
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








                $sql = "SELECT product_id, COUNT(order_id) AS order_count, SUM(price) AS total_price FROM order_items GROUP BY product_id ORDER BY total_price DESC LIMIT 10;";
                $result = $conn->query($sql);
                if (isset($result)) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $product_id = $row['product_id'];
                            $total_order = $row['order_count'];
                            $total_sales = $row['total_price'];
                            $product_sql = "SELECT * FROM products Where id = $product_id;";
                            $product_result = $conn->query($product_sql);
                            while ($product_row = $product_result->fetch_assoc()) {
                                $name = $product_row['name'];
                                $category_id = $product_row['category_id'];
                                $created_at = $product_row['created_at'];
                                echo "<tr>
                    <td>
                    <p>$product_id</p>
                    </td>
                    <td>$category_id</td>
                    <td>$name</td>
                    <td>$total_order</td>
                    <td>$$total_sales.00</td>
                    <td>$created_at</td>
                </tr>";
                            }
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