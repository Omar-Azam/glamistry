<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Log In</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->

<div class="container mt-5">

    <form action="./server/login_request.php" method="post">
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="email" class="form-label">Email:
                <?php
                error("email_error", 5000);
                ?>
            </label>
            <input type="email" class="form-control" id="email" name="email" value="<?php value("login_email") ?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="pass" class="form-label">Password:
                <?php
                error("pass_error", 5000);
                ?>
            </label>
            <input type="password" class="form-control" id="pass" name="pass" value="<?php value("login_pass") ?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3" form-check>
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3 heading">
            <a href="?signup=true">Create an account?</a>
        </div>
        <button type="submit" name="login" class="btn btn-primary mt-4 mb-5 col-sm-6 offset-sm-3">Login</button>
        <div class="mb-5"></div>
    </form>

</div>