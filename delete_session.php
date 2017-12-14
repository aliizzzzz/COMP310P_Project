<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in() ?>


<?php include("includes/header.php");?>
<div id="main">
    <div id="container">
        <?php
        if (isset($_GET["session_id"])) {
            delete_session($_SESSION["user_id"],$_GET["session_id"]);

            $output  = "<h2 id=\"booked_message\">Your session has been canceled!</h2>";
            echo $output;
        } else {
            redirect_to(create_url("index.php"));
        }
        ?>
    </div>
</div>
<?php include("includes/footer.php");?>
