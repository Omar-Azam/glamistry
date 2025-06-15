<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Message's</a>
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
            <h3>Message's</h3>
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
            <h3>Inbox</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Message_Date</th>
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






                $sql = "SELECT * FROM contact;";
                $result = $conn->query($sql);
                if (isset($result)) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $message = $row['message'];
                            $date = $row['created_at'];
                            echo "<tr>
                    <td>
                    <p>$id</p>
                    </td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$message</td>
                    <td>$date</td>
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