<?php
require_once  dirname(__FILE__, 3) . '/partials/header-app.php';

$name='';
$mobile='';
$email='';
$dob='';
$gender='';
$address='';
$status='';
?>
<div class="container main-content">
<h2>User Add</h2>
    <div class="offset-md-4 col-md-4">
        <?php show_alert(); ?>
        <form action="../../php/user_manage.php" method="post">           
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
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
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" <?php set_selected('1', $status); ?>>Active</option>
                    <option value="0" <?php set_selected('0', $status); ?>>Inactive</option>
                </select>
            </div>
            <div class=" form-group text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>

        </form>
    </div>
</div>

<?php
require_once  dirname(__FILE__, 3) . '/partials/footer.php';
?>