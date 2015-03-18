<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "becky"); 
    define("DB_PASS", "password"); 
    define("DB_NAME", "becky"); 

    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if(mysqli_connect_errno()) { 
        die("Database connection failed: " .
        mysqli_connect_error() . 
        " (" . mysqli_connect_errno() . ")"
        );
    }
?>

