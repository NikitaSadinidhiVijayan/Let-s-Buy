<?php
session_start();

// Get current page name
$page_name = basename($_SERVER["PHP_SELF"]);

// Files under libs
$libs_files = array(
    "_incl_confirm_login.php",
    "_incl_footer.php",
    "_incl_header.php",
    "_incl_navbar.php",
    "deal_lib.php",
    "login_lib.php",
    "register_lib.php",
	"profile_lib.php",
    "validator.php",
	"functions.php"
);

// Switch connect.php file location by the including file
if (in_array($page_name, $libs_files)) {
    require './core/database/connect.php';
}
else {
    require './libs/core/database/connect.php';
}

$errors = array();

?>