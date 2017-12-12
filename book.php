<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in() ?>


<?php include("includes/header.php");?>
<div id="main">
    <div id="container">
        <div class="page_container">
            <div class="page">
                <pre>
                <?php
                print_r($_SESSION)
                ?>
                </pre>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>
