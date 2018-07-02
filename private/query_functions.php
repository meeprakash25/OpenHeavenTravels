<?php

//	insert update delete and validate for all tables
function validate_fields($attribute, $fields) {
   global $errors;

   //		input form values validation
   $discard_fields = array('type', 'size', 'filename', 'visible', 'overview', 'itinenarary', 'cost_info', 'gallery', 'highlights', 'equipments'); // do not check for these fields

   foreach ($fields as $field) {

      //			removes underscores if any
      if (preg_match('/^[a-z]+_[a-z]+$/i', $field)) {
         $clean_field = fieldname_as_text($field);
      } else {
         $clean_field = $field;
      }

      if (in_array($field, $discard_fields)) {
         continue;
      }
      if (is_blank($attribute[$field])) {

         $errors[] = ucfirst("$clean_field cannot be blank");
      } elseif (isset($attribute[$field])) {
         if (!has_length($attribute[$field], ['min' => 0, 'max' => 255])) {
            $errors[] = ucfirst("$clean_field can only be 255 characters");
         }
      }
   }

   // position
   if ($attribute['position'] === 'Position') {
      $errors[] = "Please select a position";
   } else {
      // Make sure we are working with an integer
      $position_int = (int)$attribute['position'];
      if ($position_int <= 0) {
         $errors[] = "Position must be greater than zero";
      }
      if ($position_int > 999) {
         $errors[] = "Position must be less than 999";
      }
   }

   // visible
   // Make sure we are working with a string
   $visible_str = (string)$attribute['visible'];
   if (!has_inclusion_of($visible_str, ["0", "1"])) {
      $errors[] = "Visible must be true or false";
   }
}

function validate_file($file, $target_dir) {
   global $errors;

   // http://www.php.net/manual/en/features.file-upload.errors.php
   $upload_errors = array(UPLOAD_ERR_OK => "No errors.", UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize = 10 mb", UPLOAD_ERR_FORM_SIZE => "Image size cannot be larger than 5 mb", UPLOAD_ERR_PARTIAL => "Partial upload", UPLOAD_ERR_NO_FILE => "No file", UPLOAD_ERR_NO_TMP_DIR => "No temporary directory", UPLOAD_ERR_CANT_WRITE => "Can't write to disk", UPLOAD_ERR_EXTENSION => "File upload stopped by extension");

   $allowed = array("image/jpeg", "image/gif", "image/png");

   $temp_path = $file['tmp_name'];
   // $tmp_file = $file['image_upload']['tmp_name'];
   $target_file = basename($file['name']);
   $target_path = "{$target_dir}/{$target_file}";

   // Perform error checking on the file parameters
   if (!$file || empty($file) || !is_array($file)) {
      // error: nothing uploaded or wrong argument usage
      $errors[] = "Choose an image to upload.";
   } elseif ($file['error'] != 0) {
      // error: report what PHP says went wrong
      $errors[] = $upload_errors[$file['error']];
   } elseif (!in_array($file['type'], $allowed)) {
      $errors[] = 'Only jpg, gif, and png files are allowed';
   } else {

      // Make sure a file doesn't already exist in the target location
      if (file_exists($target_path)) {
         $errors[] = "The file {$target_file} already exists";
      }

      //				if errors are empty move the file to the target path
      if (empty($errors)) {
         // Attempt to move the file
         if (move_uploaded_file($temp_path, $target_path)) {
            // Success
            // We are done with temp_path, the file isn't there anymore
            unset($temp_path);
         } else {
            // File was not moved.
            $errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
         }
      }
   }
}

function insert($table_name, $r_attributes, $file = '', $target_dir = '') {
   global $db, $errors;
   $required_db_fields = [];
   $attributes = [];
   $clean_attributes = [];

   $image_fields = ['id', 'position', 'visible', 'filename', 'type', 'size', 'caption', 'activity', 'place'];
   $tour_fields = ['position', 'visible', 'destination', 'tour_name', 'activities', 'tour_duration', 'tour_grade', 'seasons', 'group_size', 'altitude', 'accommodation', 'transport', 'overview', 'itinenarary', 'cost_info', 'gallery'];
   $trek_fields = ['trip_duration', 'trek_duration', 'start_end_place', 'trek_name', 'trek_type', 'trek_grade', 'seasons', 'group_size', 'altitude', 'highlights', 'walking_hours', 'cost', 'overview', 'itinenarary', 'cost_info', 'equipments', 'gallery'];
   $testimonial_fields = ['position', 'visible', 'quote', 'footer'];
   $all_db_fields = array_unique(array_merge($image_fields, $tour_fields, $trek_fields, $testimonial_fields));

   // $attributes will only contain fields from the array $db_fields that are set
   foreach ($all_db_fields as $field) {
      if (isset($r_attributes[$field])) {
         $required_db_fields[] = $field;
         $attributes[$field] = $r_attributes[$field];
      }
   }

   //		fields validation
   validate_fields($attributes, $required_db_fields);
   if (!empty($file) && empty($errors)) {
      validate_file($file, $target_dir);
   }

   if (!empty($errors)) {
      return false;
   }

   // - escape all values to prevent SQL injection
   foreach ($attributes as $key => $value) {
      $clean_attributes[$key] = db_escape($db, $value);
   }

   // rearrange the positions in case of insert
   shift_positions($table_name, 0, $clean_attributes['position']);

   $sql = "INSERT INTO " . $table_name . " (";
   $sql .= join(", ", array_keys($clean_attributes));
   $sql .= ") VALUES ('";
   $sql .= join("', '", array_values($clean_attributes));
   $sql .= "')";

   echo $sql;

   $result = mysqli_query($db, $sql);
   // For INSERT statements, $result is true/false
   if ($result) {
      return true;
   } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }
}

function update($table_name, $r_attributes) {
   global $db, $errors;
   $required_db_fields = array();
   $attributes = array();
   $clean_attributes = array();
   $attribute_pairs = array();
   $current_id = $r_attributes['id'];
   $current_position = $r_attributes['position'];

   $image_fields = ['id', 'position', 'visible', 'filename', 'type', 'size', 'caption', 'activity', 'place'];
   $tour_fields = ['id', 'position', 'visible', 'destination', 'tour_name', 'activities', 'tour_duration', 'tour_grade', 'seasons', 'group_size', 'altitude', 'accommodation', 'transport', 'overview', 'itinenarary', 'cost_info', 'gallery'];
   $trek_fields = ['id', 'position', 'visible', 'trip_duration', 'trek_duration', 'start_end_place', 'trek_name', 'trek_type', 'trek_grade', 'seasons', 'group_size', 'altitude', 'highlights', 'walking_hours', 'cost', 'overview', 'itinenarary', 'cost_info', 'equipments', 'gallery'];
   $testimonial_fields = ['id', 'position', 'visible', 'quote', 'footer'];
   $all_db_fields = array_unique(array_merge($image_fields, $tour_fields, $trek_fields, $testimonial_fields));

   // $attributes will only contain fields from the array $db_fields that are set
   foreach ($all_db_fields as $field) {
      if (isset($r_attributes[$field])) {
         $required_db_fields[] = $field;
         $attributes[$field] = $r_attributes[$field];
      }
   }

   //		fields validation
   validate_fields($attributes, $required_db_fields);
   if (!empty($errors)) {
      return false;
   }


   // - escape all values to prevent SQL injection
   foreach ($attributes as $key => $value) {
      $clean_attributes[$key] = db_escape($db, $value);
   }

   // - UPDATE table SET key='value', key='value' WHERE condition
   // - single-quotes around all values
   foreach ($clean_attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='$value'";
   }

   // rearrange the positions in case of position change
   $old_image = find_image_by_id($table_name, $r_attributes['id']);
   $old_position = $old_image['position'];
   shift_positions($table_name, $old_position, $current_position, $current_id);

   //		insert into table
   $sql = "UPDATE " . $table_name . " SET ";
   $sql .= join(", ", $attribute_pairs);
   $sql .= " WHERE id=" . db_escape($db, $current_id);

   $result = mysqli_query($db, $sql);
   // For UPDATE statements, $result is true/false
   if ($result) {
      return true;
   } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }

}

function delete($table_name, $id, $target_path = '') {
   global $db;

   $old_image = find_image_by_id($table_name, $id);
   $old_position = $old_image['position'];
   shift_positions($table_name, $old_position, 0, $id);

   $sql = "DELETE FROM $table_name ";
   $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
   $sql .= "LIMIT 1";
   $result = mysqli_query($db, $sql);

   // For DELETE statements, $result is true/false
   if ($result) {
      if (!empty($target_path)) {
         // if it is a file then unlink the file too
         return unlink($target_path) ? true : false;
      } else {
         return true;
      }
   } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }
}

// SLIDER IMAGE
function find_all_images($table_name, $options = []) {
   global $db;
   $visible = $options['visible'] ?? false;
   $sql = "SELECT * FROM $table_name ";
   if ($visible) {
      $sql .= "WHERE visible = true ";
   }
   $sql .= "ORDER BY position ASC";
   //echo $sql;
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   return $result;
}

function count_all_images($table_name) {
   $image_set = find_all_images($table_name);
   $image_count = mysqli_num_rows($image_set);
   mysqli_free_result($image_set);
   return $image_count;
}

function find_image_by_id($table_name, $id, $options = []) {
   global $db;
   $visible = $options['visible'] ?? false;
   $sql = "SELECT * FROM $table_name ";
   $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
   if ($visible) {
      $sql .= "AND visible = true";
   }
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   $image = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $image; // returns an assoc. array
}

// ABOUT SECTION
function fetch_about($options = []) {
   global $db;
   $visible = $options['visible'] ?? false;
   $sql = "SELECT * FROM about ";
   if ($visible) {
      $sql .= "WHERE visible = true ";
   }
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   return $result;
}

function validate_about($about) {
   global $errors;

   // head
   if (is_blank($about['head'])) {
      $errors[] = "Heading cannot be blank";
   } elseif (!has_length($about['head'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Heading must be between 2 and 255 characters";
   }

   // body
   if (is_blank($about['body'])) {
      $errors[] = "Body cannot be blank";
   }

   // visible
   // Make sure we are working with a string
   $visible_str = (string)$about['visible'];
   if (!has_inclusion_of($visible_str, ["0", "1"])) {
      $errors[] = "Visible must be true or false";
   }
   return $errors;
}

function update_about($about) {
   global $db, $errors;

   $errors = validate_about($about);
   if (!empty($errors)) {
      return false;
   }

   $sql = "UPDATE about SET ";
   $sql .= "visible='" . db_escape($db, $about['visible']) . "',";
   $sql .= "head='" . db_escape($db, $about['head']) . "',";
   $sql .= "body='" . db_escape($db, $about['body']) . "' ";
   $sql .= "WHERE id='" . db_escape($db, 1) . "'";

   $result = mysqli_query($db, $sql);
   // For UPDATE statements, $result is true/false
   if ($result) {
      return true;
   } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }

}

// TOURS
function find_all_tours($options = []) {
   global $db;
   $visible = $options['visible'] ?? false;
   $sql = "SELECT * FROM tours ";
   if ($visible) {
      $sql .= "WHERE visible = true ";
   }
   $sql .= "ORDER BY position ASC";
   //echo $sql;
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   return $result;
}

function count_all_tours() {
   $tour_set = find_all_tours();
   $tour_count = mysqli_num_rows($tour_set);
   mysqli_free_result($tour_set);
   return $tour_count;
}

function find_tour_by_id($id, $options = []) {
   global $db;
   $visible = $options['visible'] ?? false;
   $sql = "SELECT * FROM tours ";
   $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
   if ($visible) {
      $sql .= "AND visible = true";
   }
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   $tour = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $tour; // returns an assoc. array
}

// TREKS
function find_all_treks($options = []) {
   global $db;
   $visible = $options['visible'] ?? false;
   $sql = "SELECT * FROM treks ";
   if ($visible) {
      $sql .= "WHERE visible = true ";
   }
   $sql .= "ORDER BY position ASC";
   //echo $sql;
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   return $result;
}

function count_all_treks() {
   $trek_set = find_all_treks();
   $trek_count = mysqli_num_rows($trek_set);
   mysqli_free_result($trek_set);
   return $trek_count;
}

function find_trek_by_id($id, $options = []) {
   global $db;
   $visible = $options['visible'] ?? false;
   $sql = "SELECT * FROM treks ";
   $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
   if ($visible) {
      $sql .= "AND visible = true";
   }
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   $trek = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $trek; // returns an assoc. array
}

// TESTIMONIALS
function find_all_testimonials($options = []) {
   global $db;
   $visible = $options['visible'] ?? false;
   $sql = "SELECT * FROM testimonials ";
   if ($visible) {
      $sql .= "WHERE visible = true ";
   }
   $sql .= "ORDER BY position ASC";
   //echo $sql;
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   return $result;
}

function count_all_testimonials() {
   $testimonial_set = find_all_testimonials();
   $testimonial_count = mysqli_num_rows($testimonial_set);
   mysqli_free_result($testimonial_set);
   return $testimonial_count;
}

function find_testimonial_by_id($id) {
   global $db;

   $sql = "SELECT * FROM testimonials ";
   $sql .= "WHERE id='" . db_escape($db, $id) . "'";
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   $testimonial = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $testimonial; // returns an assoc. array
}

// ADMINS
function find_all_admins() {
   global $db;

   $sql = "SELECT * FROM admins ";
   $sql .= "ORDER BY timestamp ASC";
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   return $result;
}

function count_all_admins() {
   $admin_set = find_all_admins();
   $admin_count = mysqli_num_rows($admin_set);
   mysqli_free_result($admin_set);
   return $admin_count;
}

function find_admin_by_id($id) {
   global $db;

   $sql = "SELECT * FROM admins ";
   $sql .= "WHERE id='" . db_escape($db, $id) . "'";
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   $admin = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $admin; // returns an assoc. array
}

function find_admin_by_username($username) {
   global $db;

   $sql = "SELECT * FROM admins ";
   $sql .= "WHERE username='" . db_escape($db, $username) . "'";
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   $admin = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $admin; // returns an assoc. array
}

function find_admin_by_email($email) {
   global $db;

   $sql = "SELECT * FROM admins ";
   $sql .= "WHERE email='" . db_escape($db, $email) . "'";
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   $admin = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $admin; // returns an assoc. array
}

function find_admin_by_hashed_password($hashed_password) {
   global $db;

   $sql = "SELECT * FROM admins ";
   $sql .= "WHERE hashed_password='" . db_escape($db, $hashed_password) . "'";
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   $admin = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $admin; // returns an assoc. array
}

function find_admin_by_token($token) {
   global $db;

   $sql = "SELECT * FROM admins ";
   $sql .= "WHERE token='" . db_escape($db, $token) . "'";
   $result = mysqli_query($db, $sql);
   confirm_result_set($result);
   $admin = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $admin; // returns an assoc. array
}

function validate_admin($admin, $options = []) {
   global $errors;
   $password_required = $options['password_required'] ?? true;
   // username
   if (is_blank($admin['username'])) {
      $errors[] = "Username cannot be blank";
   } elseif (!has_length($admin['username'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Username too short";
   } elseif (!has_unique_username($admin['username'], $admin['id'])) {
      $errors[] = "Username already exists";
   } elseif (!has_unique_email($admin['email'], $admin['id'])) {
      $errors[] = "Email already exists";
   }
   // email
   if (is_blank($admin['email'])) {
      $errors[] = "Email cannot be blank";
   } elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email not valid";
   } elseif (!has_length($admin['email'], ['min' => 7, 'max' => 255])) {
      $errors[] = "Email must be at least 7 characters";
   }
   if ($password_required) {
      if (is_blank($admin['password'])) {
         $errors[] = "Password cannot be blank";
      } elseif (!has_length($admin['password'], array('min' => 6))) {
         $errors[] = "Password must contain at least 6 characters";
      } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
         $errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $admin['password'])) {
         $errors[] = "Password must contain at least 1 lowercase letter";
      }
      // elseif (!preg_match('/[0-9]/', $admin['password'])) {
      //   $errors[] = "Password must contain at least 1 number";
      // }
      // elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
      //   $errors[] = "Password must contain at least 1 symbol";
      // }

      if (is_blank($admin['confirm_password'])) {
         $errors[] = "Confirm password cannot be blank";
      } elseif ($admin['password'] !== $admin['confirm_password']) {
         $errors[] = "Passwords don't match";
      }
   }
   return $errors;
}

function insert_admin($admin) {
   global $db, $errors;

   $errors = validate_admin($admin);
   if (!empty($errors)) {
      return false;
   }

   $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

   $sql = "INSERT INTO admins ";
   $sql .= "(username, email, hashed_password, token) ";
   $sql .= "VALUES (";
   $sql .= "'" . db_escape($db, $admin['username']) . "',";
   $sql .= "'" . db_escape($db, $admin['email']) . "',";
   $sql .= "'" . db_escape($db, $hashed_password) . "',";
   $sql .= "'" . db_escape($db, $admin['token']) . "'";
   $sql .= ")";
   $result = mysqli_query($db, $sql);
   // For INSERT statements, $result is true/false
   if ($result) {
      return true;
   } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }
}

function update_admin($admin) {
   global $db, $errors;

   $password_sent = !is_blank($admin['password']);

   $errors = validate_admin($admin, ['password_required' => $password_sent]);
   if (!empty($errors)) {
      return false;
   }

   $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);
   $sql = "UPDATE admins SET ";
   $sql .= "username='" . db_escape($db, $admin['username']) . "',";
   if ($password_sent) {
      $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "',";
   }
   $sql .= "email='" . db_escape($db, $admin['email']) . "' ";
   $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
   $sql .= "LIMIT 1";

   $result = mysqli_query($db, $sql);
   // For UPDATE statements, $result is true/false
   if ($result) {
      return true;
   } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }

}

function delete_admin($id) {
   global $db;

   $sql = "DELETE FROM admins ";
   $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
   $sql .= "LIMIT 1";
   $result = mysqli_query($db, $sql);

   // For DELETE statements, $result is true/false
   if ($result) {
      return true;
   } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }
}

//	arrange positions on insert, update and delete
function shift_positions($table_name, $start_pos, $end_pos, $current_id = 0) {
   global $db;

   if ($start_pos == $end_pos) {
      return;
   }

   $sql = "UPDATE $table_name ";
   if ($start_pos == 0) {
      // new item, +1 to items greater than $end_pos
      $sql .= "SET position = position + 1 ";
      $sql .= "WHERE position >= '" . db_escape($db, $end_pos) . "' ";
   } elseif ($end_pos == 0) {
      // delete item, -1 from items greater than $start_pos
      $sql .= "SET position = position - 1 ";
      $sql .= "WHERE position > '" . db_escape($db, $start_pos) . "' ";
   } elseif ($start_pos < $end_pos) {
      // move later, -1 from items between (including $end_pos)
      $sql .= "SET position = position - 1 ";
      $sql .= "WHERE position > '" . db_escape($db, $start_pos) . "' ";
      $sql .= "AND position <= '" . db_escape($db, $end_pos) . "' ";
   } elseif ($start_pos > $end_pos) {
      // move earlier, +1 to items between (including $end_pos)
      $sql .= "SET position = position + 1 ";
      $sql .= "WHERE position >= '" . db_escape($db, $end_pos) . "' ";
      $sql .= "AND position < '" . db_escape($db, $start_pos) . "' ";
   }
   // Exclude the current_id in the SQL WHERE clause
   $sql .= "AND id != '" . db_escape($db, $current_id) . "' ";

   $result = mysqli_query($db, $sql);
   // For UPDATE statements, $result is true/false
   if ($result) {
      return true;
   } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }
}

?>
