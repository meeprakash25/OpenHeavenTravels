<?php
	require_once('../../../private/initialize.php');
	require_login();
	if (is_post_request()) {
		$table_name = 'treks';
		
		// Handle form values sent by new.php
		
		$trek = [];
		$trek['position'] = $_POST['position'] ?? '';
		$trek['trip_duration'] = $_POST['trip_duration'] ?? '';
		$trek['trek_duration'] = $_POST['trek_duration'] ?? '';
		$trek['start_end_place'] = $_POST['start_end_place'] ?? '';
		$trek['trek_name'] = $_POST['trek_name'] ?? '';
		$trek['trek_type'] = $_POST['trek_type'] ?? '';
		$trek['trek_grade'] = $_POST['trek_grade'] ?? '';
		$trek['seasons'] = $_POST['seasons'] ?? '';
		$trek['group_size'] = $_POST['group_size'] ?? '';
		$trek['altitude'] = $_POST['altitude'] ?? '';
		$trek['walking_hours'] = $_POST['walking_hours'] ?? '';
		$trek['highlights'] = $_POST['highlights'] ?? '';
		$trek['cost'] = $_POST['cost'] ?? '';
		$trek['overview'] = $_POST['overview'] ?? '';
		$trek['itinenarary'] = $_POST['itinenarary'] ?? '';
		$trek['cost_info'] = $_POST['cost_info'] ?? '';
		$trek['equipments'] = $_POST['equipments'] ?? '';
		$trek['gallery'] = $_POST['gallery'] ?? '';
		$trek['visible'] = $_POST['visible'] ?? '';
		
		$result = insert($table_name, $trek);
		// echo $result;
		if ($result === true) {
			$_SESSION['info'] = "trek created successfully";
			$new_id = mysqli_insert_id($db); // Returns last inserted id via this connection
			redirect_to(url_for('/admin/treks/show.php?id=' . $new_id));
		} else {
			$_SESSION['errors'] = $errors;
			$_SESSION['form'] = 'submit_trek';
			
			// to repopulate the form
			$_SESSION['position'] = $_POST['position'] ?? '';
			$_SESSION['trip_duration'] = $_POST['trip_duration'] ?? '';
			$_SESSION['trek_duration'] = $_POST['trek_duration'] ?? '';
			$_SESSION['start_end_place'] = $_POST['start_end_place'] ?? '';
			$_SESSION['trek_name'] = $_POST['trek_name'] ?? '';
			$_SESSION['trek_type'] = $_POST['trek_type'] ?? '';
			$_SESSION['trek_grade'] = $_POST['trek_grade'] ?? '';
			$_SESSION['seasons'] = $_POST['seasons'] ?? '';
			$_SESSION['group_size'] = $_POST['group_size'] ?? '';
			$_SESSION['altitude'] = $_POST['altitude'] ?? '';
			$_SESSION['walking_hours'] = $_POST['walking_hours'] ?? '';
			$_SESSION['highlights'] = $_POST['highlights'] ?? '';
			$_SESSION['cost'] = $_POST['cost'] ?? '';
			$_SESSION['overview'] = $_POST['overview'] ?? '';
			$_SESSION['itinenarary'] = $_POST['itinenarary'] ?? '';
			$_SESSION['cost_info'] = $_POST['cost_info'] ?? '';
			$_SESSION['equipments'] = $_POST['equipments'] ?? '';
			$_SESSION['gallery'] = $_POST['gallery'] ?? '';
			$_SESSION['visible'] = $_POST['visible'] ?? '';
			
			redirect_to(url_for('/admin/index.php'));
		}
	} else {
		redirect_to(url_for('/admin/treks/index.php'));
	}

?>