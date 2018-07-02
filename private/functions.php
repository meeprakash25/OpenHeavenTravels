<?php
	
	function url_for($script_path) {
		// add the leading '/' if not present
		if ($script_path[0] != '/') {
			$script_path = "/" . $script_path;
		}
		return WWW_ROOT . $script_path;
	}
	
	function u($string = "") {
		return urlencode($string);
	}
	
	function raw_u($string = "") {
		return rawurlencode($string);
	}
	
	function h($string = "") {
		return htmlspecialchars($string);
	}
	
	function error_404() {
		header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
		exit();
	}
	
	function error_500() {
		header($_SERVER['SERVER_PROTOCOL'] . " 500 Internal Server Error");
		exit();
	}
	
	function redirect_to($location) {
		header("Location: " . $location);
		exit();
	}
	
	function is_post_request() {
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}
	
	function is_GET_request() {
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}
	
	function display_errors($errors = []) {
		$output = '';
		if (!empty($errors)) {
			$output .= "<div class=\"alert alert-danger alert-dismissible fade show\">";
			$output .= "<ul>";
			foreach ($errors as $error) {
				$output .= "<li>" . h($error) . "</li>";
			}
			$output .= "</ul>";
			$output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" >&times;</button>";
			$output .= "</div>";
		}
		return $output;
	}
	
	function display_info($info) {
		$output = '';
		if (!empty($info)) {
			$output .= "<div class=\"alert alert-info alert-dismissible text-center\" style=\" padding:5px; margin:3px\">";
			$output .= h($info);
			$output .= "<button  class=\"close\" data-dismiss=\"alert\" style=\" padding:2px;margin:2px\">&times;</button>";
			$output .= "</div>";
		}
		return $output;
	}
	
	
	// Returns a file size limit in bytes based on the PHP upload_max_filesize
	// and post_max_size
	//function file_upload_max_size()
	//{
	//    static $max_size = -1;
	//
	//    if ($max_size < 0) {
	//        // Start with post_max_size.
	//        $post_max_size = ini_get('post_max_size');
	//        if ($post_max_size > 0) {
	//            $max_size = $post_max_size;
	//        }
	//
	//        // If upload_max_size is less, then reduce. Except if upload_max_size is
	//        // zero, which indicates no limit.
	//        $upload_max = ini_get('upload_max_filesize');
	//        if ($upload_max > 0 && $upload_max < $max_size) {
	//            $max_size = $upload_max;
	//        }
	//    }
	//    return $max_size;
	//}
	
	function size_as_text($size) {
		if ($size < 1024) {
			return "{$size} bytes";
		} elseif ($size < 1048576) {
			$size_kb = round($size / 1024);
			return "{$size_kb} KB";
		} else {
			$size_mb = round($size / 1048576, 1);
			return "{$size_mb} MB";
		}
	}
	
	/**
	 * Generate a random string, using a cryptographically secure
	 * pseudorandom number generator (random_int)
	 *
	 * For PHP 7, random_int is a PHP core function
	 * For PHP 5.x, depends on https://github.com/paragonie/random_compat
	 *
	 * @param int    $length   How many characters do we want?
	 * @param string $keyspace A string of all possible characters
	 *                         to select from
	 *
	 * @return string
	 */
	function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
		$pieces = [];
		$max = mb_strlen($keyspace, '8bit') - 1;
		for ($i = 0; $i < $length; ++$i) {
			$pieces [] = $keyspace[random_int(0, $max)];
		}
		return implode('', $pieces);
	}

?>
