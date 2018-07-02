<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php
	// must have an ID
	if (empty($_GET['id'])) {
		$_SESSION['info'] = "No photograph ID was provided";
		redirect_to('index.php');
	}
	
	$table_name = 'gallery_images';
	
	$id = $_GET['id'];
	$image = find_image_by_id("gallery_images", $id);
	$image_path = "../../images/homepage_assets/gallery/fullsize/{$image['filename']}";
	// $image = find_image_by_id($id);
	if (delete($table_name, $id, $image_path)) {
		$_SESSION['info'] = "Image successfully deleted";
		redirect_to('index.php');
	} else {
		$_SESSION['info'] = "Image not found on server";
		redirect_to('index.php');
	}

?>
