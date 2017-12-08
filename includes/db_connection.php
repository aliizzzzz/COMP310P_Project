<?php
// db_connection.php

    // connect to database
    define("DB_SERVER", "localhost")      ;
    define("DB_USER", "ameghdadi")        ;
    define("DB_PASS", "adminalizz")       ;
    define("DB_NAME", "bright_tutors")    ;

    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    // test connection
    if(mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
?>
