<?php
	require_once('../../../private/initialize.php');
	require_login();
	if (!isset($_GET['id'])) {
		redirect_to(url_for('/admin/admins/index.php'));
	}
	$id = $_GET['id'];
	$admin = find_admin_by_id($id);
	if ($admin['id'] == 1 || $admin['username'] == $_SESSION['user']) {
		redirect_to(url_for('/admin/admins/index.php'));
	}
	if (is_post_request()) {
		$result = delete_admin($id);
		$_SESSION['info'] = "Admin deleted successfully";
		redirect_to(url_for('/admin/admins/index.php'));
	} else {
		//
	}

?>

<?php $admin_title = 'Delete Admin'; ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>
	
	<header id = "main-header" class = "py-4 bg-danger text-white">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-8">
					<h3>
						Delete admin
						<?php echo h($admin['username']) ?>
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
					<a href = "<?php echo url_for('/admin/index.php'); ?>" class = "btn btn-light btn-block">
						<i class = "fa fa-arrow-left"></i> Back To Dashboard
					</a>
				</div>
				<div class = "col-md-3">
					<!-- <a href="<?php //echo url_for('/admin/admins/show.php?id=' . $id); ?>" class="btn btn-success btn-block">
            <i class="fa fa-arrow-left"></i> Cancel
          </a> -->
				</div>
				<div class = "col-md-3">
					<!-- <a href="<?php //echo url_for('/admin/admins/delete.php'); ?>" class="btn btn-danger btn-block">
            <i class="fa fa-remove"></i> Delete admin
          </a> -->
				</div>
			</div>
		</div>
	</section>
	
	<div class = "container">
		<div class = "row">
			<div class = "col-md-12">
				<div class = "card">
					<div class = "card-header bg-danger text-light">Delete admin</div>
					<div class = "card-body">
						<h5>Are you sure you want to delete Admin:
							<strong>
								<?php echo h($admin['username']); ?>
							</strong> ?</h5>
						<br>
						<br>
						<form action = "<?php echo url_for('/admin/admins/delete.php?id=' . h(u($admin['id']))); ?>" method = "post">
							<div class = "row justify-content-end">
								<div class = "col-md-3">
									<a class = "btn btn-secondary btn-block m-2" href = "<?php echo url_for('/admin/admins/index.php'); ?>">Cancel</a>
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