<?php
	$about_set = fetch_about();
	$about = mysqli_fetch_assoc($about_set);
	// mysqli_free_result($about_set);
?>

<!-- ADMIN MODAL -->
<div class = "modal fade" id = "editAboutModal">
	<div class = "modal-dialog modal-lg">
		<form action = "<?php echo url_for('/admin/about/update.php') ?>" method = "post">
			<div class = "modal-content">
				<div class = "modal-header bg-info text-white">
					<h5 class = "modal-title">Edit About Us Section</h5>
					<button class = "close" data-dismiss = "modal">
						<span>&times;</span>
					</button>
				</div>
				<div class = "modal-body">
					<!-- display errors -->
					<div class = "errors px-3">
						<?php if (this_form('submit_about')) { ?>
							<?php errors(); ?>
							<?php echo display_errors($errors); ?>
						<?php } ?>
					</div>
					
					<div class = "form-group">
						<label for = "head">Heading</label>
						<input type = "text" name = "head" class = "form-control" placeholder = "Heading" value = "<?php if (this_form('submit_about')) {
							echo $_SESSION['head'];
						} else {
							echo $about['head'];
						} ?>" required>
					</div>
					<div class = "form-group">
						<label for = "body">Body</label>
						<textarea class = "form-control" name = "body" placeholder = "About Us" rows = "8" required><?php if (this_form('submit_about')) {
								echo $_SESSION['body'];
							} else {
								echo $about['body'];
							} ?></textarea>
					</div>
					
					<div class = "row mt-2 mx-5 float-right">
						<div class = "form-check">
							<input type = "hidden" name = "visible" value = "0" />
							<input type = "checkbox" class = "form-check-input" name = "visible" id = "visibility-check" value = "1" <?php if (this_form('submit_about')) {
								if ($_SESSION['visible']) {
									echo 'checked';
								}
							} elseif ($about['visible']) {
								echo 'checked';
							}; ?> />
							<label class = "form-check-label" for = "visibility-check">Published</label>
						</div>
					</div>
				</div>
				<div class = "modal-footer">
					<button class = "btn btn-secondary" data-dismiss = "modal">Close</button>
					<button type = "submit" class = "btn btn-info" name = "submit_about">Save Changes</button>
				</div>
			</div>
		</form>
	</div>
</div>
