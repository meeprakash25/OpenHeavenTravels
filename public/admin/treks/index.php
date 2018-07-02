<?php require_once('../../../private/initialize.php');
	require_login();
?>

<?php $page_title = 'Manage Treks';

?>

<?php include(SHARED_PATH . '/admin_header.php') ?>
	
	<header id = "main-header" class = "py-4 bg-danger text-white">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-8">
					<h3>
						<i class = "fa fa-hand-o-right"></i> Manage Treks</h3>
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
	
	<!-- TREKS -->
<?php $treks = find_all_treks(); ?>
	<section id = "treks-and-activities">
		<div class = "container pt-4">
			<div class = "row">
				<div class = "col">
					<div class = "card">
						<div class = "card-header">
							<h4>All Treks</h4>
						</div>
						<table class = "table table-striped">
							
							<thead class = "thead-dark">
							<tr>
								<th>#</th>
								<th>Treks</th>
								<th>Grade</th>
								<th>Date Posted</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php while ($trek = mysqli_fetch_assoc($treks)) { ?>
								<tr>
									<td scope = "row">
										<?php echo h($trek['position']); ?>
									</td>
									<td>
										<?php echo h($trek['trek_name']); ?>
									</td>
									<td>
										<?php echo h($trek['trek_grade']); ?>
									</td>
									<td>
										<?php echo h($trek['timestamp']); ?>
									</td>
									<td>
										<a href = "<?php echo url_for('/admin/treks/show.php?id=' . h(u($trek['id']))); ?>" class = "btn btn-secondary">
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
<?php mysqli_free_result($treks); ?>
<?php include(SHARED_PATH . '/admin_footer.php') ?>