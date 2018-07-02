<?php require_once('../../private/initialize.php'); ?>

<?php
	$preview = false;
	if (isset($_GET['preview'])) {
		$preview = $_GET['preview'] == 'true' && is_logged_in() ? true : false;
	}
	$visible = !$preview;
?>

<?php
	if (!isset($_GET['id'])) {
		redirect_to(url_for('/index.php'));
	}
	$id = $_GET['id'];
	
	$trek = find_trek_by_id($id, ['visible' => $visible]);
	if (!$trek) {
		redirect_to(url_for('/index.php'));
	}
?>

<?php $page_title = 'Trek Details'; ?>

<?php include(SHARED_PATH . '/page_header.php') ?>
	
	<header id = "main-header" class = "py-4 text-white">
		<div class = "container">
			<div class = "row">
				<div class = "col-md-8">
					<h3>
						<?php echo h($trek['trek_name']) ?>
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
				<div class = "col-md-3 col-sm-6 mr-auto">
					<a href = "<?php echo url_for('/index.php#services'); ?>" class = "btn btn-light btn-block">
						<i class = "fa fa-arrow-left"></i> Back To Home
					</a>
				</div>
				<div class = "col-md-3 pt-2">
				
				</div>
				<div class = "col-md-3 pt-2">
				
				</div>
			</div>
		</div>
	</section>
	
	<!-- trek -->
	<section id = "trek">
		<div class = "container">
			<div class = "row">
				<div class = "col">
					<div class = "card" id = "card-main">
						<div class = "card-header text-light" id = "card-details-header">
							<h4>Trek Details</h4>
						</div>
						<div class = "row py-3">
							<div class = "col-md-5">
								<div class = "facts">
									<div class = "row">
										<div class = "col-md-12">
											<div class = "card card-table">
												<div class = "card-header text-light" id = "card-facts-header">Facts of Trek</div>
												<div class = "card-body">
													<table class = "table table-striped table-sm table-hover">
														<tr>
															<td>Trip Duration</td>
															<td>
																<?php echo h($trek['trip_duration']); ?>
															</td>
														</tr>
														<tr>
															<td>Duration of Trek</td>
															<td>
																<?php echo h($trek['trek_duration']); ?>
															</td>
														</tr>
														<tr>
															<td>Trek Start and End Place</td>
															<td>
																<?php echo h($trek['start_end_place']); ?>
															</td>
														</tr>
														<tr>
															<td>Trek Type</td>
															<td>
																<?php echo h($trek['trek_type']); ?>
															</td>
														</tr>
														<tr>
															<td>Trek Grade</td>
															<td>
																<?php echo h($trek['trek_grade']); ?>
															</td>
														</tr>
														<tr>
															<td>Seasons</td>
															<td>
																<?php echo h($trek['seasons']); ?>
															</td>
														</tr>
														<tr>
															<td>Max Altitude</td>
															<td>
																<?php echo h($trek['altitude']); ?>
															</td>
														</tr>
														<tr>
															<td>Walking Hours</td>
															<td>
																<?php echo h($trek['walking_hours']); ?>
															</td>
														</tr>
														<tr>
															<td>Cost</td>
															<td>
																<b>
																	<?php echo h($trek['cost']); ?>
																</b>
															</td>
														</tr>
													</table>
												
												</div>
											</div>
										</div>
									</div>
									</a>
								</div>
							</div>
							
							<div class = "col-md-7 pb-3">
								<div class = "card">
									<div class = "card-header text-light" id = "card-highlights-header">Highlights</div>
									<div class = "card-body">
										<?php echo $trek['highlights']; ?>
									</div>
								</div>
							</div>
							
							<div class = "row py-3 px-3">
								<div class = "col-md-12">
									<div class = "card">
										<nav>
											<div class = "nav nav-tabs" id = "nav-tab" role = "tablist">
												<a class = "nav-item nav-link active" id = "nav-overview-tab border-left" data-toggle = "tab" href = "#nav-overview" role = "tab" aria-controls = "nav-overview"
												   aria-selected = "true">Overview</a>
												<a class = "nav-item nav-link" id = "nav-itinenarary-tab" data-toggle = "tab" href = "#nav-itinenarary" role = "tab" aria-controls = "nav-itinenarary"
												   aria-selected = "false">itinenarary</a>
												<a class = "nav-item nav-link" id = "nav-cost-info-tab" data-toggle = "tab" href = "#nav-cost-info" role = "tab" aria-controls = "nav-cost-info"
												   aria-selected = "false">Cost Info</a>
												<a class = "nav-item nav-link" id = "nav-equipment-tab" data-toggle = "tab" href = "#nav-equipment" role = "tab" aria-controls = "nav-equipment"
												   aria-selected = "false">equipment Check</a>
												<a class = "nav-item nav-link" id = "nav-gallery-tab" data-toggle = "tab" href = "#nav-gallery" role = "tab" aria-controls = "nav-gallery"
												   aria-selected = "false">Gallery</a>
											</div>
										</nav>
										<div class = "tab-content m-2" id = "nav-tabContent">
											<div class = "tab-pane fade show active" id = "nav-overview" role = "tabpanel" aria-labelledby = "nav-overview-tab">
												<div class = "card border-top-0">
													<?php echo strip_tags($trek['overview'], $allowed_tags); ?>
												</div>
											</div>
											<div class = "tab-pane fade" id = "nav-itinenarary" role = "tabpanel" aria-labelledby = "nav-itinenarary-tab">
												<div class = "card border-top-0">
													<?php echo strip_tags($trek['itinenarary'], $allowed_tags); ?>
												</div>
											</div>
											<div class = "tab-pane fade" id = "nav-cost-info" role = "tabpanel" aria-labelledby = "nav-cost-info-tab">
												<div class = "card border-top-0 card-content">
													<?php echo strip_tags($trek['cost_info'], $allowed_tags); ?>
												</div>
											</div>
											<div class = "tab-pane fade" id = "nav-equipment" role = "tabpanel" aria-labelledby = "nav-equipment-tab">
												<div class = "card border-top-0">
													<?php echo strip_tags($trek['equipments'], $allowed_tags); ?>
												</div>
											</div>
											<div class = "tab-pane fade py-10" id = "nav-gallery" role = "tabpanel" aria-labelledby = "nav-gallery-tab">
												<section id = "gallery" class = "gallery-section bg-dark">
													<div class = "container-fluid p-0">
														<div class = "row no-gutters popup-gallery">
															<div class = "col-lg-4 col-sm-6">
																<a class = "gallery-box" href = "<?php echo url_for('/images/page_assets/bungy_jump/fullsize/1.jpg'); ?>">
																	<img class = "img-fluid sr-image" src = "<?php echo url_for('/images/page_assets/bungy_jump/thumbnails/1.jpg'); ?>" alt = "">
																	<div class = "gallery-box-caption">
																		<div class = "gallery-box-caption-content">
																			<div class = "project-category text-faded">
																				Activity
																			</div>
																			<div class = "project-name">
																				Place
																			</div>
																		</div>
																	</div>
																</a>
															</div>
															<div class = "col-lg-4 col-sm-6">
																<a class = "gallery-box" href = "<?php echo url_for('/images/page_assets/bungy_jump/fullsize/2.jpg'); ?>">
																	<img class = "img-fluid sr-image" src = "<?php echo url_for('/images/page_assets/bungy_jump/thumbnails/2.jpg'); ?>" alt = "">
																	<div class = "gallery-box-caption">
																		<div class = "gallery-box-caption-content">
																			<div class = "project-category text-faded">
																				Activity
																			</div>
																			<div class = "project-name">
																				Place
																			</div>
																		</div>
																	</div>
																</a>
															</div>
															<div class = "col-lg-4 col-sm-6">
																<a class = "gallery-box" href = "<?php echo url_for('/images/page_assets/bungy_jump/fullsize/3.jpg'); ?>">
																	<img class = "img-fluid sr-image" src = "<?php echo url_for('/images/page_assets/bungy_jump/thumbnails/3.jpg'); ?>" alt = "">
																	<div class = "gallery-box-caption">
																		<div class = "gallery-box-caption-content">
																			<div class = "project-category text-faded">
																				Activity
																			</div>
																			<div class = "project-name">
																				Place
																			</div>
																		</div>
																	</div>
																</a>
															</div>
															<div class = "col-lg-4 col-sm-6">
																<a class = "gallery-box" href = "<?php echo url_for('/images/page_assets/bungy_jump/fullsize/4.jpg'); ?>">
																	<img class = "img-fluid sr-image" src = "<?php echo url_for('/images/page_assets/bungy_jump/thumbnails/4.jpg'); ?>" alt = "">
																	<div class = "gallery-box-caption">
																		<div class = "gallery-box-caption-content">
																			<div class = "project-category text-faded">
																				Activity
																			</div>
																			<div class = "project-name">
																				Place
																			</div>
																		</div>
																	</div>
																</a>
															</div>
															<div class = "col-lg-4 col-sm-6">
																<a class = "gallery-box" href = "<?php echo url_for('/images/page_assets/bungy_jump/fullsize/5.jpg'); ?>">
																	<img class = "img-fluid sr-image" src = "<?php echo url_for('/images/page_assets/bungy_jump/thumbnails/5.jpg'); ?>" alt = "">
																	<div class = "gallery-box-caption">
																		<div class = "gallery-box-caption-content">
																			<div class = "project-category text-faded">
																				Activity
																			</div>
																			<div class = "project-name">
																				Place
																			</div>
																		</div>
																	</div>
																</a>
															</div>
															<div class = "col-lg-4 col-sm-6">
																<a class = "gallery-box" href = "<?php echo url_for('/images/page_assets/bungy_jump/fullsize/6.jpg'); ?>">
																	<img class = "img-fluid sr-image" src = "<?php echo url_for('/images/page_assets/bungy_jump/thumbnails/6.jpg'); ?>" alt = "">
																	<div class = "gallery-box-caption">
																		<div class = "gallery-box-caption-content">
																			<div class = "project-category text-faded">
																				Activity
																			</div>
																			<div class = "project-name">
																				Place
																			</div>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</section>
											
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>

<?php include(SHARED_PATH . '/page_footer.php') ?>