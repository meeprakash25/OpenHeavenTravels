<?php
	require_once('../../../private/initialize.php');
	require_login();
	if (!isset($_GET['id'])) {
		redirect_to(url_for('/admin/tours/index.php'));
	}
	$id = $_GET['id'];
	
	if (is_post_request()) {
		$table_name = 'tours';
		$result = delete($table_name, $id);
		if ($result) {
			$_SESSION['info'] = "Tour deleted successfully";
			redirect_to(url_for('/admin/tours/index.php'));
		} else {
			$_SESSION['info'] = "Error deleting tour";
			redirect_to(url_for('/admin/tours/delete.php'));
		}
	} else {
		$tour = find_tour_by_id($id);
	}

?>

<?php $page_title = 'Delete Tour'; ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>
	
	<header id = "main-header" class = "py-4 bg-primary text-white">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-8">
					<h3>
						Delete Tour
						<?php echo h($tour['tour_name']) ?>
					</h3>
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
	<section id = "action" class = "py-4 mb-4 bg-light">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-3 mr-auto">
					<a href = "<?php echo url_for('/admin/index.php'); ?>" class = "btn btn-light btn-block">
						<i class = "fa fa-arrow-left"></i> Back To Dashboard
					</a>
				</div>
				<div class = "col-md-3">
					<!-- <a href="<?php //echo url_for('/admin/tours/show.php?id=' . $id); ?>" class="btn btn-success btn-block">
            <i class="fa fa-arrow-left"></i> Cancel
          </a> -->
				</div>
				<div class = "col-md-3">
					<!-- <a href="<?php //echo url_for('/admin/tours/delete.php'); ?>" class="btn btn-danger btn-block">
            <i class="fa fa-remove"></i> Delete Tour
          </a> -->
				</div>
			</div>
		</div>
	</section>
	
	<div class = "container">
		<div class = "row">
			<div class = "col-md-12">
				<div class = "card">
					<div class = "card-header main-color-bg">Delete tour</div>
					<div class = "card-body">
						<h5>Are you sure you want to delete tour:
							<strong>
								<?php echo h($tour['tour_name']); ?>
							</strong> ?</h5>
						<br>
						<br>
						<form action = "<?php echo url_for('/admin/tours/delete.php?id=' . h(u($tour['id']))); ?>" method = "post">
							<div class = "row justify-content-end">
								<div class = "col-md-3">
									<a class = "btn btn-secondary btn-block m-2" href = "<?php echo url_for('/admin/tours/index.php'); ?>">Cancel</a>
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