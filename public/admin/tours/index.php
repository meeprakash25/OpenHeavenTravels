<?php require_once('../../../private/initialize.php');
	require_login();
?>

<?php $page_title = 'Manage Tours'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>
	
	<header id = "main-header" class = "py-4 bg-primary text-white">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-8">
					<h3>
						<i class = "fa fa-hand-o-right"></i> Manage Tours</h3>
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
	
	<!-- TOURS AND ACTIVITIES -->
<?php $tours = find_all_tours(); ?>
	<section id = "tours-and-activities">
		<div class = "container pt-4">
			<div class = "row">
				<div class = "col">
					<div class = "card">
						<div class = "card-header">
							<h4>All Tours</h4>
						</div>
						<table class = "table table-striped">
							
							<thead class = "thead-dark">
							<tr>
								<th>#</th>
								<th>Tours</th>
								<th>Activities</th>
								<th>Date Posted</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php while ($tour = mysqli_fetch_assoc($tours)) { ?>
								<tr>
									<td scope = "row">
										<?php echo h($tour['position']); ?>
									</td>
									<td>
										<?php echo h($tour['tour_name']); ?>
									</td>
									<td>
										<?php echo h($tour['activities']); ?>
									</td>
									<td>
										<?php echo h($tour['timestamp']); ?>
									</td>
									<td>
										<a href = "<?php echo url_for('/admin/tours/show.php?id=' . h(u($tour['id']))); ?>" class = "btn btn-secondary">
											<i class = "fa fa-angle-double-right"></i> Details
										</a>
									</td>
								</tr>
							
							<?php } // end of while fact ?>
							</tbody>
						</table>
					
					</div>
				</div>
			</div>
		</div>
	</section>
<?php mysqli_free_result($tours); ?>
<?php include(SHARED_PATH . '/admin_footer.php') ?>