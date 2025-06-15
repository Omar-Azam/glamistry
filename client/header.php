<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="index.php">Glamistry<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] === '/glamistry' || $_SERVER['REQUEST_URI'] === '/glamistry/' || $_SERVER['REQUEST_URI'] === '/glamistry/index.php') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link " href="/glamistry">Home</a>
                </li>
                <li class="nav-item <?php if (isset($_GET['shop']) || isset($_GET['product_detail'])) {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="?shop=true">Shop</a></li>
                <li class="nav-item <?php if (isset($_GET['about'])) {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="?about=true">About us</a></li>
                <li class="nav-item <?php if (isset($_GET['services'])) {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="?services=true">Services</a></li>
                <li class="nav-item <?php if (isset($_GET['blog'])) {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="?blog=true">Blog</a></li>
                <li class="nav-item <?php if (isset($_GET['contact'])) {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="?contact=true">Contact us</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <?php if (isset($_SESSION['user']['role']) == 'admin'): ?>
                    <li><a class="nav-link" href="/glamistry/admin/"><img src="./public/images/user.svg"> (Admin Panel)</a></li>
                    <li><a class="nav-link" href="?cart=true"><img src="./public/images/cart.svg"> (Cart)</a></li>
                    <?php elseif(isset($_SESSION['user']['id'])): ?>
                        <li><a class="nav-link" href="/glamistry/server/logout_request.php" style="color: #e55353;"><img src="./public/images/user.svg"> (Logout)</a></li>
                        <li><a class="nav-link" href="?cart=true"><img src="./public/images/cart.svg"> (Cart)</a></li>
                <?php else: ?>
                    <li><a class="nav-link" href="?login=true"><img src="./public/images/user.svg"> (Login)</a></li>
                    <li><a class="nav-link" href="?login=true"><img src="./public/images/cart.svg"> (Cart)</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>

</nav>

<!-- End Header/Navigation -->