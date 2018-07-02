<?php require_once('../private/initialize.php'); ?>

<!DOCTYPE html>
<html lang = "en">

<head>
	
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name = "description" content = "">
	<meta name = "author" content = "">
	
	
	<link rel = "icon" type = "image/png" sizes = "96x96" href = "<?php echo url_for('images/homepage_assets/icons/favicon-96x96.png'); ?>">
	<link href = "<?php echo url_for('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>">
	<link href = "<?php echo url_for('vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css'); ?>">
	<link href = "https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel = "stylesheet" type = "text/css">
	<link href = 'https://fonts.googleapis.com/css?family=Cabin:700' rel = 'stylesheet' type = 'text/css'>
	<!-- Plugin CSS -->
	<link href = "<?php echo url_for('vendor/magnific-popup/magnific-popup.css" rel="stylesheet'); ?>">
	<!-- Custom CSS -->
	<link href = "<?php echo url_for('stylesheets/page-style.css" rel="stylesheet" type="text/css'); ?>">
	
	<title>Open Heaven Travels & Trecks</title>
</head>

<body id = "page-top">

<!-- Navigation -->
<nav class = "navbar navbar-expand-lg navbar-light fixed-top" id = "mainNav">
	<div class = "container">
		<a class = "navbar-brand brand js-scroll-trigger" href = "#page-top">Open Heaven</a>
		<button class = "navbar-toggler navbar-toggler-right" type = "button" data-toggle = "collapse" data-target = "#navbarResponsive"
		        aria-controls = "navbarResponsive" aria-expanded = "false" aria-label = "Toggle navigation">
			Menu
			<i class = "fa fa-bars"></i>
		</button>
		<div class = "collapse navbar-collapse" id = "navbarResponsive">
			<ul class = "navbar-nav ml-auto">
				<li class = "nav-item">
					<a class = "nav-link js-scroll-trigger" href = "#about">About</a>
				</li>
				<li class = "nav-item">
					<a class = "nav-link js-scroll-trigger" href = "#services">Tours &amp; Activities</a>
				</li>
				<li class = "nav-item">
					<a class = "nav-link js-scroll-trigger" href = "#gallery">Gallery</a>
				</li>
				<li class = "nav-item">
					<a class = "nav-link js-scroll-trigger" href = "#testimonials">Testimonials</a>
				</li>
				<li class = "nav-item">
					<a class = "nav-link js-scroll-trigger" href = "#contact">Contact</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!-- page intro header -->
<div class = "container mt-5 pt-5" id = "content">
	<div class = "row justify-content-center">
		<div class = "jumbotron jumbotron-fluid">
			<div class = "container">
				<h1 class = "display-4">Bhotekoshi River Bungy Jump</h1>
				<p class = "lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
			</div>
		</div>
	</div>
	
	<div class = "row">
		<div class = "col-md-4">
			<div class = "facts">
				<div class = "row">
					<div class = "col-md-12">
						<div class = "card card-table">
							<div class = "card-header main-color-bg">Facts of Trip</div>
							<div class = "card-body">
								<table class = "table table-striped table-hover">
									
									<tr>
										<td>Destination</td>
										<td>Nepal</td>
									</tr>
									<tr>
										<td>Activities</td>
										<td>Adventure Sports</td>
									</tr>
									<tr>
										<td>Trip Duration</td>
										<td> 01 Day(s)</td>
									</tr>
									<tr>
										<td>Trip Grade</td>
										<td>Moderate</td>
									</tr>
									<tr>
										<td>Area</td>
										<td>Bhotekoshi</td>
									</tr>
									<tr>
										<td>Seasons</td>
										<td>Jan - Dec</td>
									</tr>
									<tr>
										<td>Group Size</td>
										<td>2 to 25</td>
									</tr>
									<tr>
										<td>Altitude</td>
										<td>1365m</td>
									</tr>
									<tr>
										<td>Accommodation</td>
										<td>Hotel / Guest House / Lodge</td>
									</tr>
									<tr>
										<td>Transport</td>
										<td>Drive</td>
									</tr>
								</table>
							
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
			<!-- <div class="stats">
			  <div class="well">
				 <h5>Disk space used</h5>
				 <div class="progress">
					<div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">70%</div>
				 </div>
			  </div>
			  <div class="well">
				 <h5>Bandwidth used</h5>
				 <div class="progress">
					<div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
				 </div>
			  </div>
			</div> -->
		</div>
		
		<div class = "col-md-8">
			<div class = "card bt-0">
				<nav>
					<div class = "nav nav-tabs" id = "nav-tab" role = "tablist">
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
				<div class = "tab-content m-2" id = "nav-tabContent">
					<div class = "tab-pane fade show active" id = "nav-overview" role = "tabpanel" aria-labelledby = "nav-overview-tab">
						<div class = "card border-top-0">
							<table class = "table table-striped table-hover">
								<tr>
									<td>
										<p>
											<b>Bhotekoshi River Bungy Jump</b> is the highest bungy jump in the Nepal which is
											                                   located at Sindupalchwok
											                                   district. Here is a rare opportunity to do something
											                                   different and exhilarating in Nepal; a Bungee
											                                   Jump.A three hour drive from Kathmandu along the
											                                   Arniko (Kathmandu/Lhasa) highway will take you to
											                                   an amazing new bridge where the Bungee is located.
											                                   At this point you are a mere 12 km from the Tibet
											                                   border and the famous Friendship Bridge.
											<br>
											<br>
											<b> Location</b>
											<br> A three hour driving outside of Kathmandu Valley. You will travel the Arniko
											                                   (Kathmandu/Lhasa) Highway
											                                   to within 12km of the Tibet Border and the famous
											                                   Friendship Bridge.
											<br>
											<br>
											<b> The Bridge</b>
											<br> The bridge is Swiss designed, especially for Bungee jumping, and is the longest
											                                   suspension bridge
											                                   in Nepal. It has over 6000 meters of steel wire and
											                                   has a load capacity of 41500kg, or 4.5 tones.
											                                   One of New Zealand’s leading Bungee consultants
											                                   designed the jump and it is operated by some of the
											                                   most experienced jump masters in the business. As
											                                   they have done in New Zealand, safety is paramount
											                                   with this operation. The bridge has been a wonderful
											                                   benefit for the local community. Before it was
											                                   constructed, it took locals five hours to cross the
											                                   great valley that is split by the mighty Bhote
											                                   Kosi River. So, if you want an amazing adrenaline
											                                   rush, this is the place to go. Your weight will
											                                   be checked, so you get the jump of your choice
											                                   (close to the water if you choose) and other safety
											                                   requirements will be explained. Ask people who have
											                                   done a Bungee and they will tell you: “Do it
											                                   once and you will want to do it again”.
										</p>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class = "tab-pane fade" id = "nav-itinenarary" role = "tabpanel" aria-labelledby = "nav-itinenarary-tab">
						<div class = "card border-top-0">
							
							
							<table class = "table table-striped table-hover">
								
								<tr>
									<td class = "text-nowrap">Day 1</td>
									<td>
										<b>Kathmandu drive to Last Resort (4-5 hrs drive)</b>
										<br>Drive to Last Resort (Ultimate Bungy Sport) after arrival, you will be briefed and
										    prepared for Bungy.
										    After the jump, rest overnight at Last Resort or drive back to Kathmandu. This is the
										    short day trip
										    to Bungy in Nepal. If you have enough time then you can plan ahead as given below.
									</td>
								</tr>
								<tr>
									<td>Day 2</td>
									<td>
										<b>Cannoning and Bhote Koshi River Rafting</b>
										<br> After breakfast beautiful cannoning trip to The Bhote Koshi River cliff. This is also
										     one of the most
										     exciting adventure trips when combined with Bungy.
									</td>
								</tr>
								<tr>
									<td>Day 3</td>
									<td>
										<b>River Rafting</b>
										<br> Rafting trip on Bhote Koshi River for every adventure lover can enjoy its many
										     challenging rapids
										     and overnight camp.
									</td>
								</tr>
								<tr>
									<td>Day 4</td>
									<td>
										<b>Rafting and Back to Kathmandu (4 hrs drive)</b>
										<br> After breakfast continue rafting again and after that drive back to Kathmandu.
										<br>
										<b>
											Note: We have one day package also start from Kathmandu and return same day after Bungy
											trip if you want bungy trip only.
										</b>
									</td>
								</tr>
							
							</table>
						</div>
					</div>
					<div class = "tab-pane fade" id = "nav-cost-info" role = "tabpanel" aria-labelledby = "nav-cost-info-tab">
						<div class = "card border-top-0">
							<table class = "table table-striped table-hover">
								<tr>
									<td>
										<ul class = "list-group">
											<li class = "list-group-item">
												<b>Cost Include</b>
											</li>
											<li class = "list-group-item">
												<i class = "fa fa-check-square"></i> Airport picks up & drops by private vehicle
												                                     according your group.
											</li>
											<li class = "list-group-item">
												<i class = "fa fa-check-square"></i> Standard accommodation at hotel in Kathmandu.
											</li>
											<li class = "list-group-item">
												<i class = "fa fa-check-square"></i> Guided city tour in Kathmandu by private
												                                     vehicle according your trip.
											</li>
											<li class = "list-group-item">
												<i class = "fa fa-check-square"></i> All your fees for Bungy Jumping.
											</li>
											<li class = "list-group-item">
												<i class = "fa fa-check-square"></i> Transportation from and to Bungy point (the
												                                     last resort).
											</li>
											<li class = "list-group-item">
												<i class = "fa fa-check-square"></i> All our government taxes.
											</li>
										</ul>
									</td>
								</tr>
								<tr>
									<td>
										<ul class = "list-group">
											<li class = "list-group-item">
												<b>Cost Exclude</b>
											</li>
											<li class = "list-group-item">
												<i class = "fa fa-times"></i> Your meals and drinks whilst in Kathmandu.
											</li>
											<li class = "list-group-item">
												<i class = "fa fa-times"></i> Tips for staff and driver-Tipping is expected.
											</li>
											<li class = "list-group-item">
												<i class = "fa fa-times"></i> Any others expenses which are not mentioned on Price
												                              Includes section.
											</li>
										</ul>
								</tr>
							</table>
						</div>
					</div>
					<div class = "tab-pane fade py-10" id = "nav-gallery" role = "tabpanel" aria-labelledby = "nav-gallery-tab">
						<section id = "gallery" class = "gallery-section bg-dark">
							<div class = "container-fluid p-0">
								<div class = "row no-gutters popup-gallery">
									<div class = "col-lg-4 col-sm-6">
										<a class = "gallery-box" href = "<?php echo url_for('images/homepage_assets/gallery/fullsize/1.jpg'); ?>">
											<img class = "img-fluid sr-image" src = "<?php echo url_for('images/homepage_assets/gallery/thumbnails/1.jpg'); ?>" alt = "">
											<div class = "gallery-box-caption">
												<div class = "gallery-box-caption-content">
													<div class = "project-category text-faded">
														Category
													</div>
													<div class = "project-name">
														Project Name
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class = "col-lg-4 col-sm-6">
										<a class = "gallery-box" href = "<?php echo url_for('images/homepage_assets/gallery/fullsize/2.jpg'); ?>">
											<img class = "img-fluid sr-image" src = "<?php echo url_for('images/homepage_assets/gallery/thumbnails/2.jpg'); ?>" alt = "">
											<div class = "gallery-box-caption">
												<div class = "gallery-box-caption-content">
													<div class = "project-category text-faded">
														Category
													</div>
													<div class = "project-name">
														Project Name
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class = "col-lg-4 col-sm-6">
										<a class = "gallery-box" href = "<?php echo url_for('images/homepage_assets/gallery/fullsize/3.jpg'); ?>">
											<img class = "img-fluid sr-image" src = "<?php echo url_for('images/homepage_assets/gallery/thumbnails/3.jpg'); ?>" alt = "">
											<div class = "gallery-box-caption">
												<div class = "gallery-box-caption-content">
													<div class = "project-category text-faded">
														Category
													</div>
													<div class = "project-name">
														Project Name
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class = "col-lg-4 col-sm-6">
										<a class = "gallery-box" href = "<?php echo url_for('images/homepage_assets/gallery/fullsize/4.jpg'); ?>">
											<img class = "img-fluid sr-image" src = "<?php echo url_for('images/homepage_assets/gallery/thumbnails/4.jpg'); ?>" alt = "">
											<div class = "gallery-box-caption">
												<div class = "gallery-box-caption-content">
													<div class = "project-category text-faded">
														Category
													</div>
													<div class = "project-name">
														Project Name
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class = "col-lg-4 col-sm-6">
										<a class = "gallery-box" href = "<?php echo url_for('images/homepage_assets/gallery/fullsize/5.jpg'); ?>">
											<img class = "img-fluid sr-image" src = "<?php echo url_for('images/homepage_assets/gallery/thumbnails/5.jpg'); ?>" alt = "">
											<div class = "gallery-box-caption">
												<div class = "gallery-box-caption-content">
													<div class = "project-category text-faded">
														Category
													</div>
													<div class = "project-name">
														Project Name
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class = "col-lg-4 col-sm-6">
										<a class = "gallery-box" href = "<?php echo url_for('images/homepage_assets/gallery/fullsize/6.jpg'); ?>">
											<img class = "img-fluid sr-image" src = "<?php echo url_for('images/homepage_assets/gallery/thumbnails/6.jpg'); ?>" alt = "">
											<div class = "gallery-box-caption">
												<div class = "gallery-box-caption-content">
													<div class = "project-category text-faded">
														Category
													</div>
													<div class = "project-name">
														Project Name
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
			
			<!-- <div class="row">
			  <div class="col-md-12">
				 <div class="card card-table">
					<div class="card-header main-color-bg">Latest Users</div>
					<div class="card-body">
					  <table class="table table-striped table-hover">
						 <tr>
							<th>Name</th>
							<th>Email</th>
							<th>Joined</th>
						 </tr>
						 <tr>
							<td>Jill Smith</td>
							<td>jillsmith@gmail.com</td>
							<td>3-15-2018</td>
						 </tr>
						 <tr>
							<td>Prakash Poudel</td>
							<td>mee.prakash25@gmail.com</td>
							<td>3-10-2018</td>
						 </tr>
						 <tr>
							<td>Dipendra Dahal</td>
							<td>dipendra@gmail.com</td>
							<td>3-1-2018</td>
						 </tr>
						 <tr>
							<td>Ujjwol Poudel</td>
							<td>ujp@hotmail.com</td>
							<td>2-29-2018</td>
						 </tr>
						 <tr>
							<td>Anjila Poudel</td>
							<td>anjila@yahoo.com</td>
							<td>2-28-2018</td>
						 </tr>
					  </table>
 
					</div>
				 </div>
			  </div>
			</div> -->
		
		</div>
	</div>
</div>

<!-- Footer -->
<footer id = "footer">
	<div class = "row footer text-center py-5 mt-4 mx-0 justify-content-center text-light">
		<?php echo Date("Y"); ?>,
		<a href = "<?php echo url_for('/index.php'); ?>">&nbsp; Open Heaven Travels and Trecks</a>
	</div>
</footer>

<script src = "<?php echo url_for('vendor/jquery/jquery.min.js'); ?>"></script>
<script src = "<?php echo url_for('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script src = "<?php echo url_for('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script src = "<?php echo url_for('vendor/scrollreveal/scrollreveal.min.js'); ?>"></script>
<script src = "<?php echo url_for('vendor/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script>
<script src = "<?php echo url_for('javascripts/customjs.js'); ?>"></script>

</body>

</html>

<?php
	db_disconnect($db);
?>

</body>

</html>