<?php
  $image_set = find_all_images("slider_images");
  $image = mysqli_fetch_assoc($image_set);
  mysqli_free_result($image_set);
  $image_count = count_all_images("slider_images");
?>

  <!-- ADMIN MODAL -->
  <div class="modal fade" id="addSImageModal">
    <div class="modal-dialog modal-lg">
      <form action="<?php echo url_for('/admin/slider_images/image_upload.php') ?>"  enctype="multipart/form-data" method="post">
        <div class="modal-content">
          <div class="modal-header bg-info text-white">
            <h5 class="modal-title">Add Slider Image</h5>
            <button class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- display errors -->
           <div class="errors px-3">
              <?php if (this_form('submit_simage')) { ?>
              <?php errors(); ?>
              <?php echo display_errors($errors); ?>
              <?php } ?>
            </div>

            <div class="form-group">
              <select class="form-control" name="position">
                <option value="Position">Position</option>
                <?php
                if (this_form('submit_simage')) {
                  for ($i=1; $i <= $image_count+1; $i++) {
                      echo "<option value=\"{$i}\"";
                      if ($_SESSION['position'] == $i) {
                          echo " selected";
                      }
                      echo ">{$i}</option>";
                  }
                } else {
                  for($i=1; $i <= $image_count+1; $i++) {
                    echo "<option value=\"{$i}\">{$i}</option>";
                  }
                }
              ?>
              </select>
            </div>
            <div class="form-group">
              <input type="hidden" name="MAX_FILE_SIZE"  class="form-control" value="5000000"/>
        		  <input type="file" name="image_upload" class="form-control"  value="" required/>
            </div>
            <div class="form-group">
              <input type="text" name="caption" class="form-control" placeholder="Caption" value="<?php if (this_form('submit_simage')) { echo $_SESSION['caption']; } ?>" required/>
            </div>

            <div class="row mt-2 mx-5 float-right">
              <div class="form-check">
                <input type="hidden" name="visible" value="0" />
                <input type="checkbox" class="form-check-input" name="visible" id="visibility-check" value="1" <?php if (this_form('submit_simage') && $_SESSION['visible'] == "1") { echo "checked";} ?>/>
                <label class="form-check-label" for="visibility-check">Published</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info" name="submit_simage">Upload Image</button>
          </div>
        </div>
      </form>
    </div>
  </div>
