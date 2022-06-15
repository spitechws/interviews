<?php
require_once  dirname(__FILE__, 2) . '/partials/header-app.php';
if (!$db_handler->hasAccess('view')) {
    header('Location:dashboard.php?msg=User Access Denied');
}
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

    <div class="table-responsive">
        <?php show_alert(); ?>
        <div class="search-bar">
            <form>
                <table class="table table-brodered">
                    <tr>
                        <td>Name,Mobile,Email</td>
                        <td>Action</td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            $search_key = '';
                            if (isset($_GET['search_key'])) {
                                $search_key = $_GET['search_key'];
                            };
                            ?>
                            <input class="form-control" type="text" name="search_key" value="<?php echo $search_key; ?>" />
                        </td>
                        <td>
                            <input type="submit" name="search" value="Search" class="btn btn-sm btn-success">
                            <?php if (isset($_GET['search'])) { ?>
                                <a href="users.php" class="btn btn-sm btn-warning">Reset</a>
                            <?php } ?>
                            <?php if ($db_handler->hasAccess('add')) { ?>
                                <a href="user_manage.php" class="btn btn-sm btn-primary">+Add</a>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </form>

        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>STATUS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = $user_model->fetchAll();
                $sn = 1;
                foreach ($users as $row) {
                    $user = $user_model->setUser($row);
                ?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->mobile; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->gender; ?></td>
                        <td><?php echo $user->getStatus(); ?></td>
                        <td><?php echo date('d/M/Y', strtotime($user->dob)); ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="userDelete('<?php echo $user->user_id ?>')">Delete</a>
                        </td>
                    </tr>
                <?php
                    $sn++;
                }
                ?>

            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    function userDelete(user_id) {
        var response = confirm('Are you sure want to delete this user?');
        if (response) {
            window.location = 'users.php?action=delete&user_id=' + user_id;
        }
    }
</script>
<?php
require_once  dirname(__FILE__, 2) . '/partials/footer.php';
?>