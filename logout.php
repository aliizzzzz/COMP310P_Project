<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
	// v1: simple logout
	// session_start();
	$_SESSION["user_id"]       = null;
	$_SESSION["first_name"]    = null;
    $_SESSION["email"]         = null;
    $_GET["first_name"]        = null;
	redirect_to("login.php");
?>
