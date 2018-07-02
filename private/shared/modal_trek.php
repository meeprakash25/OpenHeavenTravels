<?php
	$trek_set = find_all_treks();
	$trek = mysqli_fetch_assoc($trek_set);
	mysqli_free_result($trek_set);
	$trek_count = count_all_treks();
?>

<!-- ACTIVITY MODAL -->
<form action = "<?php echo url_for('/admin/treks/create.php') ?>" method = "post">
	<div class = "modal fade" id = "addTrekModal">
		<div class = "modal-dialog  modal-full my-auto">
			<div class = "modal-content">
				<div class = "modal-header bg-danger text-light">
					<h5 class = "modal-title">Add New Trek</h5>
					<button class = "close" data-dismiss = "modal">
						<span>&times;</span>
					</button>
				</div>
				<div class = "modal-body">
					
					<!-- display errors -->
					<div class = "errors px-3">
						<?php if (this_form('submit_trek')) { ?>
							<?php errors(); ?>
							<?php echo display_errors($errors); ?>
						<?php } ?>
					</div>
					
					<div class = "row m-0">
						<div class = "col-md-3">
							<div class = "card">
								<div class = "card-header bg-danger text-light">Facts of Trek</div>
								<div class = "card-body">
									<div class = "form-group">
										<select class = "form-control" name = "position">
											<option value = "Position" selected>Position</option>
											<?php
												if (this_form('submit_trek')) {
													for ($i = 1; $i <= $trek_count + 1; $i++) {
														echo "<option value=\"{$i}\"";
														if ($_SESSION['position'] == $i) {
															echo " selected";
														}
														echo ">{$i}</option>";
													}
												} else {
													for ($i = 1; $i <= $trek_count + 1; $i++) {
														echo "<option value=\"{$i}\">{$i}</option>";
													}
												}
											
											?>
										</select>
									</div>
									<div class = "form-group">
										<input type = "text" name = "trip_duration" class = "form-control" placeholder = "Trip Duration" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['trip_duration'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "trek_duration" class = "form-control" placeholder = "Duration of the Trek" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['trek_duration'];
										} ?>" required>
									</div>
									<div class = "form-group">
									<input type = "text" name = "start_end_place" class = "form-control" placeholder = "Start & End Place" value = "<?php if (this_form('submit_trek')) {
										echo $_SESSION['start_end_place'];
									} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "trek_name" class = "form-control" placeholder = "Name of Trek" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['trek_name'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "trek_type" class = "form-control" placeholder = "Trek Type" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['trek_type'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "trek_grade" class = "form-control" placeholder = "Trek Grade" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['trek_grade'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "seasons" class = "form-control" placeholder = "Best Seasons" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['seasons'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "group_size" class = "form-control" placeholder = "Group Size" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['group_size'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "altitude" class = "form-control" placeholder = "Max Altitude" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['altitude'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "walking_hours" class = "form-control" placeholder = "walking Hours" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['walking_hours'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "cost" class = "form-control" placeholder = "Cost" value = "<?php if (this_form('submit_trek')) {
											echo $_SESSION['cost'];
										} ?>" required>
									</div>
								</div>
							</div>
						</div>
						<div class = "col-md-9">
							<div class = "card">
								<div class = "card-header bg-danger text-light">Trek Details</div>
								<div class = "card-body">
									<nav>
										<div class = "nav nav-tabs bg-light" id = "trek-nav-tab" role = "tablist">
											<a class = "nav-item nav-link active" id = "nav-trek-overview-tab border-left" data-toggle = "tab" href = "#nav-trek-overview" role = "tab" aria-controls = "nav-trek-overview"
											   aria-selected = "true">Overview</a>
											<a class = "nav-item nav-link" id = "nav-trek-highlight-tab" data-toggle = "tab" href = "#nav-trek-highlight" role = "tab" aria-controls = "nav-trek-highlight"
											   aria-selected = "false">Highlights</a>
											<a class = "nav-item nav-link" id = "nav-trek-itinenarary-tab" data-toggle = "tab" href = "#nav-trek-itinenarary" role = "tab" aria-controls = "nav-trek-itinenarary"
											   aria-selected = "false">itinenarary</a>
											<a class = "nav-item nav-link" id = "nav-trek-cost-info-tab" data-toggle = "tab" href = "#nav-trek-cost-info" role = "tab" aria-controls = "nav-trek-cost-info"
											   aria-selected = "false">Cost Info</a>
											<a class = "nav-item nav-link" id = "nav-trek-equipment-tab" data-toggle = "tab" href = "#nav-trek-equipment" role = "tab" aria-controls = "nav-trek-equipment"
											   aria-selected = "false">equipments Check</a>
											<a class = "nav-item nav-link" id = "nav-trek-gallery-tab" data-toggle = "tab" href = "#nav-trek-gallery" role = "tab" aria-controls = "nav-trek-gallery"
											   aria-selected = "false">Gallery</a>
										</div>
									</nav>
									<div class = "tab-content mt-2 text-dark" id = "trek-nav-tabContent">
										<div class = "tab-pane fade show active" id = "nav-trek-overview" role = "tabpanel" aria-labelledby = "nav-trek-overview-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "overview" placeholder = "Overview" rows = "17" required><?php if (this_form('submit_trek')) {
														echo $_SESSION['overview'];
													} ?></textarea>
											</div>
										</div>
										<div class = "tab-pane fade" id = "nav-trek-itinenarary" role = "tabpanel" aria-labelledby = "nav-trek-itinenarary-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "itinenarary" placeholder = "itinenarary" rows = "17" required><?php if (this_form('submit_trek')) {
														echo $_SESSION['itinenarary'];
													} ?></textarea>
											</div>
										</div>
										<div class = "tab-pane fade" id = "nav-trek-cost-info" role = "tabpanel" aria-labelledby = "nav-trek-cost-info-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "cost_info" placeholder = "Cost Info" rows = "17" required><?php if (this_form('submit_trek')) {
														echo $_SESSION['cost_info'];
													} ?></textarea>
											</div>
										</div>
										<div class = "tab-pane fade" id = "nav-trek-equipment" role = "tabpanel" aria-labelledby = "nav-trek-equipment-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "equipments" placeholder = "equipments to Bring" rows = "17" required><?php if (this_form('submit_trek')) {
														echo $_SESSION['equipments'];
													} ?></textarea>
											</div>
										</div>
										<div class = "tab-pane fade" id = "nav-trek-highlight" role = "tabpanel" aria-labelledby = "nav-trek-highlight-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "highlights" placeholder = "Highlights of this Trek" rows = "17" required><?php if (this_form('submit_trek')) {
														echo $_SESSION['highlights'];
													} ?></textarea>
											</div>
										</div>
										<div class = "tab-pane fade" id = "nav-trek-gallery" role = "tabpanel" aria-labelledby = "nav-trek-gallery-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "gallery" placeholder = "Image links" rows = "17" required><?php if (this_form('submit_trek')) {
														echo $_SESSION['gallery'];
													} ?></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class = "row mt-2 mx-5 float-right">
						<div class = "form-check">
							<input type = "hidden" name = "visible" value = "0" />
							<input type = "checkbox" class = "form-check-input" name = "visible" id = "trek-visibility-check" value = "1" <?php if (this_form('submit_trek') && $_SESSION['visible'] == "1") {
								echo "checked";
							} ?>/>
							<label class = "form-check-label" for = "trek-visibility-check">Published</label>
						</div>
					</div>
				
				</div>
				
				<div class = "modal-footer pt-0">
					
					<button class = "btn btn-secondary" data-dismiss = "modal">Close</button>
					<button type = "submit" class = "btn btn-danger" name = "submit_trek">Add trek</button>
				
				</div>
			</div>
		</div>
	</div>
</form>
