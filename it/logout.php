<?php
//include "login_lib.php";

// logout
// Expire login session cookie

// Go to the home page
//echo "<meta http-equiv='refresh' content='0; url=./index.php'>";


session_start();

// Session expiration
if ($_SESSION["uid"] != null) {
    session_destroy();
}

// Go to the home page
echo "<script type=\"text/javascript\">window.location.replace(\"./index.php\");</script>";
?>
