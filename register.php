<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/password.php"); ?>






<?php
// Process form
if(isset($_POST["submit"])) {


    // Form validation
    $required_fields = array("first_name", "email", "password", "postcode", "street_name", "phone_number");
    validate_presence($required_fields);

    $fields_with_max_length = array("first_name" => 15, "last_name" => 15, "email" => 40, "postcode" => 35, "city" => 20, "street_name" => 25, "house_number" => 4);
    validate_max_length ($fields_with_max_length);

    check_user_exists($_POST["postcode"]);

    if(empty($errors)) {

        // Prepare user input for submission
        $firstName      = mysql_prep(ucfirst($_POST["first_name"]));
        $lastName       = mysql_prep(ucfirst($_POST["last_name"]));
        $email          = mysql_prep($_POST["email"]);
        $password       = $_POST["password"];
        $hashed_pass    = password_hash($password, PASSWORD_BCRYPT);
        $postcode       = strtoupper(str_replace(" ", "", mysql_prep($_POST["postcode"])));
        $city           = mysql_prep(ucfirst($_POST["city"]));
        $streetName     = mysql_prep(ucwords($_POST["street_name"]));
        $houseNumber    = mysql_prep($_POST["house_number"]);
        $phoneNumber    = mysql_prep($_POST["phone_number"]);


        // Database query for 'personal_details' table;
        $query_personal_details  = "INSERT INTO personal_details ( ";
        $query_personal_details .= "postcode, city, ";
        $query_personal_details .= "street_name, house_number, ";
        $query_personal_details .= "phone_number) VALUES ( ";
        $query_personal_details .= "'{$postcode}', '{$city}', ";
        $query_personal_details .= "'{$streetName}', '{$houseNumber}', ";
        $query_personal_details .= "'{$phoneNumber}')";
        $result_personal_details = mysqli_query($connection, $query_personal_details);

        // Database query for 'users' table
        $query_users  = "INSERT INTO users ( ";
        $query_users .= "first_name, last_name, ";
        $query_users .= "email, hashed_password, ";
        $query_users .= "postcode) VALUES ( ";
        $query_users .= "'{$firstName}', '{$lastName}', ";
        $query_users .= "'{$email}', '{$hashed_pass}', ";
        $query_users .= "'{$postcode}')";
        $result_users = mysqli_query($connection, $query_users);


        // Check if query successful
        if($result_users && $result_personal_details) {
            // Success
            $_SESSION["message"] = "Registration Successful!";
            redirect_to("login.php");
        } else {
            // Failed
            $_SESSION["message"] = "Registration Failed!";
        }
    } else {
        $firstName      = mysql_prep($_POST["first_name"]);
        $lastName       = mysql_prep($_POST["last_name"]);
        $email          = mysql_prep($_POST["email"]);
        $password       = $_POST["password"];
        $postcode       = mysql_prep($_POST["postcode"]);
        $city           = mysql_prep($_POST["city"]);
        $streetName     = mysql_prep($_POST["street_name"]);
        $houseNumber    = mysql_prep($_POST["house_number"]);
        $phoneNumber    = mysql_prep($_POST["phone_number"]);

    }
} else {
    // This is probably a GET request
        $firstName      = null;
        $lastName       = null;
        $email          = null;
        $password       = null;
        $postcode       = null;
        $city           = null;
        $streetName     = null;
        $houseNumber    = null;
        $phoneNumber    = null;
}

?>

<?php include("includes/header.php");?>

<div id="main">
    <div id="container">
        <div class="page">
            <?php echo message(); ?>
            <form action="register.php" method="post">
                <h3>Register</h3>
                <input type="text" name="first_name" value="<?php echo htmlentities($firstName)?>" placeholder="First Name*">
                <input type="text" name="last_name" value="<?php echo htmlentities($lastName); ?>" placeholder="Last Name"><br/>
                <input type="email" name="email" value="<?php echo htmlentities($email); ?>" placeholder="Email*">
                <input type="password" name="password" value="<?php echo htmlentities($password);?>" placeholder="Password*"><br/><br/>
                <input type="tel" name="phone_number" value="<?php echo htmlentities($phoneNumber); ?>" size="11" placeholder="Phone Number*"><br/>
                <input type="text" name="house_number" value="<?php echo htmlentities($houseNumber); ?>" placeholder="House Number"><br/>
                <input type="text" name="street_name" value="<?php echo htmlentities($streetName); ?>" placeholder="Street*"><br/>
                <input type="text" name="city" value="<?php echo htmlentities($city); ?>" placeholder="City"><br/>
                <input type="text" name="postcode" value="<?php echo htmlentities($postcode);?>" placeholder="Postcode*"><br/>
                <input type="submit" name="submit" value="Register">
            </form>
        </div>
        <div class="page">
        <?php echo display_form_errors($errors); ?>
        </div>
    </div>
</div>


<?php include("includes/footer.php");?>
