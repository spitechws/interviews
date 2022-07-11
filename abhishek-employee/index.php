<?php
require_once('partials/header.php');
?>

<div class="logo-sigin">
	<img src="<?php echo ASSETS ?>images/amantya-logo.png">
</div>
<form action="php/login.php" method="post">

	<h2>SIGN IN</h2>
	<?php if (isset($_GET['error'])) { ?>
		<p class="error"><?php echo $_GET['error']; ?></p>
	<?php } ?>
	<label>User Name</label>
	<input type="text" name="uname" placeholder="User Name"><br>

	<label>User ID</label>
	<input type="text" name="user_id" placeholder="User_id"><br>

	<button type="submit">SIGNIN</button>
</form>

<?php
require_once('partials/footer.php');
?>