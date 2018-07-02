<?php
	require_once('../../../private/initialize.php');
	require_login();
	if (is_post_request()) {
		$table_name = 'testimonials';
		
		// Handle form values sent by new.php
		
		$testimonial = [];
		$testimonial['position'] = $_POST['position'] ?? '';
		$testimonial['visible'] = $_POST['visible'] ?? '';
		$testimonial['quote'] = $_POST['quote'] ?? '';
		$testimonial['footer'] = $_POST['footer'] ?? '';
		
		$result = insert($table_name, $testimonial);
		if ($result === true) {
			$_SESSION['info'] = "Testimonial created successfully";
			$new_id = mysqli_insert_id($db); // Returns last inserted id via this connection
			redirect_to(url_for('/admin/testimonials/index.php'));
		} else {
			$_SESSION['errors'] = $errors;
			$_SESSION['form'] = 'submit_testimonial';
			
			// to repopulate the form
			$_SESSION['position'] = $_POST['position'] ?? '';
			$_SESSION['visible'] = $_POST['visible'] ?? '';
			$_SESSION['quote'] = $_POST['quote'] ?? '';
			$_SESSION['footer'] = $_POST['footer'] ?? '';
			
			redirect_to(url_for('/admin/index.php'));
		}
	} else {
		redirect_to(url_for('/admin/testimonials/index.php'));
	}

?>