<?php
require_once  dirname(__FILE__, 3) . '/partials/header-app.php';
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
            <table class="table table-brodered">
                <tr>
                    <td>Name,Mobile,Email</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" type="text" id="search_key" name="search_key" />
                    </td>
                    <td>
                        <input type="button"  value="Search" onclick="search_users()" class="btn btn-sm btn-success">
                        <input type="button"  value="Reset" onclick="reset()" class="btn btn-sm btn-warning">
                        <?php if ($db_handler->hasAccess('add')) { ?>
                            <a href="<?php echo BASE_URL ?>app/user/user-add.php" class="btn btn-sm btn-primary">+Add</a>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </div>

        <div id="table1_error"></div>
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
            <tbody id="table1">
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

    load_users('table1');

    function load_users(tableId) {
        $.ajax({
            url: API_BASE_URL + '?action=get_users',
            type: 'GET',
            success: function(response) {
                if (response.is_error == 0) {
                    populateTable(tableId, response.data)
                } else {
                    $("#" + tableId + "_error").text(response.message);
                }
            },
            error: function(error) {
                $("#" + response_container_id).text(error);
            }
        });
    }

    function reset(){
        $('#search_key').val('');
        load_users('table1');
    }

    function search_users() {
        var tableId = 'table1';
        var search_key = $('#search_key').val();
        $.ajax({
            url: API_BASE_URL + '?action=get_users&search_key=' + search_key,
            type: 'GET',
            success: function(response) {
                if (response.is_error == 0) {
                    populateTable(tableId, response.data)
                } else {
                    $("#" + tableId + "_error").text(response.message);
                }
            },
            error: function(error) {
                $("#" + response_container_id).text(error);
            }
        });
    }



    function populateTable(tableBodyId, jsonData) {
        var tableHTML = "";
        var count = 1;
        for (var item in jsonData) {
            row = jsonData[item];
            var editURL = BASE_URL + 'app/user/user-edit.php?user_id=' + row.user_id;
            tableHTML += "<tr>";
            tableHTML += "<td>" + count + "</td>";
            tableHTML += "<td>" + row.name + "</td>";
            tableHTML += "<td>" + row.mobile + "</td>";
            tableHTML += "<td>" + row.email + "</td>";
            tableHTML += "<td>" + row.gender + "</td>";
            tableHTML += "<td>" + row.dob + "</td>";
            tableHTML += "<td>" + row.status + "</td>";
            tableHTML += "<td>";
            tableHTML += '<a class="btn btn-sm btn-primary" href="' + editURL + '">Edit</a>';
            if (row.role_id > 1) {
                tableHTML += '&nbsp;<a class="btn btn-sm btn-danger" onclick="userDelete(' + row.user_id + ')">Delete</a>';
            }
            tableHTML += "</td>";
            tableHTML += "</tr>";
            count++;
        }

        document.getElementById(tableBodyId).innerHTML = tableHTML;
    }
</script>
<?php
require_once  dirname(__FILE__, 3) . '/partials/footer.php';
?>