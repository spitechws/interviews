<?php
require_once  dirname(__FILE__, 2) . '/partials/header-app.php';

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
        <?php
        if (!empty($_GET['msg'])) { ?>
            <div class="alert alert-success"><?php echo $_GET['msg']; ?></div>
        <?php
        }
        ?>
        <?php 
        if($_SESSION['user']->role_id==1){?>

        <?php
        }
        ?>
        <div class="search-bar">
            <a href="user-manage.php" class="btn btn-sm btn-success">+Add</a>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT * FROM users';
                $users = $db_handler->select($sql);
                $sn = 1;
                foreach ($users as $row) {
                    $row = (object)$row;
                ?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->mobile; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->gender; ?></td>
                        <td><?php echo date('d/M/Y', strtotime($row->dob)); ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="userDelete('<?php echo $row->user_id ?>')">Delete</a>
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