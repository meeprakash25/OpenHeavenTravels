<?php require_once('../../../private/initialize.php'); ?>

<?php
global $errors;
$current_password = '';
$new_password = '';
$confirm_password = '';
if (!isset($_GET['id'])) {
   redirect_to(url_for('/admin/admins/index.php'));
}
$id = $_GET['id'];
$current_admin = find_admin_by_id($id);
if ($current_admin['username'] != $_SESSION['user']) {
   redirect_to(url_for('/admin/admins/index.php'));
}
if (is_post_request()) {
   $current_password = $_POST['current_password'] ?? '';
   $new_password = $_POST['new_password'] ?? '';
   $confirm_password = $_POST['confirm_password'] ?? '';
   // validations
   if (is_blank($current_password)) {
      $errors[] = "Current password cannot be blank";
   }
   if (is_blank($new_password)) {
      $errors[] = "New password cannot be blank";
   }
   if (is_blank($confirm_password)) {
      $errors[] = "Confirm password cannot be blank";
   }
   // if there were no errors try update
   if (empty($errors)) {
      if (password_verify($current_password, $current_admin['hashed_password'])) {
         // process form request
         $admin = [];
         $admin['id'] = $id;
         $admin['username'] = $current_admin['username'];
         $admin['email'] = $current_admin['email'];
         $admin['password'] = $_POST['new_password'] ?? '';
         $admin['confirm_password'] = $_POST['confirm_password'] ?? '';
         $token['token'] = '';

         $result = update_admin($admin);
         if ($result === true) {
            $_SESSION['info'] = "Password changed successfully";
            redirect_to(url_for('/admin/admins/index.php'));
         } else {
            // $errors = $result;
            // var_dump($errors);
            // reload the page with errors
         }
      } else {
         //  password matches, username found but passwords dont match
         $errors[] = "Password change failed";
      }
   }
}
$admin_count = count_all_admins();
?>

<?php $page_title = 'Change Password'; ?>

<?php include(SHARED_PATH . '/admin_header.php') ?>

    <header id="main-header" class="py-4 bg-warning text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>
                        Change Password
                    </h3>
                </div>
                <div class="col-md-4">
                   <?php
                   echo display_info(info());
                   ?>
                </div>
            </div>
        </div>
    </header>

    <!-- ACTIONS -->
    <section id="action" class="py-4 mb-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 pt-2 mr-auto">
                    <a href="<?php echo url_for('/admin/index.php'); ?>" class="btn btn-light btn-block">
                        <i class="fa fa-arrow-left"></i> Back To Dashboard
                    </a>
                </div>
                <div class="col-md-3 pt-2">
                    <a href="<?php echo url_for('/admin/admins/index.php'); ?>" class="btn btn-success btn-block">
                        <i class="fa fa-arrow-left"></i> Go Back
                    </a>
                </div>
                <div class="col-md-3 pt-2">
                    <a href="<?php echo url_for('/admin/logout.php'); ?>" class="btn btn-info btn-block">
                        <i class="fa fa-user-times"></i> Logout
                    </a>
                </div>
                <div class="col-md-3 pt-2">

                </div>
            </div>
        </div>
    </section>

    <!-- admins -->
    <!-- display errors -->
    <section id="abouts-and-activities">
        <div class="container pt-4">
            <div class="row">
                <div class="col">
                    <form action="<?php echo url_for('/admin/admins/password_change.php?id=' . h(u($id))) ?>" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h4>Change Password
                                    <small>User: <span class="text-muted"><?php echo h($current_admin['username']); ?></span></small>
                                </h4>
                            </div>
                            <!-- display errors -->
                            <div class="errors p-2">
                               <?php echo display_errors($errors); ?>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-around">

                                    <div class="col-lg-6 py-3 text-center">
                                        <div class="form-group">
                                            <input type="password" name="current_password" id="current_password" class="form-control"
                                                   placeholder="Current Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="new_password" id="new_password" class="form-control"
                                                   placeholder="New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm_password" id="confirm-password" class="form-control"
                                                   placeholder="Confirm Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-warning text-light" name="submit_password">Change Password
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

<?php include(SHARED_PATH . '/admin_footer.php') ?>