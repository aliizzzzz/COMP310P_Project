<?php

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

//    function encrypt_pass($password) {
//        // function adapted from Lynda course PHP with MYSQL Essential Training (2013) by Kevin Skoglund
//
//        $hash_format = "$2y$10$";   // apply Blowfish algorithm 10 times
//        $salt_length = 22; 					// Blowfish salts should be 22-characters or more
//        $salt = generate_salt($salt_length);
//        $format_and_salt = $hash_format . $salt;
//        $hash = crypt($password, $format_and_salt);
//        return $hash;
//    }
//
//    function generate_salt($length) {
//        // function adapted from Lynda course PHP with MYSQL Essential Training (2013) by Kevin Skoglund
//
//        $unique_random_string = md5(uniqid(mt_rand(), true));
//
//		// Valid characters for a salt are [a-zA-Z0-9./]
//        $base64_string = base64_encode($unique_random_string);
//
//		// But not '+' which is valid in base64 encoding
//        $modified_base64_string = str_replace('+', '.', $base64_string);
//
//		// Truncate string to the correct length
//        $salt = substr($modified_base64_string, 0, $length);
//
//		return $salt;
//    }
//
//    function check_password($password, $existing_hash) {
//        // function adapted from Lynda course PHP with MYSQL Essential Training (2013) by Kevin Skoglund
//        $hash = crypt($password, $existing_hash);
//        if ($hash === $existing_hash) {
//	    return true;
//        } else { return false; }
//
//    }


?>
