<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/password.php"); ?>

<?php

$username = "";

// Process form
if (isset($_POST["submit"])) {

    // Form validation
    $required_fieds = array("email", "password");
    validate_presence($required_fieds);
}

?>


<?php include("includes/header.php");?>
<div id="main">
    <div id="container">

        <div class="page">
            <h3>Log In</h3>
            <input type="email" name="email" placeholder="Email"><br/>
            <input type="password" name="password" placeholder="Password"><br/>
            <input type="submit" name="submit" value="Log In">
        </div>
        <div class="page">
            <h3>Not a member yet? Register <a href="register.php">here</a></h3>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>
