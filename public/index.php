<?php require_once('../private/initialize.php'); ?>
<?php
	$preview = false;
	if (isset($_GET['preview'])) {
		$preview = $_GET['preview'] == 'true' && is_logged_in() ? true : false;
	}
	$visible = !$preview;
?>
<?php $page_title = 'Open Heaven Travels & Treks'; ?>
<?php include(SHARED_PATH . '/homepage.php'); ?>

