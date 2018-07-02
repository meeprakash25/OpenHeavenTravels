<?php require_once('../../../private/initialize.php'); ?>
<?php
	require_once("../../../private/shared/PHPMailer/src/PHPMailer.php");
	require_once("../../../private/shared/PHPMailer/src/SMTP.php");
	require_once("../../../private/shared/PHPMailer/src/Exception.php");
?>
<?php
	
	if (is_post_request()) {
		$email = $_POST['email'] ?? '';
		// validations
		if (is_blank($email)) {
			$errors[] = "Email cannot be blank";
		}
		
		// if there were no errors check if the user with the email exists in our database
		if (empty($errors)) {
			if (user_exists($email)) {
				$user = find_admin_by_email($email);
				$token = random_str(30);
				$url = url_for('admin/forgot_password/password_reset.php?token=' . $token);
				
				//				UPDATE ADMIN WITH GENERATED TOKEN
				$admin = [];
				$admin['id'] = $user['id'];
				$admin['username'] = $user['username'];
				$admin['email'] = $user['email'];
				$admin['password'] = $user['hashed_password'];
				$admin['confirm_password'] = $user['hashed_password'];
				$admin['token'] = $token;
				
				$result = update_admin($admin);
				if ($result === true) { // if database update is success
					//					send email
					//				PHP MAILER START
					$to_name = "{$user['username']}";
					$to = "{$user['email']}";
					$subject = "Request password reset";
					
					$message = "Your Username: <b>{$user['username']}</b> <br> Goto this link to reset your password <br> localhost/{$url}";
					$alt_message = "Your Username: {$user['username']} Goto following link to reset your password: localhost/{$url}";
					
					$message = wordwrap($message, 70);
					$from_name = "Openheaven Travels";
					$from = "mee.prakash25@gmail.com";
					
					$mail = new PHPMailer\PHPMailer\PHPMailer();
					$mail->IsSMTP(); // enable SMTP
					
					$mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
					$mail->Host = "smtp.gmail.com";
					$mail->SMTPSecure = "ssl"; // secure transfer enabled REQUIRED for Gmail
					$mail->Port = 465; // or 465 587
					$mail->SMTPAuth = true; // authentication enabled
					$mail->Username = "mee.prakash25@gmail.com";
					$mail->Password = "changed#654";
					
					$mail->SetFrom($from, $from_name);
					
					$mail->AddAddress($to, $to_name);
					
					$mail->IsHTML(true);
					
					$mail->Subject = $subject;
					$mail->Body = $message;
					$mail->AltBody = $alt_message;
					
					if (!$mail->Send()) {
						//					$_SESSION['info'] = "Mailer Error: " . $mail->ErrorInfo;
						$_SESSION['info'] = "Error! check your connection";
					} else {
						$_SESSION['info'] = "Check your email for further steps";
					}
				}
				
			} else { // if user doesnt exist
				$errors[] = "Email doesn't exist in our database";
			}
		} // end empty errors
		
	} //end of post request
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo url_for('images/homepage_assets/icons/android-icon-192x192.png'); ?>">
	
	<title>Confirm Email</title>
	
	<!-- Bootstrap core CSS -->
	<link href="<?php echo url_for('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>">
	
	<!-- Custom styles for this template -->
	<link href="<?php echo url_for('stylesheets/login.css" rel="stylesheet" type="text/css'); ?>">
</head>

<body class="text-center body">
<form class="form-signin" action="<?php echo url_for('/admin/forgot_password/send_mail.php') ?>" method="post">
	
	<div class="erros">
		<?php
			echo display_info(info());
		?>
		<?php errors(); ?>
		<?php echo display_errors($errors); ?>
	</div>
	<img class="mb-4" src="<?php echo url_for('images/homepage_assets/icons/android-icon-192x192.png'); ?>" alt="" width="72" height="72">
	<h1 class="h5 mb-1 font-weight-normal">Get a password reset link</h1>
	<p class="mb-3"> To get a password reset link, first confirm the email address you added to your account </p>
	<div class="form-group">
		<input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
	</div>
	<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit_reset_mail">Send</button>
	<p class="mt-5 mb-3 text-muted">&copy; 2018, Open Heaven Travels and Trecks</p>
</form>


<script src="<?php echo url_for('vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo url_for('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>