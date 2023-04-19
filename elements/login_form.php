<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php
	if(isset($_SESSION[AUTH_ID])) {
		redirect();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOG IN</title>
	<link rel="icon" href="assets/images/logo.png">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
	<!-- Main Style -->
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="hold-transition login login-page text-xs">
	<div class="preloader flex-column justify-content-center align-items-center">
		<img class="animation__shake" src="assets/images/logo.png" height="100" width="100">
	</div>
	<div class="login-box">
		<div class="login-logo">
			<img src="assets/images/logo.png" class="logo-login">
			<h4 class="glow title">CPSU PROCUREMENT OFFICE</h4>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<?= show_validation() ?>
				<form method="post">
					<input type="hidden" name="action" value="validate_user">
					<div class="input-group mb-3">
						<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user-tie"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-success">
								<input type="checkbox" id="show" onclick="showPassword()">
								<label for="show">Show Password</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" name="submit" class="btn btn-success btn-block mt-3">Sign In <i class="fa fa-arrow-right"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="assets/dist/js/adminlte.min.js"></script>
	<!-- Main Script -->
	<script src="assets/js/script.js"></script>

</body>

</html>