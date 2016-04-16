<?php

require_once("./core/init.php");
require_once("./_incl_confirm_login.php");
require_once("./login_lib.php");


	$var_create_deal_id = $_SESSION["create_deal_id"];
	$var_user_id = $_SESSION["ukey"];
	$var_order_quantity = $_SESSION["order_quantity"];
	$var_address = $_SESSION["address"];
	$var_state = $_SESSION["state"];
	$var_zipcode = $_SESSION["zipcode"];
	$var_closure_date = $_SESSION["closure_date"];



/*
 * Kevin: 04/05/2016
 * Temporarily display variables
 */
	echo "===== Temporarily display variables =====<br/>";;
	echo "var_create_deal_id: " . $var_create_deal_id . "<br/>";
	echo "var_user_id: " . $var_user_id. "<br/>";
	echo "var_order_quantity: " .$var_order_quantity. "</br>";
	echo "var_address: " . $var_address . "<br/>";
	echo "var_state: " . $var_state . "<br/>";
	echo "var_zipcode: " . $var_zipcode . "<br/>";
	echo "var_closure_date: " . $var_closure_date . "<br/>";



// Check remaining stocks again just before inserting the order to DB
$order_quantity_query = "SELECT SUM(order_quantity) AS order_quantity_sum FROM join_deal where create_deal_id=".$var_create_deal_id;
$order_quantity_result = mysqli_query($con, $order_quantity_query);
$order_quantity_sum = 0;
while($order_quantity_row = mysqli_fetch_array($order_quantity_result)) {
    $order_quantity_sum += $order_quantity_row['order_quantity_sum'];
}

$deal_quantity_query = "SELECT * FROM create_deal WHERE deal_id=".$var_create_deal_id;
$deal_quantity_result = mysqli_query($con, $deal_quantity_query);
$deal_quantity_total = 0;
while($deal_quantity_row = mysqli_fetch_array($deal_quantity_result)) {
    $deal_quantity_total = $deal_quantity_row['max_quantity'];
}

$global_remaining_stocks = $deal_quantity_total - $order_quantity_sum;



if ($global_remaining_stocks > 0) {

	//inserting data into DB

	$sql= "insert into join_deal(create_deal_id,user_id,order_quantity,address,state,zipcode,closure_date)values('$var_create_deal_id','$var_user_id','$var_order_quantity','$var_address','$var_state','$var_zipcode','$var_closure_date')";
	

	if(mysqli_query($con,$sql))
	{
	echo "<script> alert(\"New record saved successfully..!\")</script>";
	mysqli_close($con);
	}
	else
	{
	echo "<script> alert(\"New record not saved successfully..!\")</script>";
	mysqli_close($con);
	}

}

else {
    echo "<script> alert(\"Currently out of stock!\")</script>";
}


?>