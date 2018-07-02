<?php require_once('../../../private/initialize.php'); ?>
<?php
	if (!isset($_GET['token'])) {
		redirect_to(url_for('/admin/login.php'));
	}
	$token = $_GET['token'];
	$current_admin = find_admin_by_token($token);
	
	if (is_post_request()) {
		
		$new_password = $_POST['new_password'] ?? '';
		$confirm_password = $_POST['confirm_password'] ?? '';

		if (is_blank($new_password)) {
			$errors[] = "New password cannot be blank";
		}
		if (is_blank($confirm_password)) {
			$errors[] = "Confirm password cannot be blank";
		}
//		if ($new_password !== $confirm_password) {
//			$errors[] = "Passwords dont match";
//		}
		// if there were no errors try update
		if (empty($errors)) {      // process form request
			
			$admin = [];
			$admin['id'] = $current_admin['id'];
			$admin['username'] = $current_admin['username'];
			$admin['email'] = $current_admin['email'];
			$admin['password'] = $_POST['new_password'] ?? '';
			$admin['confirm_password'] = $_POST['confirm_password'] ?? '';
			$admin['token'] = '';
			
			$result = update_admin($admin);
			if ($result === true) {
				$_SESSION['info'] = "Password reset successful";
				redirect_to(url_for('/admin/login.php'));
			} else {
				// $errors = $result;
				// var_dump($errors);
				// reload the page with errors
			}
		}
	} else {
		if (!is_GET_request()) {
			redirect_to(url_for('/admin/login.php'));
		}
		
		$user = find_admin_by_token($token);
		$email = $user['email'];
		
		if (user_exists($email)) {
			if ($user['token'] == $token) {
				
				//			show this page
				
			} else {
				$_SESSION['info'] = 'Invalid Url';
				redirect_to(url_for('/admin/login.php'));
			}
			
		} else {
			$_SESSION['info'] = 'Invalid Url';
			redirect_to(url_for('/admin/login.php'));
		}
		
	}

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo url_for('images/homepage_assets/icons/android-icon-192x192.png'); ?>">
	
	<title>Password Reset</title>
	
	<!-- Bootstrap core CSS -->
	<link href="<?php echo url_for('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>">
	
	<!-- Custom styles for this template -->
	<link href="<?php echo url_for('stylesheets/login.css" rel="stylesheet" type="text/css'); ?>">
</head>

<body class="text-center body">
<form class="form-signin" action="<?php echo url_for('/admin/forgot_password/password_reset.php?token=' . $token) ?>" method="post">
	<div class="erros">
		<?php
			echo display_info(info());
		?>
		<?php errors(); ?>
		<?php echo display_errors($errors); ?>
	</div>
	<img class="mb-4" src="<?php echo url_for('images/homepage_assets/icons/android-icon-192x192.png'); ?>" alt="" width="72"
	     height="72">
	<h1 class="h3 mb-3 font-weight-normal">Reset Your Password</h1>
	<div class="form-group">
		<input type="password" name="new_password" id="password" class="form-control" placeholder="New Password" required>
	</div>
	<div class="form-group">
		<input type="password" name="confirm_password" id="confirm-password" class="form-control" placeholder="Confirm Password" required>
	</div>
	<button class="btn btn-lg btn-primary btn-block" type="submit" name="password_reset">Reset</button>
	<p class="mt-5 mb-3 text-muted">&copy; 2018, Open Heaven Travels and Trecks</p>
</form>

<script src="<?php echo url_for('vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo url_for('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>