<?php if (!isset($page_title)) {
	$page_title = '';
}
?>

<!DOCTYPE html>
<html lang = "en">

<head>
	<meta charset = "utf-8">
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<title><?php echo $page_title; ?></title>
	
	<link rel = "icon" type = "image/png" sizes = "96x96" href = "<?php echo url_for('images/homepage_assets/icons/favicon-96x96.png'); ?>">
	<link href = "<?php echo url_for('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>">
	<link href = "<?php echo url_for('vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css'); ?>">
	<!-- Plugin CSS -->
	<link href = "<?php echo url_for('vendor/magnific-popup/magnific-popup.css" rel="stylesheet'); ?>">
	<!-- Custom CSS -->
	<link href = "<?php echo url_for('stylesheets/style_admin.css" rel="stylesheet" type="text/css'); ?>">
	
	<!-- if session errors are set show the form modal again -->
	<?php include(SHARED_PATH . '/check_session_errors.php') ?>
</head>

<body>

<nav class = "navbar navbar-expand-lg navbar-dark bg-dark p-0">
	<div class = "container">
		<a href = "<?php echo url_for('/admin/index.php'); ?>" class = "navbar-brand">Open Heaven</a>
		<button class = "navbar-toggler" data-toggle = "collapse" data-target = "#navbarNav">
			<span class = "navbar-toggler-icon"></span>
		</button>
		<div class = "collapse navbar-collapse" id = "navbarNav">
			<ul class = "navbar-nav">
				<li class = "nav-item dropdown">
					<a class = "nav-link dropdown-toggle" href = "#" id = "dropdown03" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">Images</a>
					<div class = "dropdown-menu" aria-labelledby = "dropdown03">
						<a class = "dropdown-item" href = "<?php echo url_for('/admin/slider_images/index.php'); ?>">Slider
						                                                                                             Images</a>
						<a class = "dropdown-item" href = "<?php echo url_for('/admin/gallery_images/index.php'); ?>">Gallery
						                                                                                              Images</a>
					</div>
				</li>
				<li class = "nav-item dropdown">
					<a class = "nav-link dropdown-toggle" href = "#" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">Activities</a>
					<div class = "dropdown-menu" aria-labelledby = "dropdown03">
						<a class = "dropdown-item" href = "<?php echo url_for('/admin/tours/index.php'); ?>">Tours</a>
						<a class = "dropdown-item" href = "<?php echo url_for('/admin/treks/index.php'); ?>">Treks</a>
					</div>
				</li>
				<li class = "nav-item px-2">
					<a href = "<?php echo url_for('/admin/testimonials/index.php'); ?>" class = "nav-link">Testimonials</a>
				</li>
				<li class = "nav-item px-2">
					<a href = "<?php echo url_for('/admin/admins/index.php'); ?>" class = "nav-link">Admins</a>
				</li>
				<li class = "nav-item px-2">
					<a href = "<?php echo url_for('/admin/about/index.php'); ?>" class = "nav-link">About</a>
				</li>
			</ul>
			
			<ul class = "navbar-nav ml-auto">
				<li class = "nav-item">
					<a href = "#" class = "nav-link active">
						<i class = "fa fa-user"></i> Welcome, <?php echo h($_SESSION['user']) ?? ''; ?>
					</a>
				</li>
				<li class = "nav-item">
					<a href = "<?php echo url_for('/admin/logout.php'); ?>" class = "nav-link">
						<i class = "fa fa-user-times"></i> Logout
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
