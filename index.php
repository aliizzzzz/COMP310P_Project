<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in() ?>


<?php include("includes/header.php");?>
<div id="main">
    <div id="container">
        <h2>Welcom to your personal home page!</h2>
        <div class="page_container">
            <div class="home_page" id="home">
                <h3>Account Information</h3>
                <?php print_user_info($_SESSION["user_id"]); ?>
            </div>
            <div class="home_page" id="home">
                <h3>Upcoming Sessons</h3>

                <?php
                    if (session_booked_presence($_SESSION["user_id"])) {
                        print_all_booked_sessions($_SESSION["user_id"]);
                    } else {
                        echo "<p id = \"about\">No sessions booked yet</p>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>
