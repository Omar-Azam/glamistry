<?php

$sql = "SELECT * FROM category;";
$result = $conn->query($sql);
if (isset($result)) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $category = $row['name'];
            $id = $row['id'];
            if(isset($_GET['category_id']) && $_GET['category_id'] == $id){
                echo "<option value='$id' selected>";
            } else{
                echo "<option value='$id'>";
            }
            echo ucfirst($category);
            echo "</option>";
        }
    }
}

?>