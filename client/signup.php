<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Sign Up</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->

<div class="container mt-5">

    <form action="./server/signup_request.php" method="post">
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="name" class="form-label">Name:
                <?php
                error("name_error", 5000);
                ?>
            </label>
            <input type="text" class="form-control" id="name" name="name" value="<?php value("name") ?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="email" class="form-label">Email:
                <?php
                error("email_error", 5000);
                ?>
            </label>
            <input type="email" class="form-control" id="email" name="email" value="<?php value("email") ?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="number" class="form-label">Phone Number:
                <?php
                error("number_error", 5000);
                ?>
            </label>
            <input type="tel" class="form-control" name="number" id="number" value="<?php value("number") ?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="dob" class="form-label">Date Of Birth:
                <?php
                error("dob_error", 5000);
                ?>
            </label>
            <input type="date" class="form-control" name="dob" id="dob" value="<?php value("dob") ?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label class="form-label d-block">Gender:
                <?php
                error("gender_error", 5000);
                ?>
            </label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if (isset($_SESSION['gender']) == "male") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                <label class="form-check-label" for="male">Male</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if (isset($_SESSION['gender']) == "female") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                <label class="form-check-label" for="female">Female</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="other" value="other" <?php if (isset($_SESSION['gender']) == "other") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                <label class="form-check-label" for="other">Other</label>
            </div>
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="pass" class="form-label">Password:
                <?php
                error("pass_error", 5000);
                ?>
            </label>
            <input type="password" class="form-control" id="pass" name="pass" value="<?php value("pass") ?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="conf_pass" class="form-label">Confirm Password:
                <?php
                error("conf_pass_error", 5000);
                ?>
            </label>
            <input type="password" class="form-control" id="conf_pass" name="conf_pass" value="<?php value("conf_pass") ?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3" form-check>
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3 heading">
            <a href="?login=true">Already have an account?</a>
        </div>
        <button type="submit" name="signup" class="btn btn-primary mt-4 mb-5 col-sm-6 offset-sm-3">Sign Up</button>
        <div class="mb-5"></div>
    </form>

</div>