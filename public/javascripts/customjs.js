(function ($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 48)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function () {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 54
  });

  // Collapse Navbar
  var navbarCollapse = function () {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();

  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

  setTimeout(function(){
    $('.btn-circle').fadeIn(500);
}, 5000);

  // Scroll reveal calls
  window.sr = ScrollReveal();

  sr.reveal('.brand-heading', {
    duration: 3000,
    origin: 'top',
    distance: '200px'
  });
  sr.reveal('.intro-text', {
    delay: 2000,
    duration: 2000
  });
  sr.reveal('.sr-icons', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 200);
  sr.reveal('.sr-button', {
    duration: 1000,
    delay: 600
  });
  sr.reveal('.sr-contact', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 300);
  sr.reveal('.sr-image', {
    duration: 300,
    scale: 0.3,
    distance: '0px'
  }, 300);
  sr.reveal('.heading', {
    duration: 2000,
    origin: 'bottom',
    distance: '25px'
  });
  sr.reveal('.line', {
    duration: 1000,
    delay:1000,
    origin: 'left',
    distance: '25px'
  });

  sr.reveal('.description', {
    duration: 2000,
    origin: 'bottom',
    distance: '25px'
  });
  sr.reveal('.blockquote-left', {
    duration: 2000,
    origin: 'left',
    // distance: '300px',
    viewfactor: 0.2
  });
  sr.reveal('.blockquote-right', {
    duration: 2000,
    origin: 'right',
    // distance: '300px',
    viewfactor: 0.2
  });

  // slideshow

  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";

    setTimeout(showSlides, 10000);
  }

  // Magnific popup calls
  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
  });

})(jQuery); // End of use strict
