<?php
	require_once('../../../private/initialize.php');
	require_login();
	if (is_post_request()) {
		
		// Handle form values sent by new.php
		
		$about = [];
		// $about['id'] = $_POST['id'] ?? '';
		$about['visible'] = $_POST['visible'] ?? '';
		$about['head'] = $_POST['head'] ?? '';
		$about['body'] = $_POST['body'] ?? '';
		
		$result = update_about($about);
		echo $result;
		if ($result === true) {
			$_SESSION['info'] = "About section updated successfully";
			$new_id = mysqli_insert_id($db); // Returns last inserted id via this connection
			redirect_to(url_for('/admin/about/index.php'));
		} else {
			$_SESSION['errors'] = $errors;
			$_SESSION['form'] = 'submit_about';
			
			// to repopulate the form
			$_SESSION['visible'] = $_POST['visible'] ?? '';
			$_SESSION['head'] = $_POST['head'] ?? '';
			$_SESSION['body'] = $_POST['body'] ?? '';
			
			redirect_to(url_for('/admin/index.php'));
		}
	} else {
		redirect_to(url_for('/admin/about/index.php'));
	}

?>