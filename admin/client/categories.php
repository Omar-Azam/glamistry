

<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Categories</a>
            </li>
        </ul>
    </div>
</div>

<ul class="box-info">

    <li style="display: flex; justify-content: space-between; ">
        <!-- <i class='bx bxs-calendar-check'></i> -->
        <span class="text">
            <h3>Add Category</h3>
            <!-- <p>New Order</p> -->
        </span>
        <a href="?add_category=true"><button class="add-btn">Add</button></a>
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
            <h3>Avaible Categories</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
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






                $sql = "SELECT * FROM category ORDER BY id DESC;";
                $result = $conn->query($sql);
                if (isset($result)) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $category = ucfirst($row['name']);
                            $id = $row['id'];
                            $created_at = $row['created_at'];
                            echo "<tr>
                    <td>
                    <p>$id</p>
                    </td>
                    <td>$category</td>
                    <td>$created_at</td>
                    <input type='hidden' value'$id' name='id'>
                    <td><a href='?edit_category=true&category_id=$id'><button class='edit'>Edit</button></a></td>
                    <td><a href='?delete_category=true&category_id=$id'><button class='delete'>Delete</button></a></td>
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