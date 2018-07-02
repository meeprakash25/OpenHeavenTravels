<?php
	require_once('../../../private/initialize.php');
	require_login();
	if (!isset($_GET['id'])) {
		redirect_to(url_for('/admin/testimonials/index.php'));
	}
	$id = $_GET['id'];
	
	if (is_post_request()) {
		$table_name = 'testimonials';
		$result = delete($table_name, $id);
		$_SESSION['info'] = "testimonial deleted successfully";
		redirect_to(url_for('/admin/testimonials/index.php'));
	} else {
		$testimonial = find_testimonial_by_id($id);
	}

?>

<?php $page_title = 'Delete Testimonial'; ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>
	
	<header id = "main-header" class = "py-4 bg-success text-white">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-8">
					<h3>
						Delete testimonial
					</h3>
				</div>
			</div>
		</div>
	</header>
	
	<!-- ACTIONS -->
	<section id = "action" class = "py-4 mb-4 bg-light">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-3 mr-auto">
					<a href = "<?php echo url_for('/admin/index.php'); ?>" class = "btn btn-light btn-block pt-2">
						<i class = "fa fa-arrow-left"></i> Back To Dashboard
					</a>
				</div>
			</div>
		</div>
	</section>
	
	<div class = "container">
		<div class = "row">
			<div class = "col-md-12">
				<div class = "card">
					<div class = "card-header main-color-bg">Delete testimonial</div>
					<div class = "card-body">
						<h5>Are you sure you want to delete this testimonial by
							<strong>
								<?php echo h($testimonial['footer']); ?>
							</strong> ?</h5>
						<br>
						<br>
						<form action = "<?php echo url_for('/admin/testimonials/delete.php?id=' . h(u($testimonial['id']))); ?>" method = "post">
							<div class = "row justify-content-end">
								<div class = "col-md-3">
									<a class = "btn btn-secondary btn-block m-2" href = "<?php echo url_for('/admin/testimonials/edit.php?id=' . h(u($testimonial['id']))); ?>">Cancel</a>
								</div>
								<div class = "col-md-4">
									<button type = "submit" class = "btn btn-danger btn-block m-2" name = "commit">
										<i class = "fa fa-remove"></i> Delete
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php include(SHARED_PATH . '/admin_footer.php') ?>