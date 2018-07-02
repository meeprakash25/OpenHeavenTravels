<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php
	
	
	if (!isset($_GET['id'])) {
		redirect_to(url_for('/admin/slider_images/index.php'));
	}
	$id = $_GET['id'];
	$current_image = find_image_by_id("slider_images", $id);
	if (is_post_request()) {
		$table_name = 'slider_images';
		//process form request
		$image = [];
		$image['id'] = $id;
		$image['position'] = $_POST['position'] ?? '';
		$image['visible'] = $_POST['visible'] ?? '';
		$image['caption'] = $_POST['caption'] ?? '';
		$image['filename'] = $current_image['filename'] ?? '';
		$image['size'] = $current_image['size'] ?? '';
		$image['type'] = $current_image['type'] ?? '';
		
		//		on edit we are not moving image file so mo need for target_dir
		
		$result = update($table_name, $image);
		if ($result === true) {
			$_SESSION['info'] = "Image updated successfully";
			redirect_to(url_for('/admin/slider_images/edit.php?id=' . h(u($id))));
		} else {
			// $errors = $result;
			// var_dump($errors);
			// reload the page with errors
		}
	} else {
		//
		$image = $current_image;
	}
	$image_count = count_all_images("slider_images");
	// echo $image_count;
	// $image_set = find_all_images();
	$image_path = "../../images/homepage_assets/slider_images";
?>

<?php $page_title = 'Slider Images'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>

<header id = "main-header" class = "py-4 bg-info text-white">
	<div class = "container">
		<div class = "row">
			<div class = "col-md-8">
				<h3>
					<i class = "fa fa-pencil"></i> Edit Slider Images</h3>
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
			<div class = "col-md-3 mr-auto pt-2">
				<a href = "<?php echo url_for('/admin/index.php'); ?>" class = "btn btn-light btn-block">
					<i class = "fa fa-arrow-left"></i> Back To Dashboard
				</a>
			</div>
			<div class = "col-md-3 pt-2">
				<a href = "<?php echo url_for('/admin/slider_images/index.php'); ?>" class = "btn btn-success btn-block">
					<i class = "fa fa-arrow-left"></i> Go Back
				</a>
			</div>
			<div class = "col-md-3 pt-2">
				<a href = "<?php echo url_for('/index.php?preview=true'); ?>" class = "btn btn-info btn-block" target = "_blank">
					<i class = "fa fa-arrow-right"></i> Preview
				</a>
			</div>
			<div class = "col-md-3 pt-2">
				<a href = "<?php echo url_for('/admin/slider_images/delete.php?id=' . h(u($id))); ?>" class = "btn btn-danger btn-block">
					<i class = "fa fa-remove"></i> Delete Image
				</a>
			</div>
		</div>
	</div>
</section>

<!-- Edit image -->
<section id = "abouts-and-activities">
	<div class = "container pt-4">
		<div class = "row">
			<div class = "col">
				<form action = "<?php echo url_for('/admin/slider_images/edit.php?id=' . h(u($id))); ?>" method = "post">
					<div class = "card">
						<div class = "card-header">
							<h4>Edit Image</h4>
						</div>
						<!-- display errors -->
						<div class = "errors px-3">
							<?php if ((isset($_SESSION['form'])) && ($_SESSION['form'] === 'submit_image')) { ?>
								<?php errors(); ?>
								<?php echo display_errors($errors); ?>
							<?php } ?>
						</div>
						<div class = "card-body">
							<div class = "row">
								<div class = "col-lg-5">
									<img src = "<?php echo $image_path . "/" . h($image['filename']); ?>" class = "mx-auto d-block img-fluid" width = "400" alt = "<?php echo h($image['caption']); ?>">
								</div>
								<div class = "col-lg-7 py-3">
									
									<div class="errors">
										<?php errors(); ?>
										<?php echo display_errors($errors); ?>
									</div>
									<div class = "form-group">
										<select class = "form-control" name = "position" required>
											<option value = "Position">Position</option>
											<?php
												for ($i = 1; $i <= $image_count; $i++) {
													echo "<option value=\"{$i}\"";
													if ($image['position'] == $i) {
														echo " selected";
													}
													echo ">{$i}</option>";
												}
											?>
										</select>
									</div>
									<div class = "form-group">
										<input type = "text" name = "caption" class = "form-control" placeholder = "Caption" value = "<?php echo h($image['caption']); ?>" required />
									</div>
									
									<div class = "row ml-0">
										<div class = "form-check">
											<input type = "hidden" name = "visible" value = "0" />
											<input type = "checkbox" class = "form-check-input" name = "visible" id = "visibility-check" value = "1" <?php if ($image['visible'] == "1") {
												echo "checked";
											}; ?> />
											<label class = "form-check-label" for = "visibility-check">Published</label>
										</div>
									
									</div>
									<div class = "row float-right mt-2 mx-2">
										<button type = "submit" class = "btn btn-info m-2" name = "submit_image">Save</button>
									</div>
								</div>
							
							
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section>
<?php include(SHARED_PATH . '/admin_footer.php') ?>
