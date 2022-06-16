<?php
require_once  dirname(__FILE__, 3) . '/partials/header-app.php';
?>
<div class="container main-content">
    <h2>User Add</h2>
    <div class="offset-md-4 col-md-4">
        <div id="form1_error"></div>
        <form id="form1" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Name:<span class="required">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Mobile:<span class="required">*</span></label>
                <input type="text" class="form-control" maxlength="10" id="mobile" name="mobile" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:<span class="required">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Password:<span class="required">*</span></label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">DOB:</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>

            <div class="mb-3 mt-3">
                <label for="signature" class="form-label">Signature:</label>
                <input type="file" class="form-control" id="signature" name="signature" accept="jpg">
            </div>

            <div class="mb-3 mt-3">
                <label for="signature" class="form-label">Profile Photo:</label>
                <input type="file" class="form-control" id="profile_pic" name="profile_pic" accept="jpg">
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Address:</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div class=" form-group text-center">
                <button type="submit" onclick="addUser('form1')" class="btn btn-success">Add</button>
            </div>

        </form>
    </div>
</div>

<?php
require_once  dirname(__FILE__, 3) . '/partials/footer.php';
?>