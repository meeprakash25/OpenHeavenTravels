<?php require_once('../../../private/initialize.php');
	require_login();
?>

<?php
	if (!isset($_GET['id'])) {
		redirect_to(url_for('/admin/tours/index.php'));
	}
	$id = $_GET['id'];
	if (is_post_request()) {
		$table_name = 'tours';
		
		//process form request
		$tour = [];
		$tour['id'] = $id;
		$tour['position'] = $_POST['position'] ?? '';
		$tour['visible'] = $_POST['visible'] ?? '';
		$tour['destination'] = $_POST['destination'] ?? '';
		$tour['tour_name'] = $_POST['tour_name'] ?? '';
		$tour['activities'] = $_POST['activities'] ?? '';
		$tour['tour_duration'] = $_POST['tour_duration'] ?? '';
		$tour['tour_grade'] = $_POST['tour_grade'] ?? '';
		$tour['seasons'] = $_POST['seasons'] ?? '';
		$tour['group_size'] = $_POST['group_size'] ?? '';
		$tour['altitude'] = $_POST['altitude'] ?? '';
		$tour['accommodation'] = $_POST['accommodation'] ?? '';
		$tour['transport'] = $_POST['transport'] ?? '';
		$tour['overview'] = $_POST['overview'] ?? '';
		$tour['itinenarary'] = $_POST['itinenarary'] ?? '';
		$tour['cost_info'] = $_POST['cost_info'] ?? '';
		$tour['gallery'] = $_POST['gallery'] ?? '';
		
		$result = update($table_name, $tour);
		if ($result === true) {
			$_SESSION['info'] = "Tour updated successfully";
			redirect_to(url_for('/admin/tours/edit.php?id=' . h(u($id))));
		} else {
			// $errors = $result;
			// var_dump($errors);
			// reload the page with errors
		}
	} else {
		$tour = find_tour_by_id($id);
	}
	$tour_count = count_all_tours();
?>

<?php $page_title = 'Edit Tour'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>
	
	<header id = "main-header" class = "py-4 bg-primary text-white">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-8">
					<h3> Edit Tour
						<?php echo h($tour['tour_name']); ?>
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
				<div class = "col-md-3 mr-auto pt-2">
					<a href = "<?php echo url_for('/admin/index.php'); ?>" class = "btn btn-light btn-block">
						<i class = "fa fa-arrow-left"></i> Back To Dashboard
					</a>
				</div>
				<div class = "col-md-3 pt-2">
					<a href = "<?php echo url_for('/admin/tours/show.php?id=' . h(u($id))); ?>" class = "btn btn-success btn-block">
						<i class = "fa fa-arrow-left"></i> Go Back
					</a>
				</div>
				<div class = "col-md-3 pt-2">
					<a href = "<?php echo url_for('/pages/tour.php?id=' . h(u($id)) . '&preview=true'); ?>" class = "btn btn-info btn-block" target = "_blank">
						<i class = "fa fa-arrow-right"></i> Preview
					</a>
				</div>
				<div class = "col-md-3 pt-2">
					<a href = "<?php echo url_for('/admin/tours/delete.php'); ?>" class = "btn btn-danger btn-block">
						<i class = "fa fa-remove"></i> Delete Tour
					</a>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Tours -->
	<!-- display errors -->
	<div class = "container">
		<?php echo display_errors($errors); ?>
	</div>
	<form action = "<?php echo url_for('/admin/tours/edit.php?id=' . h(u($id))); ?>" method = "post">
		<div class = "row m-0">
			<div class = "col-md-4">
				<div class = "card">
					<div class = "card-header bg-dark text-light">Facts of Tour</div>
					<div class = "card-body">
						<div class = "form-group">
							<label for = "position" required>Position</label>
							<select class = "form-control" name = "position" id = "position">
								<?php
									for ($i = 1; $i <= $tour_count; $i++) {
										echo "<option value=\"{$i}\"";
										if ($tour['position'] == $i) {
											echo " selected";
										}
										echo ">{$i}</option>";
									}
								?>
							</select>
						</div>
						<div class = "form-group">
							<label for = "destination">Destination</label>
							<input type = "text" name = "destination" class = "form-control" id = "destination" value = "<?php echo h($tour['destination']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "tour-name">Tour Name</label>
							<input type = "text" name = "tour_name" class = "form-control" id = "tour-name" value = "<?php echo h($tour['tour_name']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "activities">Activities</label>
							<input type = "text" name = "activities" class = "form-control" id = "activities" value = "<?php echo h($tour['activities']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "tour-duration">Tour Duration</label>
							<input type = "text" name = "tour_duration" class = "form-control" id = "tour-duration" value = "<?php echo h($tour['tour_duration']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "tour-grade">Tour Grade</label>
							<input type = "text" name = "tour_grade" class = "form-control" id = "tour-grade" value = "<?php echo h($tour['tour_grade']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "seasons">Seasons</label>
							<input type = "text" name = "seasons" class = "form-control" id = "seasons" value = "<?php echo h($tour['seasons']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "group-size">Group Size</label>
							<input type = "text" name = "group_size" class = "form-control" id = "group-size" value = "<?php echo h($tour['group_size']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "altitude">Altitude</label>
							<input type = "text" name = "altitude" class = "form-control" id = "altitude" value = "<?php echo h($tour['altitude']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "accommodation">accommodation</label>
							<input type = "text" name = "accommodation" class = "form-control" id = "accommodation" value = "<?php echo h($tour['accommodation']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "transport">Transport</label>
							<input type = "text" name = "transport" class = "form-control" id = "transport" value = "<?php echo h($tour['transport']); ?>" required>
						</div>
					
					</div>
				</div>
			</div>
			<div class = "col-md-8">
				<div class = "card">
					<div class = "card-header bg-dark text-light">Tour Details</div>
					<div class = "card-body">
						<nav>
							<div class = "nav nav-tabs bg-light" id = "nav-tab" role = "tablist">
								<a class = "nav-item nav-link active" id = "nav-overview-tab border-left" data-toggle = "tab" href = "#nav-overview" role = "tab" aria-controls = "nav-overview"
								   aria-selected = "true">Overview</a>
								<a class = "nav-item nav-link" id = "nav-itinenarary-tab" data-toggle = "tab" href = "#nav-itinenarary" role = "tab" aria-controls = "nav-itinenarary"
								   aria-selected = "false">itinenarary</a>
								<a class = "nav-item nav-link" id = "nav-cost-info-tab" data-toggle = "tab" href = "#nav-cost-info" role = "tab" aria-controls = "nav-cost-info"
								   aria-selected = "false">Cost Info</a>
								<a class = "nav-item nav-link" id = "nav-gallery-tab" data-toggle = "tab" href = "#nav-gallery" role = "tab" aria-controls = "nav-gallery"
								   aria-selected = "false">Gallery</a>
							</div>
						</nav>
						<div class = "tab-content mt-2 text-dark" id = "nav-tabContent">
							<div class = "tab-pane fade show active" id = "nav-overview" role = "tabpanel" aria-labelledby = "nav-overview-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "overview" placeholder = "Overview" rows = "36" required><?php echo h($tour['overview']); ?></textarea>
								</div>
							</div>
							<div class = "tab-pane fade" id = "nav-itinenarary" role = "tabpanel" aria-labelledby = "nav-itinenarary-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "itinenarary" placeholder = "itinenarary" rows = "36" required><?php echo h($tour['itinenarary']); ?></textarea>
								</div>
							</div>
							<div class = "tab-pane fade" id = "nav-cost-info" role = "tabpanel" aria-labelledby = "nav-cost-info-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "cost_info" placeholder = "Cost Info" rows = "36" required><?php echo h($tour['cost_info']); ?></textarea>
								</div>
							</div>
							<div class = "tab-pane fade" id = "nav-gallery" role = "tabpanel" aria-labelledby = "nav-gallery-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "gallery" placeholder = "Image links" rows = "36" required><?php echo h($tour['gallery']); ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class = "row mt-3 mx-5 float-right">
					<div class = "form-check">
						<input type = "hidden" name = "visible" value = "0" />
						<input type = "checkbox" class = "form-check-input" name = "visible" id = "visibility-check" value = "1" <?php if ($tour['visible'] == "1") {
							echo "checked";
						}; ?> />
						<label class = "form-check-label" for = "visibility-check">Published</label>
					</div>
					
					<button type = "submit" class = "btn btn-success btn-block mt-3" name = "edit_tour">
						<i class = "fa fa-check"></i> Save Changes
					</button>
				</div>
			
			</div>
		</div>
	
	</form>

<?php include(SHARED_PATH . '/admin_footer.php') ?>