<?php
	$tour_set = find_all_tours();
	$tour = mysqli_fetch_assoc($tour_set);
	mysqli_free_result($tour_set);
	$tour_count = count_all_tours();
?>

<!-- ACTIVITY MODAL -->
<form action = "<?php echo url_for('/admin/tours/create.php') ?>" method = "post">
	<div class = "modal fade" id = "addTourModal">
		<div class = "modal-dialog  modal-full my-auto">
			<div class = "modal-content">
				<div class = "modal-header bg-primary text-light">
					<h5 class = "modal-title">Add New Tour</h5>
					<button class = "close" data-dismiss = "modal">
						<span>&times;</span>
					</button>
				</div>
				<div class = "modal-body">
					
					<!-- display errors -->
					<div class = "errors px-3">
						<?php if (this_form('submit_tour')) { ?>
							<?php errors(); ?>
							<?php echo display_errors($errors); ?>
						<?php } ?>
					</div>
					
					<div class = "row m-0">
						<div class = "col-md-3">
							<div class = "card">
								<div class = "card-header bg-primary text-light">Facts of Tour</div>
								<div class = "card-body">
									<div class = "form-group">
										<select class = "form-control" name = "position">
											<option value = "Position" selected>Position</option>
											<?php
												if (this_form('submit_tour')) {
													for ($i = 1; $i <= $tour_count + 1; $i++) {
														echo "<option value=\"{$i}\"";
														if ($_SESSION['position'] == $i) {
															echo " selected";
														}
														echo ">{$i}</option>";
													}
												} else {
													for ($i = 1; $i <= $tour_count + 1; $i++) {
														echo "<option value=\"{$i}\">{$i}</option>";
													}
												}
											
											?>
										</select>
									</div>
									<?php ?>
									<div class = "form-group">
										<input type = "text" name = "destination" class = "form-control" placeholder = "Destination" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['destination'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "tour_name" class = "form-control" placeholder = "Name of Tour" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['tour_name'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "activities" class = "form-control" placeholder = "Activities" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['activities'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "tour_duration" class = "form-control" placeholder = "Tour Duration" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['tour_duration'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "tour_grade" class = "form-control" placeholder = "Tour Grade" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['tour_grade'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "seasons" class = "form-control" placeholder = "Seasons" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['seasons'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "group_size" class = "form-control" placeholder = "Group Size" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['group_size'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "altitude" class = "form-control" placeholder = "Altitude" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['altitude'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "accommodation" class = "form-control" placeholder = "accommodation" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['accommodation'];
										} ?>" required>
									</div>
									<div class = "form-group">
										<input type = "text" name = "transport" class = "form-control" placeholder = "Transport" value = "<?php if (this_form('submit_tour')) {
											echo $_SESSION['transport'];
										} ?>" required>
									</div>
									<?php ?>
								
								</div>
							</div>
						</div>
						<div class = "col-md-9">
							<div class = "card">
								<div class = "card-header bg-primary text-light">Tour Details</div>
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
										<?php ?>
										<div class = "tab-pane fade show active" id = "nav-overview" role = "tabpanel" aria-labelledby = "nav-overview-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "overview" placeholder = "Overview" rows = "17" required><?php if (this_form('submit_tour')) {
														echo $_SESSION['overview'];
													} ?></textarea>
											</div>
										</div>
										<div class = "tab-pane fade" id = "nav-itinenarary" role = "tabpanel" aria-labelledby = "nav-itinenarary-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "itinenarary" placeholder = "itinenarary" rows = "17" required><?php if (this_form('submit_tour')) {
														echo $_SESSION['itinenarary'];
													} ?></textarea>
											</div>
										</div>
										<div class = "tab-pane fade" id = "nav-cost-info" role = "tabpanel" aria-labelledby = "nav-cost-info-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "cost_info" placeholder = "Cost Info" rows = "17" required><?php if (this_form('submit_tour')) {
														echo $_SESSION['cost_info'];
													} ?></textarea>
											</div>
										</div>
										<div class = "tab-pane fade" id = "nav-gallery" role = "tabpanel" aria-labelledby = "nav-gallery-tab">
											<div class = "form-group">
												<textarea class = "form-control" name = "gallery" placeholder = "Image links" rows = "17" required><?php if (this_form('submit_tour')) {
														echo $_SESSION['gallery'];
													} ?></textarea>
											</div>
										</div>
										<?php ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class = "row mt-2 mx-5 float-right">
						<div class = "form-check">
							<input type = "hidden" name = "visible" value = "0" />
							<input type = "checkbox" class = "form-check-input" name = "visible" id = "visibility-check" value = "1" <?php if (this_form('submit_tour') && $_SESSION['visible'] == "1") {
								echo "checked";
							} ?>/>
							<label class = "form-check-label" for = "visibility-check">Published</label>
						</div>
					</div>
				
				</div>
				
				<div class = "modal-footer pt-0">
					
					<button class = "btn btn-secondary" data-dismiss = "modal">Close</button>
					<button type = "submit" class = "btn btn-primary" name = "submit_tour">Add Tour</button>
				
				</div>
			</div>
		</div>
	</div>
</form>
