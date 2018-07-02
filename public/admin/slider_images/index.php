<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php
	$image_set = find_all_images("slider_images");
	$image_path = "../../images/homepage_assets/slider_images";
?>
<?php $page_title = 'Slider Images'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>

<header id = "main-header" class = "py-4 bg-info text-white">
	<div class = "container">
		<div class = "row">
			<div class = "col-md-8">
				<h3>
					<i class = "fa fa-image"></i> Manage Slider Images</h3>
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

<!-- aboutS AND ACTIVITIES -->
<section id = "abouts-and-activities">
	<div class = "container pt-4">
		<div class = "row">
			<div class = "col">
				<div class = "card">
					<div class = "card-header">
						<h4>Slider Images</h4>
					</div>
					<div class = "table-responsive-md">
						<table class = "table table-hover">
							<thead class = "thead-dark">
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Caption</th>
								<th>Size</th>
								<th>Published</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($image_set as $image): ?>
								<tr>
									<td>
										<?php echo $image['position']; ?>
									</td>
									<td scope = "row">
										<img src = "<?php echo $image_path . "/" . $image['filename']; ?>"
										     class = "" width = "200" />
									</td>
									<td>
										<?php echo $image['caption']; ?>
									</td>
									<td>
										<?php echo size_as_text($image['size']); ?>
									</td>
									<td>
										<?php echo $image['visible'] ? "Yes" : "No"; ?>
									</td>
									<td>
										<a href = "<?php echo url_for('/admin/slider_images/edit.php?id=' . h(u($image['id']))); ?>"
										   class = "btn btn-secondary my-1">
											<i class = "fa fa-edit"></i> Edit
										</a>
										<a href = "<?php echo url_for('/admin/slider_images/delete.php?id=' . h(u($image['id']))); ?>"
										   class = "btn btn-danger my-1">
											<i class = "fa fa-remove"></i> Delete
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</section>
<?php include(SHARED_PATH . '/admin_footer.php') ?>
