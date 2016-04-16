<?php

$db_host = "localhost";
$db_user = "root";
$db_pwd = "3191";
$db_name = "advanced_mktg";

$con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//mysqli_select_db($con, $db_name);

?>