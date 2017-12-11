<?php
// AUTHOR: Alireza MEGHDADI, includes adaptations from LYNDA course PHP AND MYSQL ESSENTIAL TRAINING by KEVIN SKOGLUND.

    $errors = array();

    // Fetching data from database
    function print_user_info($user_id) {
        global $connection;

        $query  = "SELECT u.first_name, u.last_name, ";
        $query .= "u.email, p.phone_number, ";
        $query .= "p.house_number, p.street_name, ";
        $query .= "p.city, p.postcode FROM ";
        $query .= "personal_details p JOIN users u ";
        $query .= "ON p.postcode = u.postcode ";
        $query .= "WHERE u.id = '{$user_id}'";

        $user_info = mysqli_query($connection, $query);
        confirm_query($user_info);
        return $user_info;

        $user_info_array = mysqli_fetch_assoc($user_info);
        $output = "<div id=\"user_info\">\n";
            foreach ($user_info_array as $field => $info) {
                $output .= "<p>" . fieldname_as_text($field);
                $output .= "</p>";
                $output .= "<p id=\"info\">" . $info;
                $output .= "</p>\n";
            }
            $output .= "</div>\n";
        echo $output;
    }

    function print_teacher_info() {
        global $connection;

        $query  = "SELECT t.first_name, t.last_name, t.email, ";
        $query .= "c.course_name as course FROM teachers t JOIN courses c ";
        $query .= "ON t.id = c.teacher_id";

        $teacher_set = mysqli_query($connection, $query);
        confirm_query($teacher_set);

        $teacher_info_array = mysqli_fetch_assoc($teacher_set);
        $output  = "<tr>";
        $output .= "<th>Teacher</th><th>Email</th><th>Course Taught</th>";
        $output .= "</tr>";

        while($teacher = mysqli_fetch_assoc($teacher_set)) {
            $output .="<tr>";
                foreach($teacher as $field => $data){
                    $output .= "<td>" . $data . "</td>";
                }
            $output .="</tr>";

        }
        echo $output;
    }

    function fetch_session_info() {
        global $connection;

        $query  = "SELECT co.course_name as course, s.level, c.cost, ";
        $query .= "s.date FROM sessions s JOIN courses co ";
        $query .= "ON co.id = s.course_id JOIN cost c ON ";
        $query .= "s.level = c.level ORDER BY s.date ASC";

        $session_info = mysqli_query($connection, $query);
        confirm_query($session_info);
        return $session_info;
    }

    function print_sessions_table_headings(){
        $session_array = mysqli_fetch_assoc(fetch_session_info());

        $output  = "<tr>";
        foreach($session_array as $field => $data){
            $output .= "<th>" . fieldname_as_text($field) . "</th>";
        }
        $output .= "</tr>";
        echo $output;
    }

    function print_sessions_table_info() {
        $sesson_set = fetch_session_info();
        while($session = mysqli_fetch_assoc($sesson_set)){
            $output  = "<tr>";
                foreach($session as $field => $data){
                    if($field == "date"){
                    $output .= "<td>" . date_format(date_create($data), "Y-M-d") . "</td>";
                    } else {
                    $output .= "<td>" . $data . "</td>";
                    }
                }
            $output .= "</tr>";
            echo $output;
        }
    }

    // Form validation functions
    function fieldname_as_text($fieldname) {
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

    function check_user_exists($postcode){
        global $connection;
        global $errors;
        $db_compatible_postcode = strtoupper(str_replace(" ", "", mysql_prep($postcode)));
        $query  = "SELECT postcode FROM users ";
        $query .= "WHERE postcode = '{$db_compatible_postcode}'";

        $result = mysqli_query($connection, $query);

        $exitin_postcode = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            $errors["user"] = "User already exists";
        }
        mysqli_free_result($result);
    }

    // Display Form errors
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

    // Log in functions
    function find_user_by_email($email) {

        global $connection;
		$safe_email = mysqli_real_escape_string($connection, $email);

		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE email = '{$safe_email}' ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}

    function verify_login($email, $password) {

        // Find user
		$user = find_user_by_email($email);
		if ($user) {

			if (password_verify($password,$user["hashed_password"])) {
				return $user;
			} else {

				// Password does not match
				return false;
			}
		} else {
			// User not found
			return false;
		}
	}

    function logged_in() {
		return isset($_SESSION['user_id']);
	}

    function create_url($path) {
        if(isset($_SESSION["user_id"])){
            $url = $path . '?first_name=' . urlencode($_SESSION["first_name"]);
            return $url;
        } else
            $url = "";
            return $url;
        }

    function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to ("login.php");
		}
	}

?>
