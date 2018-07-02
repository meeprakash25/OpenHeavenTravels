<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php $page_title = 'Admin Area | Dashboard'; ?>

<?php $slider_image_count = count_all_images("slider_images"); ?>
<?php $gallery_image_count = count_all_images("gallery_images"); ?>
<?php $tour_count = count_all_tours(); ?>
<?php $trek_count = count_all_treks(); ?>
<?php $testimonial_count = count_all_testimonials(); ?>
<?php $admin_count = count_all_admins(); ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>

<header id = "main-header" class = "py-4 bg-info text-white">
	<div class = "container">
		<div class = "row">
			<div class = "col-md-8">
				<h3>
					<i class = "fa fa-gears"></i> Dashboard</h3>
			</div>
			<div class = "col-md-4">
				<?php
					echo display_info(info());
				?>
			</div>
		</div>
	</div>
</header>

<!-- ACTIONS -->
<section id = "action" class = "py-2 mb-4 bg-light">
	<div class = "container">
		<div class = "row justify-content-around">
			<div class = "col-lg-2 col-md-4 pt-2">
				<a href = "#" class = "btn btn-info btn-block" id = "addSImage" data-toggle = "modal" data-target = "#addSImageModal">
					<i class = "fa fa-plus"></i> Add Slider Image
				</a>
			</div>
			<div class = "col-lg-2 col-md-4 pt-2">
				<a href = "#" class = "btn btn-primary btn-block" id = "addTour" data-toggle = "modal" data-target = "#addTourModal">
					<i class = "fa fa-plus"></i> Add Tour
				</a>
			</div>
			<div class = "col-lg-2 col-md-4 pt-2">
				<a href = "#" class = "btn btn-danger btn-block" id = "addTrek" data-toggle = "modal" data-target = "#addTrekModal">
					<i class = "fa fa-plus"></i> Add Trek
				</a>
			</div>
			<div class = "col-lg-2 col-md-4 pt-2">
				<a href = "#" class = "btn btn-success btn-block" id = "addTestimonial" data-toggle = "modal" data-target = "#addTestimonialModal">
					<i class = "fa fa-plus"></i> Add Testimonial
				</a>
			</div>
			
			<div class = "col-lg-2 col-md-4 py-2">
				<a href = "#" class = "btn btn-warning btn-block text-light" id = "addAdmin" data-toggle = "modal" data-target = "#addAdminModal">
					<i class = "fa fa-plus"></i> Add Admin
				</a>
			</div>
			<div class = "col-lg-2 col-md-4 py-2">
				<a href = "#" class = "btn btn-info btn-block text-light" id = "addGImage" data-toggle = "modal" data-target = "#addGImageModal">
					<i class = "fa fa-plus"></i> Add Gallery Image
				</a>
			</div>
		</div>
	</div>
</section>

<!-- Activities -->
<section id = "posts">
	<div class = "container">
		<div class = "row">
			<div class = "col-md-12">
				<div class = "card">
					<div class = "card-header">
						<h4>Manage Content</h4>
					</div>
					<div class = "card-body">
						<div class = "row justify-content-around">
							<div class = "col-lg-2 col-md-4 col-sm-6">
								<div class = "card text-center bg-info text-white mb-3 sr-icon">
									<div class = "card-body">
										<h6>Slider Images</h6>
										<h1 class = "display-4">
											<i class = "fa fa-image" style = "font-size: 40px;"></i> <?php echo h($slider_image_count); ?>
										</h1>
										<a href = "<?php echo url_for('/admin/slider_images/index.php'); ?>" class = "btn btn-outline-light">View</a>
									</div>
								</div>
							</div>
							<div class = "col-lg-2 col-md-4 col-sm-6">
								<div class = "card text-center bg-primary text-white mb-3 sr-icon">
									<div class = "card-body">
										<h6>Tours</h6>
										<h1 class = "display-4">
											<i class = "fa fa-hand-o-right" style = "font-size: 40px;"></i> <?php echo h($tour_count); ?>
										</h1>
										<a href = "<?php echo url_for('/admin/tours/index.php'); ?>" class = "btn btn-outline-light">View</a>
									</div>
								</div>
							</div>
							<div class = "col-lg-2 col-md-4 col-sm-6">
								<div class = "card text-center bg-danger text-white mb-3 sr-icon">
									<div class = "card-body">
										<h6>Treks</h6>
										<h1 class = "display-4">
											<i class = "fa fa-hand-o-right" style = "font-size: 40px;"></i> <?php echo h($trek_count); ?>
										</h1>
										<a href = "<?php echo url_for('/admin/treks/index.php'); ?>" class = "btn btn-outline-light">View</a>
									</div>
								</div>
							</div>
							<div class = "col-lg-2 col-md-4 col-sm-6">
								<div class = "card text-center bg-success text-white mb-3 sr-icon">
									<div class = "card-body">
										<h6>Testimonials</h6>
										<h1 class = "display-4">
											<i class = "fa fa-comment-o" style = "font-size: 40px;"></i> <?php echo h($testimonial_count); ?>
										</h1>
										<a href = "<?php echo url_for('/admin/testimonials/index.php'); ?>" class = "btn btn-outline-light">View</a>
									</div>
								</div>
							</div>
							<div class = "col-lg-2 col-md-4 col-sm-6">
								<div class = "card text-center bg-warning text-white mb-3 sr-icon">
									<div class = "card-body">
										<h6>Admins</h6>
										<h1 class = "display-4">
											<i class = "fa fa-users" style = "font-size: 40px;"></i> <?php echo h($admin_count); ?>
										</h1>
										<a href = "<?php echo url_for('/admin/admins/index.php'); ?>" class = "btn btn-outline-light">View</a>
									</div>
								</div>
							</div>
							<div class = "col-lg-2 col-md-4 col-sm-6">
								<div class = "card text-center bg-info text-white mb-3 sr-icon">
									<div class = "card-body">
										<h6>Gallery</h6>
										<h1 class = "display-4">
											<i class = "fa fa-file-image-o" style = "font-size: 40px;"></i> <?php echo h($gallery_image_count); ?>
										</h1>
										<a href = "<?php echo url_for('/admin/gallery_images/index.php'); ?>" class = "btn btn-outline-light">View</a>
									</div>
								</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ACTIONS -->
<section id = "action" class = "py-2 mb-4 bg-light">
	<div class = "container">
		<div class = "row justify-content-start">
			<div class = "col-lg-2 col-md-4 pt-2">
				<a href = "#" class = "btn btn-info btn-block" id = "editAbout" data-toggle = "modal" data-target = "#editAboutModal">
					<i class = "fa fa-pencil"></i> Edit About
				</a>
			</div>
		</div>
	</div>
</section>

<div class = "modals">
	<?php include(SHARED_PATH . '/modal_slider_image.php') ?>
	<?php include(SHARED_PATH . '/modal_gallery_image.php') ?>
	<?php include(SHARED_PATH . '/modal_tour.php') ?>
	<?php include(SHARED_PATH . '/modal_trek.php') ?>
	<?php include(SHARED_PATH . '/modal_testimonial.php') ?>
	<?php include(SHARED_PATH . '/modal_about.php') ?>
	<?php include(SHARED_PATH . '/modal_admin.php') ?>
</div>

<!-- setting session values to null // values used for repopulating the form modal  -->
<?php include(SHARED_PATH . '/set_sessions_null.php') ?>

<?php include(SHARED_PATH . '/admin_footer.php') ?>
