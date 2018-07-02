 <?php
  $testimonial_set = find_all_testimonials();
  $testimonial = mysqli_fetch_assoc($testimonial_set);
  mysqli_free_result($testimonial_set);
  $testimonial_count = count_all_testimonials();
?>

  <!-- ADMIN MODAL -->
  <div class="modal fade" id="addTestimonialModal">
    <div class="modal-dialog modal-lg">
      <form action="<?php echo url_for('/admin/testimonials/create.php') ?>" method="post">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title">Add Testimonial</h5>
            <button class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- display errors -->
           <div class="errors px-3">
              <?php if (this_form('submit_testimonial')) { ?>
              <?php errors(); ?>
              <?php echo display_errors($errors); ?>
              <?php } ?>
            </div>
            <div class="form-group">
              <select class="form-control" name="position" required>
                <option value="Position" selected>Position</option>
                <?php
                  if (this_form('submit_testimonial')) {
                    for ($i=1; $i <= $testimonial_count+1; $i++) {
                        echo "<option value=\"{$i}\"";
                        if ($_SESSION['position'] == $i) {
                            echo " selected";
                        }
                        echo ">{$i}</option>";
                    }
                  } else {
                    for($i=1; $i <= $testimonial_count+1; $i++) {
                      echo "<option value=\"{$i}\">{$i}</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="footer" class="form-control" placeholder="Name" value="<?php if (this_form('submit_testimonial')) { echo $_SESSION['footer'];} ?>" required>
            </div>
            <div class="form-group">
              <label for="quote">Quote</label>
              <textarea class="form-control" name="quote" placeholder="Quote" rows="5" required><?php if (this_form('submit_testimonial')) { echo $_SESSION['quote'];} ?></textarea>
            </div>

            <div class="row mt-2 mx-5 float-right">
              <div class="form-check">
                <input type="hidden" name="visible" value="0" />
                <input type="checkbox" class="form-check-input" name="visible" id="visibility-check" value="1"  <?php if (this_form('submit_testimonial') && $_SESSION['visible'] == "1") { echo "checked";} ?>/>
                <label class="form-check-label" for="visibility-check">Published</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="submit_testimonial">Add Testimonial</button>
          </div>
        </div>
      </form>
    </div>
  </div>
