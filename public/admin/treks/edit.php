<?php require_once('../../../private/initialize.php');
	require_login();
?>

<?php
	if (!isset($_GET['id'])) {
		redirect_to(url_for('/admin/treks/index.php'));
	}
	$id = $_GET['id'];
	if (is_post_request()) {
		$table_name = 'treks';
		
		//process form request
		$trek = [];
		$trek['id'] = $id;
		$trek['position'] = $_POST['position'] ?? '';
		$trek['visible'] = $_POST['visible'] ?? '';
		$trek['trip_duration'] = $_POST['trip_duration'] ?? '';
		$trek['trek_duration'] = $_POST['trek_duration'] ?? '';
		$trek['start_end_place'] = $_POST['start_end_place'] ?? '';
		$trek['trek_name'] = $_POST['trek_name'] ?? '';
		$trek['trek_type'] = $_POST['trek_type'] ?? '';
		$trek['trek_grade'] = $_POST['trek_grade'] ?? '';
		$trek['seasons'] = $_POST['seasons'] ?? '';
		$trek['group_size'] = $_POST['group_size'] ?? '';
		$trek['altitude'] = $_POST['altitude'] ?? '';
		$trek['highlights'] = $_POST['highlights'] ?? '';
		$trek['walking_hours'] = $_POST['walking_hours'] ?? '';
		$trek['cost'] = $_POST['cost'] ?? '';
		$trek['overview'] = $_POST['overview'] ?? '';
		$trek['itinenarary'] = $_POST['itinenarary'] ?? '';
		$trek['cost_info'] = $_POST['cost_info'] ?? '';
		$trek['equipments'] = $_POST['equipments'] ?? '';
		$trek['gallery'] = $_POST['gallery'] ?? '';
		
		$result = update($table_name, $trek);
		if ($result === true) {
			$_SESSION['info'] = "Trek updated successfully";
			redirect_to(url_for('/admin/treks/edit.php?id=' . h(u($id))));
		} else {
			// $errors = $result;
			// var_dump($errors);
			// reload the page with errors
		}
	} else {
		$trek = find_trek_by_id($id);
	}
	$trek_count = count_all_treks();
?>

<?php $page_title = 'Edit Trek'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>
	
	<header id = "main-header" class = "py-4 bg-danger text-white">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-8">
					<h3> Edit Trek
						<?php echo h($trek['trek_name']); ?>
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
				<div class = "col-md-3 pt-2 mr-auto">
					<a href = "<?php echo url_for('/admin/index.php'); ?>" class = "btn btn-light btn-block">
						<i class = "fa fa-arrow-left"></i> Back To Dashboard
					</a>
				</div>
				<div class = "col-md-3 pt-2">
					<a href = "<?php echo url_for('/admin/treks/show.php?id=' . h(u($id))); ?>" class = "btn btn-success btn-block">
						<i class = "fa fa-arrow-left"></i> Go Back
					</a>
				</div>
				<div class = "col-md-3 pt-2">
					<a href = "<?php echo url_for('/pages/trek.php?id=' . h(u($id)) . '&preview=true'); ?>" class = "btn btn-info btn-block" target = "_blank">
						<i class = "fa fa-arrow-right"></i> Preview
					</a>
				</div>
				<div class = "col-md-3 pt-2">
					<a href = "<?php echo url_for('/admin/treks/delete.php'); ?>" class = "btn btn-danger btn-block">
						<i class = "fa fa-remove"></i> Delete Trek
					</a>
				</div>
			</div>
		</div>
	</section>
	
	<!-- treks -->
	<!-- display errors -->
	<div class = "container">
		<?php echo display_errors($errors); ?>
	</div>
	<form action = "<?php echo url_for('/admin/treks/edit.php?id=' . h(u($id))); ?>" method = "post">
		<div class = "row m-0">
			<div class = "col-md-4 pb-3">
				<div class = "card">
					<div class = "card-header bg-dark text-light">Facts of Trek</div>
					<div class = "card-body">
						<div class = "form-group">
							<label for = "position">Position</label>
							<select class = "form-control" name = "position" id = "position" required>
								<?php
									for ($i = 1; $i <= $trek_count; $i++) {
										echo "<option value=\"{$i}\"";
										if ($trek['position'] == $i) {
											echo " selected";
										}
										echo ">{$i}</option>";
									}
								?>
							</select>
						</div>
						<div class = "form-group">
							<label for = "trip_duration">Trip Duration</label>
							<input type = "text" name = "trip_duration" class = "form-control" id = "trip_duration" value = "<?php echo h($trek['trip_duration']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "trek-duration">Duration of Trek</label>
							<input type = "text" name = "trek_duration" class = "form-control" id = "trek-duration" value = "<?php echo h($trek['trek_duration']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "trek-name">Trek Name</label>
							<input type = "text" name = "trek_name" class = "form-control" id = "trek-name" value = "<?php echo h($trek['trek_name']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "start_end_place">Trek Start and End Place</label>
							<input type = "text" name = "start_end_place" class = "form-control" id = "start_end_place" value = "<?php echo h($trek['start_end_place']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "trek-type">Trek Type</label>
							<input type = "text" name = "trek_type" class = "form-control" id = "trek-type" value = "<?php echo h($trek['trek_type']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "trek-grade">Trek Grade</label>
							<input type = "text" name = "trek_grade" class = "form-control" id = "trek-grade" value = "<?php echo h($trek['trek_grade']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "seasons">Seasons</label>
							<input type = "text" name = "seasons" class = "form-control" id = "seasons" value = "<?php echo h($trek['seasons']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "group-size">Group Size</label>
							<input type = "text" name = "group_size" class = "form-control" id = "group-size" value = "<?php echo h($trek['group_size']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "altitude">Altitude</label>
							<input type = "text" name = "altitude" class = "form-control" id = "altitude" value = "<?php echo h($trek['altitude']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "walking_hours">Walking Hours</label>
							<input type = "text" name = "walking_hours" class = "form-control" id = "walking_hours" value = "<?php echo h($trek['walking_hours']); ?>" required>
						</div>
						<div class = "form-group">
							<label for = "cost">Cost</label>
							<input type = "text" name = "cost" class = "form-control" id = "cost" value = "<?php echo h($trek['cost']); ?>" required>
						</div>
					
					</div>
				</div>
			</div>
			<div class = "col-md-8">
				<div class = "card">
					<div class = "card-header bg-dark text-light">Trek Details</div>
					<div class = "card-body">
						<nav>
							<div class = "nav nav-tabs bg-light" id = "nav-tab" role = "tablist">
								<a class = "nav-item nav-link active" id = "nav-overview-tab border-left" data-toggle = "tab" href = "#nav-overview" role = "tab" aria-controls = "nav-overview"
								   aria-selected = "true">Overview</a>
								<a class = "nav-item nav-link" id = "nav-highlight-tab" data-toggle = "tab" href = "#nav-highlight" role = "tab" aria-controls = "nav-highlight"
								   aria-selected = "true">Highlights</a>
								<a class = "nav-item nav-link" id = "nav-itinenarary-tab" data-toggle = "tab" href = "#nav-itinenarary" role = "tab" aria-controls = "nav-itinenarary"
								   aria-selected = "false">itinenarary</a>
								<a class = "nav-item nav-link" id = "nav-cost-info-tab" data-toggle = "tab" href = "#nav-cost-info" role = "tab" aria-controls = "nav-cost-info"
								   aria-selected = "false">Cost Info</a>
								<a class = "nav-item nav-link" id = "nav-equipment-tab" data-toggle = "tab" href = "#nav-equipment" role = "tab" aria-controls = "nav-equipment"
								   aria-selected = "false">equipments Check</a>
								<a class = "nav-item nav-link" id = "nav-gallery-tab" data-toggle = "tab" href = "#nav-gallery" role = "tab" aria-controls = "nav-gallery"
								   aria-selected = "false">Gallery</a>
							</div>
						</nav>
						<div class = "tab-content mt-2 text-dark" id = "nav-tabContent">
							<div class = "tab-pane fade show active" id = "nav-overview" role = "tabpanel" aria-labelledby = "nav-overview-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "overview" placeholder = "Overview" rows = "36" required><?php echo h($trek['overview']); ?></textarea>
								</div>
							</div>
							<div class = "tab-pane fade" id = "nav-highlight" role = "tabpanel" aria-labelledby = "nav-highlight-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "highlights" placeholder = "Highlights of the Trek" rows = "36" required><?php echo h($trek['highlights']); ?></textarea>
								</div>
							</div>
							<div class = "tab-pane fade" id = "nav-itinenarary" role = "tabpanel" aria-labelledby = "nav-itinenarary-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "itinenarary" placeholder = "itinenarary" rows = "36" required><?php echo h($trek['itinenarary']); ?></textarea>
								</div>
							</div>
							<div class = "tab-pane fade" id = "nav-cost-info" role = "tabpanel" aria-labelledby = "nav-cost-info-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "cost_info" placeholder = "Cost Info" rows = "36" required><?php echo h($trek['cost_info']); ?></textarea>
								</div>
							</div>
							<div class = "tab-pane fade" id = "nav-equipment" role = "tabpanel" aria-labelledby = "nav-equipment-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "equipments" placeholder = "equipments Check" rows = "36" required><?php echo h($trek['equipments']); ?></textarea>
								</div>
							</div>
							<div class = "tab-pane fade" id = "nav-gallery" role = "tabpanel" aria-labelledby = "nav-gallery-tab">
								<div class = "form-group">
									<textarea class = "form-control" name = "gallery" placeholder = "Image links" rows = "36" required><?php echo h($trek['gallery']); ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class = "row mt-3 mx-5 float-right">
					<div class = "form-check">
						<input type = "hidden" name = "visible" value = "0" />
						<input type = "checkbox" class = "form-check-input" name = "visible" id = "visibility-check" value = "1" <?php if ($trek['visible'] == "1") {
							echo "checked";
						}; ?> />
						<label class = "form-check-label" for = "visibility-check">Published</label>
					</div>
					
					<button type = "submit" class = "btn btn-success btn-block mt-3" name = "edit_trek">
						<i class = "fa fa-check"></i> Save Changes
					</button>
				</div>
			
			</div>
		</div>
	
	</form>

<?php include(SHARED_PATH . '/admin_footer.php') ?>