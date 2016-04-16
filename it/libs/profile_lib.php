<?php

require_once("/core/init.php");
require_once("./_incl_confirm_login.php");
require_once("./login_lib.php");



$var_seller_first_name = $_SESSION["seller_first_name"];
$var_seller_last_name = $_SESSION["seller_last_name"];
$var_seller_buss_name = $_SESSION["seller_buss_name"];
$var_seller_addr = $_SESSION["seller_addr"];
$var_seller_mobile_number = $_SESSION["seller_mobile_number"];
$var_seller_rev_msg = $_SESSION["seller_rev_msg"];

$var_seller_category_food = $_SESSION["seller_category_food"];
$var_seller_category_electronics = $_SESSION["seller_category_electronics"];
$var_seller_category_rawmaterial = $_SESSION["seller_category_rawmaterial"];
$var_seller_category_entertainment = $_SESSION["seller_category_entertainment"];

$var_user_id = $_SESSION["ukey"];





/*

	$_SESSION["seller_category_entertainment"] = "1";create_deal_id = $_SESSION["create_deal_id"];
	;
	$var_order_quantity = $_SESSION["order_quantity"];
	$var_address = $_SESSION["address"];
	$var_state = $_SESSION["state"];
	$var_zipcode = $_SESSION["zipcode"];
	$var_closure_date = $_SESSION["closure_date"];
/*


/*
 * Kevin: 04/05/2016
 * Temporarily display variables

	echo "===== Temporarily display variables =====<br/>";;
	echo "var_seller_first_name: " . $var_seller_first_name . "<br/>";
	echo "var_seller_last_name: " . $var_seller_last_name. "<br/>";
	echo "var_seller_buss_name: " .$var_seller_buss_name. "</br>";
	echo "var_seller_addr: " . $var_seller_addr . "<br/>";
	echo "var_seller_mobile_number: " . $var_seller_mobile_number . "<br/>";
	echo "var_seller_rev_msg: " . $var_seller_rev_msg . "<br/>";
	echo "var_seller_category_food: " . $var_seller_category_food . "<br/>";
	echo "var_seller_category_electronics: " . $var_seller_category_electronics . "<br/>";
	echo "var_seller_category_rawmaterial: " . $var_seller_category_rawmaterial . "<br/>";
	echo "var_seller_category_entertainment: " . $var_seller_category_entertainment . "<br/>";  */

	//update the record into database Nikita added query
	
	$sql="UPDATE register SET first_name='$var_seller_first_name',last_name='$var_seller_last_name',business_name='$var_seller_buss_name',Address='$var_seller_addr',mobile_number='$var_seller_mobile_number',food_category='$var_seller_category_food',electronics_category='$var_seller_category_electronics',rawmaterial_Category='$var_seller_category_rawmaterial',entertainment_Category='$var_seller_category_entertainment',receive_message='$var_seller_rev_msg' WHERE id = $var_user_id";
	if(mysqli_query($con,$sql))
	{
	
	//echo "<script> alert(\"New record saved successfully..!\")</script>";
	mysqli_close($con);
	header("Location:http://localhost/it/it/profile.php");
	}
	else
	{
	echo "<script> alert(\"New record not saved successfully..!\")</script>";
	mysqli_close($con);
	}
	
?>