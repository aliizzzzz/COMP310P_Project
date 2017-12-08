<?php


    $errors = array();

    function fieldname_as_text ($fieldname) {
        $fieldname = str_replace("_", " ", $fieldname);
        $fieldname = ucfirst($fieldname);
        return $fieldname;
    }

    function has_presence($value) {
	return isset($value) && $value !== "";
    }

    function validate_presence ($required_fields) {
    global $errors;
        foreach($required_fields as $field) {
        $input = trim($_POST[$field]);
            if (!has_presence($input)) {
                $errors[$field] = fieldname_as_text($field) . " can't be blank";
            }
        }
    }

    function has_max_length($value, $max) {
	return strlen($value) <= $max;
    }

    function validate_max_length ($fields_with_max_lengths) {
	global $errors;
        foreach($fields_with_max_lengths as $field => $max) {
        $input = trim($_POST[$field]);
            if (!has_max_length($input, $max)) {
            $errors[$field] = fieldname_as_text($field) . " is too long";
            }
        }
    }

    function display_form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}

    function mysql_prep($string) {
        global $connection;

        $escaped_string = mysqli_real_escape_string($connection, $string);
        return $escaped_string;
    }


    function redirect_to ($new_location) {
        header("Location: " . $new_location);
        exit;
    }

    function confirm_query($result_set) {
        if (!$result_set) {
            die("Database query failed!");
        }
    }

    function logged_in() {
		return isset($_SESSION['admin_id']);
	}

    function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to ("login.php");
		}
	}

?>
