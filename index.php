<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in() ?>


<?php include("includes/header.php");?>
<div id="main">
    <div id="container">
        <h2>Welcom to your personal home page!</h2>
        <div class="page" id="home">
            <h3>Account Information</h3>
            <?php
                $user_info_array = mysqli_fetch_assoc(fetch_user_info($_SESSION["user_id"]));
                $output = "<div id=\"user_info\">\n";
                foreach ($user_info_array as $field => $info) {
                    $output .= "<p>" . fieldname_as_text($field);
                    $output .= "</p>";
                    $output .= "<p id=\"info\">" . $info;
                    $output .= "</p>\n";
                }
                $output .= "</div>\n";
                echo $output;
            ?>

        </div>
        <div class="page" id="home">
            <h3>Upcoming Sessons</h3>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>
