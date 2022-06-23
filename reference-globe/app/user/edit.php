<?php
require_once  dirname(__FILE__, 3) . '/partials/header-app.php';

if (empty($_GET['user_id'])) {
    invalid_action();
}
$user_model->user_id = $_GET['user_id'];
$user = $user_model->fetchByPk();
if (empty($user->user_id)) {
    invalid_action();
}
?>
<div class="container main-content">
    <h2>User Edit</h2>
    <div class="offset-md-4 col-md-4">
        <div id="form1_error"></div>
        <form id="form1" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $user->user_id; ?>">
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
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" <?php set_selected('1', $user->status); ?>>Active</option>
                    <option value="0" <?php set_selected('0', $user->status); ?>>Inactive</option>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="signature" class="form-label">Signature:</label>
                <?php show_image($user->signature, array('width' => 100, 'id' => 'signature_preview')); ?>
                <input type="hidden" name="signature_old" value="<?php echo $user->signature ?>" />
                <input type="file" class="form-control" id="signature" name="signature" accept="image/*" onchange="loadFile(event,'signature_preview')">
            </div>

            <div class="mb-3 mt-3">
                <label for="profile_pic" class="form-label">Profile Photo:</label>
                <?php show_image($user->profile_pic, array('width' => 100, 'id' => 'profile_pic_preview')); ?>
                <input type="hidden" name="profile_pic_old" value="<?php echo $user->profile_pic ?>" />
                <input type="file" class="form-control" id="profile_pic" name="profile_pic" accept="image/*" onchange="loadFile(event,'profile_pic_preview')">
            </div>
            <div class=" form-group text-center">
                <button type="submit" onclick="updateUser('form1')" class="btn btn-success">Update</button>
            </div>

        </form>
    </div>
</div>

<?php
require_once  dirname(__FILE__, 3) . '/partials/footer.php';
?>