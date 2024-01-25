<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'my_store');

// define redirect url
define('SITE_URL', 'http://localhost/my_store/');

include_once('DatabaseConnection.php');


$db = new DatabaseConnection;


function validateInput($dbcon, $input){
    return mysqli_real_escape_string($dbcon, $input);
}

function redirect($message, $page){
    $redirect_to = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirect_to");
    exit(0);
}