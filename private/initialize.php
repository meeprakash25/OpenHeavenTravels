<?php require_once('session.php');
	
	ob_start();
	
	define("PRIVATE_PATH", dirname(__FILE__));
	define("PROJECT_PATH", dirname(PRIVATE_PATH));
	define("PUBLIC_PATH", PROJECT_PATH . '/public');
	define("SHARED_PATH", PRIVATE_PATH . '/shared');
	
	$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
	$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
	define("WWW_ROOT", $doc_root);
	
	require_once('functions.php');
	require_once('database.php');
	require_once('query_functions.php');
	require_once('validation_functions.php');
	require_once('auth_functions.php');
	
	$db = db_connect();
	
	$allowed_tags = '<div><img><h1><h2><h3><h4><h5><h6><p><br><strong><em><ul><li><table><th><td><tr><thead><tbody><a><i><b>';

