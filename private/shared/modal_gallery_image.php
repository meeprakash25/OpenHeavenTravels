<?php
$image_set = find_all_images("gallery_images");
$image = mysqli_fetch_assoc($image_set);
mysqli_free_result($image_set);
$image_count = count_all_images("gallery_images");
?>

<!-- ADMIN MODAL -->
<div class="modal fade" id="addGImageModal">
    <div class="modal-dialog modal-lg">
        <form action="<?php echo url_for('/admin/gallery_images/image_upload.php') ?>" enctype="multipart/form-data"
              method="post">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Add Gallery Image</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- display errors -->
                    <div class="errors px-3">
                        <?php if (this_form('submit_gimage')) { ?>
                            <?php errors(); ?>
                            <?php echo display_errors($errors); ?>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="position">
                            <option value="Position">Position</option>
                            <?php
                            if (this_form('submit_gimage')) {
                                for ($i = 1; $i <= $image_count + 1; $i++) {
                                    echo "<option value=\"{$i}\"";
                                    if ($_SESSION['position'] == $i) {
                                        echo " selected";
                                    }
                                    echo ">{$i}</option>";
                                }
                            } else {
                                for ($i = 1; $i <= $image_count + 1; $i++) {
                                    echo "<option value=\"{$i}\">{$i}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="MAX_FILE_SIZE" class="form-control" value="5000000"/>
                        <input type="file" name="image_upload" class="form-control" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="activity" class="form-control" placeholder="Activity"
                               value="<?php if (this_form('submit_gimage')) {
                                   echo $_SESSION['activity'];
                               } ?>" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="place" class="form-control" placeholder="Place"
                               value="<?php if (this_form('submit_gimage')) {
                                   echo $_SESSION['place'];
                               } ?>" required/>
                    </div>

                    <div class="row mt-2 mx-5 float-right">
                        <div class="form-check">
                            <input type="hidden" name="visible" value="0"/>
                            <input type="checkbox" class="form-check-input" name="visible" id="visibility-check"
                                   value="1" <?php if (this_form('submit_gimage') && $_SESSION['visible'] == "1") {
                                echo "checked";
                            } ?>/>
                            <label class="form-check-label" for="visibility-check">Published</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" name="submit_gimage">Upload Image</button>
                </div>
            </div>
        </form>
    </div>
</div>
