<?php
require_once 'partials/header.php';
$name = '';
$mobile = '';
$email = '';
$password = '';
$dob = '';
$address = '';
$gender = '';
?>

<div class="container">
    <div class="offset-md-3 col-md-6 card">
        <?php show_alert(); ?>
        <div class="card-header">
            Register
        </div>
        <div class="card-body">
            <form id="form1">
                <div id="error_msg" class="error_msg"></div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Mobile:</label>
                    <input type="text" class="form-control" maxlength="10" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" value="<?php echo $password; ?>" name="password">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">DOB:</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Gender:</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="Male" <?php set_selected('Male', $gender); ?>>Male</option>
                        <option value="Female" <?php set_selected('Female', $gender); ?>>Female</option>
                        <option value="Other" <?php set_selected('Other', $gender); ?>>Other</option>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Address:</label>
                    <textarea class="form-control" id="address" name="address"><?php echo $address; ?></textarea>
                </div>
                <div class=" form-group text-center">
                    <button type="button" class="btn btn-success" onclick="register('form1','error_msg')">Create New Account</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="index.php">Login</a>
        </div>
    </div>

</div>

<?php
require_once 'partials/footer.php';
?>