<?php
require_once 'partials/header.php';
?>
<div class="container">
    <div class="offset-md-4 col-md-4 card">
        <?php show_alert(); ?>
        <div class="mb-3 mt-3 text-center">
            <img src="assets/images/profile.png" height="100" />
        </div>
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <div id="form1_error"></div>
            <form id="form1">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
                <div class="form-group text-center">
                    <button type="button" class="btn btn-primary" onclick="login('form1')">Login</button>
                    <a href="register.php" class="btn btn-success">Register</a>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="forgot-password.php">Forgot Password</a>
        </div>
    </div>

</div>

<?php
require_once 'partials/footer.php';
?>