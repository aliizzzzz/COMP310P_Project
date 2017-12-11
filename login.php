<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/password.php"); ?>

<?php
if (logged_in()){
    redirect_to("index.php?");
}

$email = "";

// Process form
if (isset($_POST["submit"])) {

    // Form validation
    $required_fieds = array("email", "password");
    validate_presence($required_fieds);

    // Login if no errors
    if(empty($errors)) {

        $email      = $_POST["email"];
        $password   = $_POST["password"];

        $found_user = verify_login($email, $password);

        if($found_user) {
            //Mark user as logged in
            $_SESSION["user_id"]    = $found_user["id"];
            $_GET["first_name"] = $_SESSION["first_name"] = $found_user["first_name"];
            $_SESSION["email"]      = $found_user["email"];
            redirect_to("index.php?first_name={$found_user["first_name"]}");

        } else {
            // Log in failed
            $_SESSION["message"] = "Incorrect email/password; try again!";
        }


    } else {
        $email      = $_POST["email"];
    }
} else {
    // This is probably a GET request
}

?>

<?php include("includes/header.php");?>
<div id="main">
    <div id="container">
        <div class="page">
            <?php echo message(); ?>
            <form action="login.php" method="post">
                <h3>Log In</h3>
                <input type="email" name="email" value="<?php echo htmlentities($email); ?>" placeholder="Email"><br/>
                <input type="password" name="password" value ="" placeholder="Password"><br/>
                <input type="submit" name="submit" value="Log In">
            </form>
        </div>
        <div class="page">
            <h3>Not a member yet? Register <a href="register.php">here</a></h3>
            <?php echo display_form_errors($errors); ?>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>
