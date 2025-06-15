<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="" href="#">Categories</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Add Category</a>
            </li>
        </ul>
    </div>
</div>

<ul class="box-info">

    <li>
        <!-- <i class='bx bxs-calendar-check'></i> -->
         <form action="./server/category_request.php" method="post" class="form-control">

             <span class="text">
                 <h3>Add Category</h3>
                 <br>
                     <p>Category : <?php error("category_error", 5000); ?> </p>

                     <input class="form-field" type="text" name="category">
                    
                    <br>
                    <br>
                    <input type="submit" class="add-btn" name="add_category" value="Add" >
                </span>
                <!-- <a href="?add_category=true"><button class="add-btn">Add</button></a> -->
            </form>
    </li>


</ul>