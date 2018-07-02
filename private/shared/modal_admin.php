<!-- ADMIN MODAL -->
<form action="<?php echo url_for('/admin/admins/create.php'); ?>" method="post">
  <div class="modal fade" id="addAdminModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Add Admin</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- display errors -->
          <div class="errors px-3">
            <?php if (this_form('submit_admin')) { ?>
            <?php errors(); ?>
            <?php echo display_errors($errors); ?>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php if (this_form('submit_admin')) { echo $_SESSION['username'];} ?>" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php if (this_form('submit_admin')) { echo $_SESSION['email'];} ?>" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm-password" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning" name="submit_admin">Add Admin</button>
        </div>
      </div>
    </div>
  </div>
</form>
