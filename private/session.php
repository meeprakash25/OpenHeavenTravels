<?php
	session_start();
	$errors = [];
	$info = '';
	
	function errors() {
		global $errors;
		if (isset($_SESSION["errors"])) {
			// global $errors;
			$errors = $_SESSION["errors"];
			//display only once, dissappears on reload
			$_SESSION["errors"] = null;
			
		}
	}
	
	function info() {
		if (isset($_SESSION["info"])) {
			// global $infos;
			$info = $_SESSION["info"];
			//display only once, dissappears on reload
			$_SESSION["info"] = null;
			return $info;
		}
	}
	
	function this_form($form = '') {
		if ((isset($_SESSION['form'])) && ($_SESSION['form'] === $form)) {
			return true;
		} else {
			return false;
		}
	}

?>
