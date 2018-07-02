<?php require_once('../../../private/initialize.php');
	require_login();
?>

<?php $page_title = 'Manage Admins'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>

<header id = "main-header" class = "py-4 bg-warning text-white">
	<div class = "container">
		<div class = "row">
			<div class = "col-md-8">
				<h3>
					<i class = "fa fa-users"></i> Manage Admins</h3>
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
		</div>
	</div>
</section>

<!-- USERS -->
<section id = "posts">
	<div class = "container py-4">
		<div class = "row">
			<?php $admin_set = find_all_admins(); ?>
			<div class = "col">
				<div class = "card">
					<div class = "card-header">
						<h4>All Admins</h4>
					</div>
					<table class = "table table-striped">
						<thead class = "thead-dark">
						<tr>
							<th>#</th>
							<th>Username</th>
							<th>Email</th>
							<th></th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<?php $count = 0; ?>
						<?php while ($admin = mysqli_fetch_assoc($admin_set)) { ?>
							<?php $count++; ?>
							<tr>
								<td scope = "row">
									<?php echo h($count); ?>
								</td>
								<td>
									<?php echo h($admin['username']); ?>
								</td>
								<td>
									<?php echo h($admin['email']); ?>
								</td>
								<td>
									<a href = "<?php echo url_for('/admin/admins/password_change.php?id=' . h(u($admin['id']))); ?>" class = "btn btn-secondary <?php if ($admin['username'] != $_SESSION['user']) {
										echo "disabled";
									} ?>">
										<i class = "fa fa-angle-double-right"></i> Change Password
									</a>
								</td>
								<td>
									<a href = "<?php echo url_for('/admin/admins/delete.php?id=' . h(u($admin['id']))); ?>" class = "btn btn-danger btn-block  <?php if ($admin['id'] == 1 || $admin['username'] == $_SESSION['user']) {
										echo "disabled";
									} ?>">
										<i class = "fa fa-remove"></i> Delete
									</a>
								</td>
							</tr>
						<?php }; ?>
						</tbody>
					</table>
				
				</div>
			</div>
			<?php mysqli_free_result($admin_set); ?>
		</div>
	</div>
</section>

<?php include(SHARED_PATH . '/admin_footer.php') ?>
