<?php require_once('../../../private/initialize.php');
	require_login();
?>

<?php $page_title = 'Manage Testimonials'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>

<header id = "main-header" class = "py-4 bg-success text-white">
	<div class = "container">
		<div class = "row">
			<div class = "col-md-8">
				<h3>
					<i class = "fa fa-comment-o"></i> Manage Testimonials</h3>
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

<!-- testimonialS -->
<?php $testimonials = find_all_testimonials(); ?>
<section id = "testimonials-and-activities">
	<div class = "container pt-4">
		<div class = "row">
			<div class = "col">
				<div class = "card">
					<div class = "card-header">
						<h4>All Testimonials</h4>
					</div>
					<div class = "table-responsive">
						<table class = "table table-striped">
							
							<thead class = "thead-dark">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Quote</th>
								<!-- <th>Date Posted</th> -->
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php while ($testimonial = mysqli_fetch_assoc($testimonials)) { ?>
								<tr>
									<td scope = "row">
										<?php echo h($testimonial['position']); ?>
									</td>
									<td>
										<?php echo h($testimonial['footer']); ?>
									</td>
									<td>
										<?php echo h($testimonial['quote']); ?>
									</td>
									<!-- <td>
                    <?php //echo h($testimonial['timestamp']); ?>
                  </td> -->
									<td>
										<a href = "<?php echo url_for('/admin/testimonials/edit.php?id=' . h(u($testimonial['id']))); ?>" class = "btn btn-secondary">
											<i class = "fa fa-angle-double-right"></i> Edit
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
	</div>
</section>
<?php mysqli_free_result($testimonials); ?>
<?php include(SHARED_PATH . '/admin_footer.php') ?>
