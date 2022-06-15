<?php
require_once 'header.php';
if (empty($_SESSION['user']->user_id)) {
  header('location:../index.php');
}
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">Hi! <?php echo $_SESSION['user']->name; ?>(<?php echo $_SESSION['user']->role_name; ?>)</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <?php
        if ($db_handler->hasAccess('view')) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="users.php">Users</a>
          </li>
        <?php } ?>

        <?php
        if ($_SESSION['user']->role_id == 3) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="user-update.php">Update Profile</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="../php/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>