<?php
	require_once('../../../private/initialize.php');
	require_login();
	if (is_post_request()) {
		$table_name = 'tours';
		
		// Handle form values sent by new.php
		
		$tour = [];
		$tour['position'] = $_POST['position'] ?? '';
		$tour['destination'] = $_POST['destination'] ?? '';
		$tour['tour_name'] = $_POST['tour_name'] ?? '';
		$tour['activities'] = $_POST['activities'] ?? '';
		$tour['tour_duration'] = $_POST['tour_duration'] ?? '';
		$tour['tour_grade'] = $_POST['tour_grade'] ?? '';
		$tour['seasons'] = $_POST['seasons'] ?? '';
		$tour['group_size'] = $_POST['group_size'] ?? '';
		$tour['altitude'] = $_POST['altitude'] ?? '';
		$tour['accommodation'] = $_POST['accommodation'] ?? '';
		$tour['transport'] = $_POST['transport'] ?? '';
		$tour['overview'] = $_POST['overview'] ?? '';
		$tour['itinenarary'] = $_POST['itinenarary'] ?? '';
		$tour['cost_info'] = $_POST['cost_info'] ?? '';
		$tour['gallery'] = $_POST['gallery'] ?? '';
		$tour['visible'] = $_POST['visible'] ?? '';
		
		$result = insert($table_name, $tour);
		// echo $result;
		if ($result === true) {
			$_SESSION['info'] = "Tour created successfully";
			$new_id = mysqli_insert_id($db); // Returns last inserted id via this connection
			redirect_to(url_for('/admin/tours/show.php?id=' . $new_id));
		} else {
			$_SESSION['errors'] = $errors;
			$_SESSION['form'] = 'submit_tour';
			
			// to repopulate the form
			$_SESSION['position'] = $_POST['position'] ?? '';
			$_SESSION['destination'] = $_POST['destination'] ?? '';
			$_SESSION['tour_name'] = $_POST['tour_name'] ?? '';
			$_SESSION['activities'] = $_POST['activities'] ?? '';
			$_SESSION['tour_duration'] = $_POST['tour_duration'] ?? '';
			$_SESSION['tour_grade'] = $_POST['tour_grade'] ?? '';
			$_SESSION['seasons'] = $_POST['seasons'] ?? '';
			$_SESSION['group_size'] = $_POST['group_size'] ?? '';
			$_SESSION['altitude'] = $_POST['altitude'] ?? '';
			$_SESSION['accommodation'] = $_POST['accommodation'] ?? '';
			$_SESSION['transport'] = $_POST['transport'] ?? '';
			$_SESSION['overview'] = $_POST['overview'] ?? '';
			$_SESSION['itinenarary'] = $_POST['itinenarary'] ?? '';
			$_SESSION['cost_info'] = $_POST['cost_info'] ?? '';
			$_SESSION['gallery'] = $_POST['gallery'] ?? '';
			$_SESSION['visible'] = $_POST['visible'] ?? '';
			
			redirect_to(url_for('/admin/index.php'));
		}
	} else {
		redirect_to(url_for('/admin/tours/index.php'));
	}

?>
