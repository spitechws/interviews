<?php
require_once  dirname(__FILE__, 3) . '/partials/header-app.php';

if (empty($_GET['emp_id'])) {
    invalid_action();
}
$emp_model->emp_id = $_GET['emp_id'];
$user = $emp_model->fetchByPk();
if (empty($user->emp_id)) {
    invalid_action();
}
?>
<div class="container main-content">
    <h2>Employee Edit</h2>
    <div class="offset-md-4 col-md-4">
        <div id="form1_error"></div>
        <form id="form1" method="post" enctype="multipart/form-data">
            <input type="hidden" name="emp_id" value="<?php echo $user->emp_id; ?>">
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
                <label for="email" class="form-label">Address:</label>
                <textarea class="form-control" id="address" name="address"><?php echo $user->address; ?></textarea>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">DOB:</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $user->dob; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Date of Joining:</label>
                <input type="date" class="form-control" id="doj" name="doj" value="<?php echo $user->doj; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Blood Group:</label>
                <input type="text" class="form-control" id="blood_group" name="blood_group" value="<?php echo $user->blood_group; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Designation:</label>
                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $user->designation; ?>">
            </div>
            <div class=" form-group text-center">
                <button type="submit" onclick="updateEmp('form1')" class="btn btn-success">Update</button>
            </div>

        </form>
    </div>
</div>

<?php
require_once  dirname(__FILE__, 3) . '/partials/footer.php';
?>