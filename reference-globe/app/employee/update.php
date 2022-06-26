<?php
require_once  dirname(__FILE__, 3) . '/partials/header-app.php';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'delete') {
        //delete the user
        if (!empty($_GET['user_id'])) {
            $sql = 'DELETE FROM users where user_id=:user_id';
            $res = $db_handler->delete($sql, ['user_id' => $_GET['user_id']]);
            header('Location:users.php?msg=User Deleted Succcessfully');
        }
    }
}
?>
<div class="container main-content">
    <div class="offset-md-4 col-md-4">
        <?php show_alert(); ?>
        <form action="../php/user_update.php" method="post">
            <?php
            $user = $_SESSION['user'];
            $selected_gender = "Male";
            ?>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->name; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $user->mobile; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">DOB:</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $user->dob; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Male" <?php set_selected('Male', $user->gender); ?>>Male</option>
                    <option value="Female" <?php set_selected('Female', $user->gender); ?>>Female</option>
                    <option value="Other" <?php set_selected('Other', $user->gender); ?>>Other</option>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Address:</label>
                <textarea class="form-control" id="address" name="address"><?php echo $user->address; ?></textarea>
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