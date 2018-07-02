<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <link rel="icon" type="image/png" sizes="96x96"
          href="<?php echo url_for('images/homepage_assets/icons/favicon-96x96.png'); ?>">
    <link href="<?php echo url_for('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>">
    <link href="<?php echo url_for('vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
    <!-- Plugin CSS -->
    <link href="<?php echo url_for('vendor/magnific-popup/magnific-popup.css" rel="stylesheet'); ?>">
    <!-- Custom CSS -->
    <link href="<?php echo url_for('stylesheets/home_style.css" rel="stylesheet" type="text/css'); ?>">

    <title>
        <?php echo h($page_title);
        if ($preview) {
            echo ' [PREVIEW]';
        } ?>
    </title>
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand brand js-scroll-trigger" href="#page-top">Open Heaven</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">Our Tours &amp; Treks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#testimonials">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Intro Header -->
<?php $images = find_all_images('slider_images', ['visible' => $visible]); ?>
<div class="slideshow-container">
    <div class="dark-overlay">
        <?php foreach ($images as $image): ?>
            <div class="mySlides fade">
                <img src="<?php echo url_for('images/homepage_assets/slider_images/' . $image['filename']); ?>"
                     alt="<?php echo $image['caption']; ?>" style="height:100%;">
                <div class="caption"><?php echo $image['caption']; ?></div>
            </div>
        <?php endforeach; ?>
        <?php mysqli_free_result($images); ?>
    </div>
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="brand-heading">OPEN HEAVEN TRAVELS AND TREKS</h1>
                    <p class="intro-text">Explore Nepal with Open Heaven</p>
                    <a href="#about" class="btn btn-circle js-scroll-trigger">
                        <i class="fa fa-angle-double-down bounce"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<?php $about_set = fetch_about(['visible' => $visible]); ?>
<?php $about = mysqli_fetch_assoc($about_set); ?>
<?php mysqli_free_result($about_set); ?>
<section id="about" class="about-section bg-light">
    <div class="container">
        <div class="row text-justify">
            <div class="col- mx-2">
                <h2 class="heading text-center">
                    <?php echo strip_tags($about['head'], $allowed_tags); ?>
                </h2>
                <hr class="my-4 line">
                <br>
                <p class="description"><?php echo strip_tags($about['body'], $allowed_tags); ?></p>
            </div>
        </div>
    </div>
</section>


<!-- Services Section -->
<?php $tours = find_all_tours(['visible' => $visible]); ?>
<?php $treks = find_all_treks(['visible' => $visible]); ?>
<section id="services" class="services-section text-center bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Our Tours and Treks</h2>
                <hr class="light my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row text-left">
                    <div class="col-md-12">
                        <h5>Tour Packages</h5>
                    </div>
                </div>

                <div class="row">
                    <?php while ($tour = mysqli_fetch_assoc($tours)) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card text-center bg-warning text-white mb-3 box shadow sr-icons">
                                <div class="card-body">
                                    <p>
                                        <?php echo h($tour['tour_name']); ?>
                                    </p>
                                    <a href="<?php echo url_for('/pages/tour.php?id=' . h(u($tour['id']))); ?>"
                                       class="btn btn-outline-light sr-button">View</a>
                                </div>
                            </div>
                        </div>
                    <?php } // end of while tour ?>
                </div>

            </div>

            <div class="col-md-12">
                <div class="row text-left pt-3">
                    <div class="col-md-12">
                        <h5>Trek Packages</h5>
                    </div>
                </div>
                <div class="row">
                    <?php while ($trek = mysqli_fetch_assoc($treks)) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card text-center bg-warning text-white mb-3 shadow sr-icons">
                                <div class="card-body">
                                    <p>
                                        <?php echo h($trek['trek_name']); ?>
                                    </p>
                                    <a href="<?php echo url_for('/pages/trek.php?id=' . h(u($trek['id']))); ?>"
                                       class="btn btn-outline-light sr-button">View</a>
                                </div>
                            </div>
                        </div>
                    <?php } // end of while trek ?>
                </div>
            </div>
        </div>
    </div>

</section>
<?php mysqli_free_result($tours); ?>
<?php mysqli_free_result($treks); ?>

<!-- GALLERY -->
<section id="gallery" class="gallery-section bg-dark">
    <div class="row  m-0 p-0">
        <div class="col-lg-12 text-center">
            <h3 class="section-heading">Gallery</h3>
        </div>
    </div>
    <?php $images = find_all_images('gallery_images', ['visible' => $visible]); ?>
    <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
            <?php foreach ($images as $image): ?>
                <div class="col-lg-4 col-sm-6">
                    <a class="gallery-box"
                       href="<?php echo url_for('images/homepage_assets/gallery/fullsize/' . $image['filename']); ?>">
                        <img class="img-fluid sr-image"
                             src="<?php echo url_for('images/homepage_assets/gallery/fullsize/' . $image['filename']); ?>"
                             alt="<?php echo $image['filename']; ?>">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-caption-content">
                                <div class="project-category text-faded">
                                    <?php echo $image['activity']; ?>
                                </div>
                                <div class="project-name">
                                    <?php echo $image['place']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <?php mysqli_free_result($images); ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<?php $testimonials = find_all_testimonials(['visible' => $visible]); ?>
<section id="testimonials" class="testimonials-section bg-dark ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Testimonials</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <?php while ($testimonial = mysqli_fetch_assoc($testimonials)) { ?>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-md-6">
                            <?php if ($testimonial['position'] % 2 != 0) { ?>
                                <blockquote class="blockquote blockquote-left text-left">
                                    <p class="mb-0">
                                        <?php echo h($testimonial['quote']); ?>
                                    </p>
                                    <footer class="blockquote-footer py-4">
                                        <?php echo h($testimonial['footer']); ?>
                                    </footer>
                                </blockquote>
                            <?php } else { ?>
                        </div>
                        <div class="col-md-6">
                            <?php ?>
                            <blockquote class="blockquote blockquote-right text-right">
                                <p class="mb-0">
                                    <?php echo h($testimonial['quote']); ?>
                                </p>
                                <footer class="blockquote-footer py-4">
                                    <?php echo h($testimonial['footer']); ?>
                                </footer>
                            </blockquote>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</section>
<?php mysqli_free_result($testimonials); ?>

<!-- Contact Section -->
<section id="contact" class="contact-section bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading">Let's Get In Touch!</h2>
                <hr class="my-4">
                <p class="mb-5">Ready to start your next trip with us? That's great! Give us a call or send us a message
                    and we will get back to
                    you as soon as possible!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center">
                <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
                <p>986-1234669</p>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fa fa-facebook fa-3x mb-3 sr-contact"></i>
                <p>
                    <a href="https://www.facebook.com/Open-Heaven-Travels-and-Treks-pvtltd-Nepal-342978409522180/"
                       target="_blank">Facebook</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="footer">
    <div class="container">
        <div class="row footer pt-4 text-center">
            <div class="col-md-6">
                <p><?php echo Date("Y"); ?>,<a class="js-scroll-trigger" href="#page-top"> Open Heaven Travels and
                        Treks</a></p>
            </div>
            <div class="col-md-6">
                <p>Powered by <a href="http://www.quicksilverinnovations.com/" target="_blank"
                                 onMouseOver="this.style.color='#00dcde'" onMouseOut="this.style.color='#EE9D20'"> Quick
                        Silver Innovations</a></p>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo url_for('vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo url_for('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script src="<?php echo url_for('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script src="<?php echo url_for('vendor/scrollreveal/scrollreveal.min.js'); ?>"></script>
<script src="<?php echo url_for('vendor/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo url_for('javascripts/customjs.js'); ?>"></script>

</body>

</html>

<?php
db_disconnect($db);
?>
