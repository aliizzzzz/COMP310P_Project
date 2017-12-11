<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in() ?>


<?php include("includes/header.php");?>
<div id="main">
    <div id="container">
        <h2>Welcom to your personal home page!</h2>
        <div class="page_container">
            <div class="page" id="home">
                <h3>Account Information</h3>
                <?php print_user_info($_SESSION["user_id"]); ?>
            </div>

            <div class="page" id="home">
                <h3>Upcoming Sessons</h3>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>
