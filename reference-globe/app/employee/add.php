<?php
require_once  dirname(__FILE__, 3) . '/partials/header-app.php';
?>
<div class="container main-content">
    <h2>Employee Add</h2>
    <div class="offset-md-4 col-md-4">
        <div id="form1_error"></div>
        <form id="form1" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Address:</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">DOB:</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Date of Joining:</label>
                <input type="date" class="form-control" id="doj" name="doj">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Blood Group:</label>
                <input type="text" class="form-control" id="blood_group" name="blood_group">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Designation:</label>
                <input type="text" class="form-control" id="designation" name="designation">
            </div>
            <div class=" form-group text-center">
                <button type="submit" onclick="addEmp('form1')" class="btn btn-success">Add</button>
            </div>

        </form>
    </div>
</div>

<?php
require_once  dirname(__FILE__, 3) . '/partials/footer.php';
?>