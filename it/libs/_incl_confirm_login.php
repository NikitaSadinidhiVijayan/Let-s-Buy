<?php

/*
 * Kevin: 03/09/2016
 * The pages which requires login status must include this php code.
 * This php code must be included after "ini.php"
 */

$user_id = "";

if (isset($_SESSION["uid"])) {
    $user_id = strtolower($_SESSION["uid"]);
}

if ($user_id == "") {
    echo "<script type=\"text/javascript\">window.location.replace(\"./index.php\");</script>";
}
?>