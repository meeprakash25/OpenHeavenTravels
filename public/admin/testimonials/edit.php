<?php require_once('../../../private/initialize.php');
	require_login();
?>

<?php
	if (!isset($_GET['id'])) {
		redirect_to(url_for('/admin/testimonials/index.php'));
	}
	$id = $_GET['id'];
	if (is_post_request()) {
		//process form request
		$testimonial = [];
		$testimonial['id'] = $id;
		$testimonial['position'] = $_POST['position'] ?? '';
		$testimonial['visible'] = $_POST['visible'] ?? '';
		$testimonial['quote'] = $_POST['quote'] ?? '';
		$testimonial['footer'] = $_POST['footer'] ?? '';
		$result = update_testimonial($testimonial);
		if ($result === true) {
			$_SESSION['info'] = "Testimonial updated successfully";
			redirect_to(url_for('/admin/testimonials/edit.php?id=' . h(u($id))));
		} else {
			// $errors = $result;
			// var_dump($errors);
			// reload the page with errors
		}
	} else {
		$testimonial = find_testimonial_by_id($id);
	}
	$testimonial_count = count_all_testimonials();
?>

<?php $page_title = 'Edit Testimonial'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>
	
	<header id = "main-header" class = "py-4 bg-success text-white">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-8">
					<h3> Edit testimonial</h3>
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
					<a href = "<?php echo url_for('/admin/testimonials/index.php'); ?>" class = "btn btn-success btn-block">
						<i class = "fa fa-arrow-left"></i> Go Back
					</a>
				</div>
				<div class = "col-md-3 pt-2">
					<a href = "<?php echo url_for('/index.php?preview=true' . '#testimonials'); ?>" class = "btn btn-info btn-block" target = "_blank">
						<i class = "fa fa-arrow-right"></i> Preview
					</a>
				</div>
				<div class = "col-md-3 pt-2">
					<a href = "<?php echo url_for('/admin/testimonials/delete.php?id=' . h(u($id))); ?>" class = "btn btn-danger btn-block">
						<i class = "fa fa-remove"></i> Delete testimonial
					</a>
				</div>
			</div>
		</div>
	</section>
	
	<!-- testimonials -->
	<!-- display errors -->
	<div class = "container">
		<?php echo display_errors($errors); ?>
		<form action = "<?php echo url_for('/admin/testimonials/edit.php?id=' . h(u($id))); ?>" method = "post">
			<div class = "row">
				<div class = "col-md-12">
					<div class = "card">
						<div class = "card-header bg-dark text-light">Edit Testimonial</div>
						<div class = "card-body">
							<div class = "form-group">
								<select class = "form-control" name = "position" required>
									<?php
										for ($i = 1; $i <= $testimonial_count; $i++) {
											echo "<option value=\"{$i}\"";
											if ($testimonial['position'] == $i) {
												echo " selected";
											}
											echo ">{$i}</option>";
										}
									?>
								</select>
							</div>
							<div class = "form-group">
								<label for = "footer">Name</label>
								<input type = "text" name = "footer" class = "form-control" id = "footer" value = "<?php echo h($testimonial['footer']); ?>" required>
							</div>
							<div class = "form-group">
								<label for = "quote">Quote</label>
								<textarea class = "form-control" name = "quote" id = "footer" placeholder = "Quote" rows = "5" required><?php echo h($testimonial['quote']); ?></textarea>
							</div>
						
						</div>
					</div>
					
					<div class = "row mt-2 mx-5 float-right">
						<div class = "form-check">
							<input type = "hidden" name = "visible" value = "0" />
							<input type = "checkbox" class = "form-check-input" name = "visible" id = "visibility-check" value = "1" <?php if ($testimonial['visible'] == "1") {
								echo "checked";
							}; ?> />
							<label class = "form-check-label" for = "visibility-check">Published</label>
						</div>
						
						<button type = "submit" class = "btn btn-success btn-block mt-3" name = "edit_testinomial">
							<i class = "fa fa-check"></i> Save Changes
						</button>
					</div>
				
				</div>
			</div>
	</div>
	</form>

<?php include(SHARED_PATH . '/admin_footer.php') ?>