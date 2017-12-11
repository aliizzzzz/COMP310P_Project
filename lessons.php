<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in() ?>


<?php include("includes/header.php");?>
<div id="main">
    <div id="container">
        <h2>You can book your lessons here!</h2>
        <div class="page_container">
            <div class="page">
                <table>
                    <?php
                    print_sessions_table_headings();
                    print_sessions_table_info();
                    ?>
                </table>
            </div>
            <div class="page">
                <table>
                    <?php
                        print_teacher_info();
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>
