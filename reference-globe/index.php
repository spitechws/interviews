<?php
require_once 'partials/header.php';
?>

<div class="container">
    <div class="offset-md-4 col-md-4">
        <?php show_alert(); ?>
        <form action="php/login_check.php" method="post">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="register.php" class="btn btn-success">Register</a>
            </div>
            <div class="form-group text-center mt-20">
                <a href="forgot-password.php">Forgot Password</a>
            </div>
        </form>
    </div>

</div>

<?php
require_once 'partials/footer.php';
?>