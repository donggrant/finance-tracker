<?php
// Link to Website: https://cs4640.cs.virginia.edu/gdd7jh/hw5/
// Sources used: https://cs4640.cs.virginia.edu


spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});


// Join session or start one
session_start();

// Parse the URL
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = str_replace("/finance-tracker/", "", $path);
$parts = explode("/", $path);


// If the user's email is not set in the session, then it's not
// a valid session (they didn't get here from the login page),
// so we should send them over to log in first before doing
// anything else!
if (!isset($_SESSION["email"])) {
    // they need to see the login
    $parts = ["login"];
}

// Instantiate the controller and run
$finance = new FinanceController();
$finance->run($parts[0]);