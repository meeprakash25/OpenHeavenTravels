<?php
	require_once('../../../private/initialize.php');
	require_login();
?>
<?php
	//$max_file_size = 1048576;   // expressed in bytes
	//     10240 =  10 KB
	//    102400 = 100 KB
	//   1048576 =   1 MB
	//  10485760 =  10 MB
	
	// handle error if upload_max_filesize > post_max_size
	if (empty($_FILES) && empty($_POST) && isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post') { //catch file overload error...
		$postMax = ini_get('post_max_size'); //grab the size limits...
		echo "<p style=\"color: #F00;\">\nPlease note files larger than {$postMax} will result in this error!<br>Please be advised this is not a limitation in the CMS, This is a limitation of the hosting server.<br>For various reasons they limit the max size of uploaded files, if you have access to the php ini file you can fix this by changing the post_max_size setting.<br> If you can't then please ask your host to increase the size limits, or use the FTP uploaded form</p><h3><a href=\"";
		echo url_for('/admin/index.php');
		echo "\">Back to home</a></h3>";
	} elseif (isset($_POST['submit_simage'])) {
		$table_name = 'slider_images';
		
		$image = [];
		$image['position'] = $_POST['position'] ?? '';
		$image['visible'] = $_POST['visible'] ?? '';
		$image['caption'] = $_POST['caption'] ?? '';
		
		$image['filename'] = basename($_FILES['image_upload']['name']) ?? '';
		$image['type'] = $_FILES['image_upload']['type'] ?? '';
		$image['size'] = $_FILES['image_upload']['size'] ?? '';
		$target_dir = "../../images/homepage_assets/slider_images";
		
		$result = insert($table_name, $image, $_FILES['image_upload'], $target_dir);
		// echo $result;
		if ($result === true) {
			$_SESSION['info'] = "Image uploaded successfully.";
			redirect_to(url_for('/admin/slider_images/index.php'));
		} else {
			// Failure
			$_SESSION['errors'] = $errors;
			$_SESSION['form'] = 'submit_simage';
			// to repopulate the form
			$_SESSION['position'] = $_POST['position'] ?? '';
			$_SESSION['image'] = $_FILES['image_upload']['tmp_name'];
			$_SESSION['caption'] = $_POST['caption'] ?? '';
			$_SESSION['visible'] = $_POST['visible'] ?? '';
			redirect_to(url_for('/admin/index.php'));
		}
		
	} else {
		redirect_to(url_for('/admin/index.php'));
	}

?>
