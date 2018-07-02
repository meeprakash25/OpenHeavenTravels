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
	<title><?php echo h($page_title);
			if ($preview == true) {
				echo "-[PREVIEW]";
			} ?></title>
	
	<link rel = "icon" type = "image/png" sizes = "96x96" href = "<?php echo url_for('images/homepage_assets/icons/favicon-96x96.png'); ?>">
	<link href = "<?php echo url_for('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>">
	<link href = "<?php echo url_for('vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css'); ?>">
	<!-- Plugin CSS -->
	<link href = "<?php echo url_for('vendor/magnific-popup/magnific-popup.css" rel="stylesheet'); ?>">
	<!-- Custom CSS -->
	<link href = "<?php echo url_for('stylesheets/page_style.css" rel="stylesheet" type="text/css'); ?>">

</head>

<body>

<nav class = "navbar navbar-expand-sm navbar-dark p-0">
	<div class = "container">
		<a href = "<?php echo url_for('/index.php'); ?>" class = "navbar-brand">Open Heaven</a>
		<button class = "navbar-toggler" data-toggle = "collapse" data-target = "#navbarNav">
			<span class = "navbar-toggler-icon"></span>
		</button>
		<div class = "collapse navbar-collapse" id = "navbarNav">
			<ul class = "navbar-nav">
				<li class = "nav-item px-2">
					<a href = "<?php echo url_for('/index.php#services'); ?>" class = "nav-link">Our Tours and Treks</a>
				</li>
			</ul>
			
			<ul class = "navbar-nav ml-auto">
				<li class = "nav-item">
					<!-- item1 -->
				</li>
				<li class = "nav-item">
					<!-- item1 -->
				</li>
			</ul>
		</div>
	</div>
</nav>