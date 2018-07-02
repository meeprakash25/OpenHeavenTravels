<?php require_once('../../private/initialize.php'); ?>
<?php
$errors = [];
$username = '';
$password = '';
if (is_post_request()) {
   $username = $_POST['username'] ?? '';
   $password = $_POST['password'] ?? '';
   global $errors;
   // validations
   if (is_blank($username)) {
      $errors[] = "Username cannot be blank";
   }
   if (is_blank($password)) {
      $errors[] = "Password cannot be blank";
   }

   // if there were no errors try to login
   if (empty($errors)) {
      // using single variable
      $login_failure_msg = "Username Password don't match";
      $admin = find_admin_by_username($username);
      if ($admin) {
         if (password_verify($password, $admin['hashed_password'])) {
            // password matches
            log_in_admin($admin);
            redirect_to(url_for('/admin/index.php'));
         } else {
            //  password matches, username found but passwords dont match
            $errors[] = $login_failure_msg;
         }
      } else {
         // no username found
         $errors[] = $login_failure_msg;
      }
   }


}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo url_for('images/homepage_assets/icons/android-icon-192x192.png'); ?>">

    <title>Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo url_for('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>">

    <!-- Custom styles for this template -->
    <link href="<?php echo url_for('stylesheets/login.css" rel="stylesheet" type="text/css'); ?>">
</head>

<body class="text-center body">

<form class="form-signin" action="<?php echo url_for('/admin/login.php') ?>" method="post">
    <div class="erros">
       <?php echo display_info(info()); ?>
       <?php errors(); ?>
       <?php echo display_errors($errors); ?>
    </div>
    <img class="mb-4" src="<?php echo url_for('images/homepage_assets/icons/android-icon-192x192.png'); ?>" alt="" width="72"
         height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" value="<?php echo h($username); ?>"
           autofocus required>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <a href="<?php echo url_for('/admin/forgot_password/send_mail.php'); ?>">Forgot username or password?</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2018, Open Heaven Travels and Trecks</p>
</form>


<script src="<?php echo url_for('vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo url_for('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>