<?php
require_once(dirname(__FILE__, 2) . '/config.php');

$data = $_POST['search_key'];
$query = "SELECT * FROM employee  WHERE employee_name LIKE '{$data}%'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) { ?>
    <table class="table tabel-bordered">
        <thead>
            <tr class="customers">
                <th>#</th>
                <th>Select</th>
                <th>Employ eName</th>
                <th>Designation</th>
                <th>Grade</th>
                <th>Permission</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $employee_name = $row['employee_name'];
                $designation = $row['designation'];
                $grade     = $row['grade'];
                $permission = $row['permission'];
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><input type="checkbox" name="emp[]" id="emp<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>"></td>
                    <td><?php echo $employee_name; ?></td>
                    <td><?php echo $designation; ?></td>
                    <td><?php echo $grade; ?></td>
                    <td><?php echo $permission; ?></td>
                </tr>

            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo "No Data Found";
}
