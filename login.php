<?php
require 'authentication.php'; // admin authentication check 

// auth check
if (isset($_SESSION['admin_id'])) {
	$user_id = $_SESSION['admin_id'];
	$user_name = $_SESSION['admin_name'];
	$security_key = $_SESSION['security_key'];
	if ($user_id != NULL && $security_key != NULL) {
		header('Location: task-info.php');
	}
}

if (isset($_POST['login_btn'])) {
	$info = $obj_admin->admin_login_check($_POST);
}

$page_name = "Login";
include("include/login_header.php");

?>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
	<section>
		<div class="kotak_login">
			<div>
				<center>
						<h2 class=fontlogin style="margin-top:1px;">Workmotely</h2>
				</center>
				<form action="" method="POST">
					<div>
						<h2 class="text-center" style="font-size: 24px;">Login</h2>
					</div>

					<!-- <div class="login-gap"></div> -->
					<?php if (isset($info)) { ?>
						<h5 class="alert alert-danger"><?php echo $info; ?></h5>
					<?php } ?>
					<div>
						<input type="text" class="gayainput" placeholder="Username" name="username" required />
					</div>
					<div ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
						<input type="password" class="gayainput" placeholder="Password" name="admin_password" required />
					</div>
					<button type="submit" name="login_btn">Login</button>
				</form>
			</div>
		</div>
	</section>
<?php

include("include/footer.php");

?>