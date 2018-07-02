<?php
	require_once('../../../private/initialize.php');
	require_login();
	if (is_post_request()) {
		
		// Handle form values sent by new.php
		
		$admin = [];
		$admin['username'] = $_POST['username'] ?? '';
		$admin['email'] = $_POST['email'] ?? '';
		$admin['token'] = $_POST['token'] ?? '';
		$admin['password'] = $_POST['password'] ?? '';
		$admin['confirm_password'] = $_POST['confirm_password'] ?? '';
		
		$result = insert_admin($admin);
		echo $result;
		if ($result === true) {
			$_SESSION['info'] = "Admin created successfully";
			$new_id = mysqli_insert_id($db); // Returns last inserted id via this connection
			redirect_to(url_for('/admin/admins/index.php'));
		} else {
			$_SESSION['errors'] = $errors;
			$_SESSION['form'] = 'submit_admin';
			
			// to repopulate the form
			$_SESSION['username'] = $_POST['username'] ?? '';
			$_SESSION['email'] = $_POST['email'] ?? '';
			
			redirect_to(url_for('/admin/index.php'));
		}
	} else {
		redirect_to(url_for('/admin/admins/index.php'));
	}

?>