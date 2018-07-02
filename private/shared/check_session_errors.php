  <!-- if session errors are set show the form modal again -->
  <?php if (isset($_SESSION['errors'])) { ?>
    <?php if (this_form('submit_simage')) { ?>
              <script type="text/javascript">
                <?php echo "window.onload = function(){ document.getElementById(\"addSImage\").click(); }"; ?>
              </script>

    <?php } elseif (this_form('submit_tour')) { ?>
              <script type="text/javascript">
                <?php echo "window.onload = function(){ document.getElementById(\"addTour\").click(); }"; ?>
              </script>

    <?php } elseif (this_form('submit_trek')) { ?>
              <script type="text/javascript">
                <?php echo "window.onload = function(){ document.getElementById(\"addTrek\").click(); }"; ?>
              </script>

    <?php } elseif (this_form('submit_testimonial')) { ?>
              <script type="text/javascript">
                <?php echo "window.onload = function(){ document.getElementById(\"addTestimonial\").click(); }"; ?>
              </script>

    <?php } elseif (this_form('submit_about')) { ?>
              <script type="text/javascript">
                <?php echo "window.onload = function(){ document.getElementById(\"editAbout\").click(); }"; ?>
              </script>

    <?php }
    elseif (this_form('submit_admin')) { ?>
              <script type="text/javascript">
                <?php echo "window.onload = function(){ document.getElementById(\"addAdmin\").click(); }"; ?>
              </script>
    <?php }
      elseif (this_form('submit_gimage')) { ?>
          <script type="text/javascript">
              <?php echo "window.onload = function(){ document.getElementById(\"addGImage\").click(); }"; ?>
          </script>
  <?php } ?>
<?php } ?>
