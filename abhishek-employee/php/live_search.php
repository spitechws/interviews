<?php
require_once(dirname(__FILE__, 2) . '/config.php');

if (isset($_POST['data'])) {
    $data = $_POST['data'];
    $query = "SELECT * FROM employee detailsi WHERE employee_name LIKE '{$data}%'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) { ?>
        <table class="table tabel-bordered table-striped mt-4">
            <thead>
                <tr class="customers">
                    <th>ID</th>
                    <th>EmployeName</th>
                    <th>Designation</th>
                    <th>Grade</th>
                    <th>Permission</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $employee_name = $row['employee_name'];
                    $designation = $row['designation'];
                    $grade     = $row['grade'];
                    $permission = $row['permission'];
                ?>
                    <tr>

                        <td><?php echo $id; ?></td>
                        <td><?php echo $employee_name; ?></td>
                        <td><?php echo $designation; ?></td>
                        <td><?php echo $grade; ?></td>
                        <td><?php echo $permission; ?></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
<?php
    } else {
        echo "No Data Found";
    }
} else {
    echo "hello";
}
?>