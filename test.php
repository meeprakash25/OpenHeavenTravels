<!DOCTYPE html>
<html>
<body>

<?php
	$arr = array('name' => 'Prakash', 'address' => 'Balkot', 'email' => 'a@gmail.com', 'phone' => '0943650517');
	echo "arr['name']: " . $arr['name'];
	echo "<br>";
	echo "<br>";
	echo "print_r(): ";
	print_r($arr);
	echo "<br>";
	echo "<br>";
	echo "var_dump(): ";
	var_dump($arr);
	
	echo "<br>";
	foreach ($arr as $key => $value) {
		$pairs[] = "{$value}='$key'";
	}
	
	$joint = "UPDATE [gallery] SET ";
	$joint .= join(", ", $pairs);
	echo $joint;
	echo "<br>";
	echo "<br>";
	
	print_r(array_keys($arr));
	echo "<br>";
	echo "<br>";
	$joint = join(", ", array_keys($arr));
	echo $joint;
	echo "<br>";
	echo "<br>";
	$joint = "INSERT INTO [table] (";
	$joint .= join(", ", array_keys($arr));
	$joint .= ") VALUES ('";
	$joint .= join("', '", array_values($arr));
	$joint .= "')";
	
	//	echo $joint;
	
	echo "<br>";
	echo "<br>";
	$all_db_fields = array('name');
	$image_fields = array('id', 'position', 'visible', 'activities', 'type', 'size', 'caption', 'activity', 'place');
	$tour_fields = array('position', 'visible', 'destination', 'tour_name', 'activities', 'tour_duration', 'tour_grade', 'seasons', 'group_size', 'altitude', 'accommodation', 'transport', 'overview', 'itinenarary', 'cost_info', 'gallery');
	
	print_r($image_fields);
	
	echo "<br>";
	echo "<br>";
	
	$all_db_fields = array_unique(array_merge($all_db_fields, $image_fields, $tour_fields));
	
	print_r(sizeof($all_db_fields));
	
	echo "<br>";
	echo "<br>";
	
	print_r(sizeof(array_unique($all_db_fields)));

	
	
	echo "<br>";
	echo "<br>";
	
	
	$str = 'foobar';
	if (preg_match('/^[a-z]+_[a-z]+$/i', $str)) {
		echo "contains _";
	} else {
		echo "doesnot contain _";
	}

?>


</body>
</html>