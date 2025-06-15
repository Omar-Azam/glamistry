<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
</div>

<ul class="box-info">

<?php

$user_sql = "SELECT COUNT(id) AS total_users FROM users WHERE role = 'user';";

$user_result = $conn->query($user_sql);

if ($user_result) {
    $user_row = $user_result->fetch_assoc();
    $total_users = $user_row['total_users'];
    echo " <li>
        <i class='bx bxs-group'></i>
        <span class='text'>
            <h3>$total_users</h3>
            <p>Total Users</p>
        </span>
    </li>";
}

$orders_sql = "SELECT COUNT(id) AS total_orders, SUM(total_amount) AS total_sales FROM orders;";

$orders_result = $conn->query($orders_sql);

if ($orders_result) {
    $orders_row = $orders_result->fetch_assoc();
    $total_orders = $orders_row['total_orders'];
    $total_sales = $orders_row['total_sales'];

    echo "<li>
    <i class='bx bxs-calendar-check'></i>
    <span class='text'>
        <h3>$total_orders</h3>
        <p>Total Orders</p>
    </span>
</li>";

echo "<li>
    <i class='bx bxs-dollar-circle'></i>
    <span class='text'>
        <h3>$$total_sales</h3>
        <p>Total Sales</p>
    </span>
</li>";


}

?>

</ul>






<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Recent Orders</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Order_amount</th>
                    <th>Order_Date</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            
            $orders_sql = "SELECT * FROM orders ORDER BY id DESC;";
            $orders_result = $conn->query($orders_sql);
            if($orders_result->num_rows > 0){
                while($order_row = $orders_result->fetch_assoc()){
                    $user_id = $order_row['user_id'];
                    $total_amount = $order_row['total_amount'];
                    $order_date = $order_row['order_date'];
                    $user_sql = "SELECT * FROM users WHERE id = $user_id;";
                    $user_result = $conn->query($user_sql);
                    $user_row = $user_result->fetch_assoc();
                    $name = $user_row['name'];
                    $email = $user_row['email'];
                    echo "<tr>
                    <td>
                        <p>$user_id</p>
                    </td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$$total_amount.00</td>
                    <td>$order_date</td>
                    <td></td>
                </tr>";
                }
            }

            ?>
                
            </tbody>
        </table>
    </div>
</div>