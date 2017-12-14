<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in() ?>


<?php include("includes/header.php");?>
<div id="main">
    <div id="container">
        <?php
        if (isset($_GET["session_id"])) {
            if (booking_exists($_GET["session_id"])) {
                echo display_form_errors($errors);
            } else {

            book_session($_SESSION["user_id"],$_GET["session_id"]);

            $output  = "<h2 id=\"booked_message\">Your spot has been booked!</h2>";
            echo $output;
            echo "<div class=\"page_container\">";
            echo "<div class=\"page\">";
            print_booked_session($_GET["session_id"]);
            echo "</div>";

            echo "<div class=\"page\">";
            print_teacher_info($_GET["session_id"]);
            echo "</div>";
            echo "</div>";
            }
        } else {
            redirect_to(create_url("index.php"));
        }
        ?>
    </div>
</div>
<?php include("includes/footer.php");?>
