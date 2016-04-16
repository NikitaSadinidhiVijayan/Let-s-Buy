<?php
// modified on 03/09/2016 date field and removed quantity 1 option

require_once("./libs/core/init.php");
require_once("./libs/validator.php");
require_once("./libs/functions.php");  // for getcategory function
//require_once("./libs/_incl_confirm_login.php");


$validator = new validator();
$field_name = "";

// Set previous input value for a deal
$title_value = "";
$description_value = "";
$qty_value = "";
$unit_price_value = "";

$selected_unit_tickets = "";
$selected_unit_bags = "";
$selected_unit_bottles = "";
$selected_unit_vpack = "";
$selected_unit_kg = "";
$selected_unit_lb = "";
$selected_unit_pallet = "";
$selected_unit_case = "";
$selected_unit_other = "";

$selected_category = "";

$uother_value = "";

$selected_number_discount_option_1 = "";
$selected_number_discount_option_2 = "";
$selected_number_discount_option_3 = "";

$number_discount_1_value = "";
$amount_discount_1_value = "";
$number_discount_2_value = "";
$amount_discount_2_value = "";
$number_discount_3_value = "";
$amount_discount_3_value = "";

$selected_time_restricted_no = "";
$selected_time_restricted_yes = "";

$start_date_value = "";
$end_date_value = "";

$selected_location_restricted_no = "";
$selected_location_restricted_yes = "";

$location_description_value = "";

$selected_shipping_included_no = "";
$selected_shipping_included_yes = "";

$shipping_description_value = "";


if($_POST) {
    /*
     * Set validator
     */

    // title
    $field_name = "title";
    $field_display_name = "Title";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

    // description
    $field_name = "description";
    $field_display_name = "Description";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

    // qty
    $field_name = "qty";
    $field_display_name = "Minimum Quantity per order";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    $validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);

    // unit_price
    $field_name = "unit_price";
    $field_display_name = "Regular price";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    $validator->add_rule_to_field($field_name, array('price-only'), $field_display_name);

    // uother
    if ($_POST["unit"] == "other") {
        $field_name = "uother";
        $field_display_name = "Other unit";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    }

    // category
    $field_name = "category";
    $field_display_name = "Category";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('no-selection'), $field_display_name);

    // number_discount_1
    $field_name = "number_discount_1";
    $field_display_name = "First quantity";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    $validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);

    // amount_discount_1
    $field_name = "amount_discount_1";
    $field_display_name = "First price";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    $validator->add_rule_to_field($field_name, array('price-only'), $field_display_name);
    $validator->add_rule_to_field($field_name, array('discount-only-1'), $field_display_name);

    // discount_2
    if ($_POST["number_discount_option"] == "2" || $_POST["number_discount_option"] == "3") {
        // number_discount_2
        $field_name = "number_discount_2";
        $field_display_name = "Second quantity";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);

        // amount_discount_2
        $field_name = "amount_discount_2";
        $field_display_name = "Second price";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('price-only'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('discount-only-2'), $field_display_name);
    }

    // discount_3
    if ($_POST["number_discount_option"] == "3") {
        // number_discount_3
        $field_name = "number_discount_3";
        $field_display_name = "Third quantity";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);

        // amount_discount_3
        $field_name = "amount_discount_3";
        $field_display_name = "Third price";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('price-only'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('discount-only-3'), $field_display_name);
    }

    // time_restricted
    if ($_POST["time_restricted"] == "yes") {
        // start_date
        $field_name = "start_date";
        $field_display_name = "Start Date";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('date-only'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('no-past-date'), $field_display_name);

        // end_date
        $field_name = "end_date";
        $field_display_name = "End Date";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('date-only'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('future-date-only'), $field_display_name);
    }

    // location_restricted
    if ($_POST["location_restricted"] == "yes") {
        // location_description
        $field_name = "location_description";
        $field_display_name = "Location description";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    }

    // shipping_included
    if ($_POST["shipping_included"] == "yes") {
        // shipping_description
        $field_name = "shipping_description";
        $field_display_name = "Shipping description";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    }

    /*
     * After validation
     */

    // valid input
    if($validator-> form_valid()) {
		
        $_SESSION["title"] = $_POST["title"];
        $_SESSION["description"] = $_POST["description"];
        $_SESSION["qty"] = $_POST["qty"];
        $_SESSION["unit_price"] = $_POST["unit_price"];
        $_SESSION["unit"] = $_POST["unit"];
        if ($_POST["unit"] == "other") {
            $_SESSION["uother"] = $_POST["uother"];
        }
        else {
            $_SESSION["uother"] = "";
        }
        $_SESSION["category"] = $_POST["category"];
        $_SESSION["number_discount_option"] = $_POST["number_discount_option"];
        if ($_POST["number_discount_option"] == "1") {
            $_SESSION["number_discount_1"] = $_POST["number_discount_1"];
            $_SESSION["amount_discount_1"] = $_POST["amount_discount_1"];
            $_SESSION["number_discount_2"] = "";
            $_SESSION["amount_discount_2"] = "";
            $_SESSION["number_discount_3"] = "";
            $_SESSION["amount_discount_3"] = "";
        }
        else if ($_POST["number_discount_option"] == "2") {
            $_SESSION["number_discount_1"] = $_POST["number_discount_1"];
            $_SESSION["amount_discount_1"] = $_POST["amount_discount_1"];
            $_SESSION["number_discount_2"] = $_POST["number_discount_2"];
            $_SESSION["amount_discount_2"] = $_POST["amount_discount_2"];
            $_SESSION["number_discount_3"] = "";
            $_SESSION["amount_discount_3"] = "";
        }
        else if ($_POST["number_discount_option"] == "3") {
            $_SESSION["number_discount_1"] = $_POST["number_discount_1"];
            $_SESSION["amount_discount_1"] = $_POST["amount_discount_1"];
            $_SESSION["number_discount_2"] = $_POST["number_discount_2"];
            $_SESSION["amount_discount_2"] = $_POST["amount_discount_2"];
            $_SESSION["number_discount_3"] = $_POST["number_discount_3"];
            $_SESSION["amount_discount_3"] = $_POST["amount_discount_3"];
        }
        else { // in case
            $_SESSION["number_discount_1"] = "";
            $_SESSION["amount_discount_1"] = "";
            $_SESSION["number_discount_2"] = "";
            $_SESSION["amount_discount_2"] = "";
            $_SESSION["number_discount_3"] = "";
            $_SESSION["amount_discount_3"] = "";
        }
        $_SESSION["time_restricted"] = $_POST["time_restricted"];
        if ($_POST["time_restricted"] == "yes") {
            //$_SESSION["start_date"] = $_POST["start_date"];
			//$_SESSION["end_date"] = $_POST["end_date"];
			$_SESSION["start_date"] = date("Y/m/d", strtotime($_POST["start_date"]));
			$_SESSION["end_date"] = date("Y/m/d", strtotime($_POST["end_date"]));
        }
        else {
            $_SESSION["start_date"] = "";
            $_SESSION["end_date"] = "";
        }
        $_SESSION["location_restricted"] = $_POST["location_restricted"];
        if ($_POST["location_restricted"] == "yes") {
            $_SESSION["location_description"] = $_POST["location_description"];
        }
        else {
            $_SESSION["location_description"] = "";
        }
        $_SESSION["shipping_included"] = $_POST["shipping_included"];
        if ($_POST["shipping_included"] == "yes") {
            $_SESSION["shipping_description"] = $_POST["shipping_description"];
        }
        else {
            $_SESSION["shipping_description"] = "";
        }
        if (isset($_FILES["datafile"]["name"])) {
            $_SESSION["datafile"] = basename($_FILES["datafile"]["name"]); // need to be improved later
			//Added code for moving uploaded image into images folder - Nikita
			$var_datafile = $_FILES["datafile"]["name"];
			$var_datafile_temp = $_FILES["datafile"]["tmp_name"];
			move_uploaded_file($var_datafile_temp,"images/$var_datafile");
        }
        else {
            $_SESSION["datafile"] = "";
        }

        // Go to DB insert page
        echo "<script type=\"text/javascript\">window.location.replace(\"./libs/deal_lib.php\");</script>";

    }
    // invalid input
    else {
        $title_value = $_POST["title"];
        $description_value = $_POST["description"];
        $qty_value = $_POST["qty"];
        $unit_price_value = $_POST["unit_price"];

        switch ($_POST["unit"]) {
            case "tickets":
                $selected_unit_tickets = "selected=\"selected\"";
                break;

            case "bags":
                $selected_unit_bags = "selected=\"selected\"";
                break;

            case "bottles":
                $selected_unit_bottles = "selected=\"selected\"";
                break;

            case "vpack":
                $selected_unit_vpack = "selected=\"selected\"";
                break;

            case "kg":
                $selected_unit_kg = "selected=\"selected\"";
                break;

            case "lb":
                $selected_unit_lb = "selected=\"selected\"";
                break;

            case "pallet":
                    $selected_unit_pallet = "selected=\"selected\"";
                break;

            case "case":
                $selected_unit_case = "selected=\"selected\"";
                break;

            case "other":
                $selected_unit_other = "selected=\"selected\"";
                break;
        }

        $uother_value = $_POST["uother"];

        if ($_POST["category"]) {
            $selected_category = $_POST["category"];
        }

        switch ($_POST["number_discount_option"]) {
            case "1":
                $selected_number_discount_option_1 = "selected=\"selected\"";
                break;

            case "2":
                $selected_number_discount_option_2 = "selected=\"selected\"";
                break;

            case "3":
                $selected_number_discount_option_3 = "selected=\"selected\"";
                break;
        }

        $number_discount_1_value = $_POST["number_discount_1"];
        $amount_discount_1_value = $_POST["amount_discount_1"];
        $number_discount_2_value = $_POST["number_discount_2"];
        $amount_discount_2_value = $_POST["amount_discount_2"];
        $number_discount_3_value = $_POST["number_discount_3"];
        $amount_discount_3_value = $_POST["amount_discount_3"];

        switch ($_POST["time_restricted"]) {
            case "no":
                $selected_time_restricted_no = "selected=\"selected\"";
                break;

            case "yes":
                $selected_time_restricted_yes = "selected=\"selected\"";
                break;
        }

        $start_date_value = $_POST["start_date"];
        $end_date_value = $_POST["end_date"];

        switch ($_POST["location_restricted"]) {
            case "no":
                $selected_location_restricted_no = "selected=\"selected\"";
                break;

            case "yes":
                $selected_location_restricted_yes = "selected=\"selected\"";
                break;
        }

        $location_description_value = $_POST["location_description"];

        switch ($_POST["shipping_included"]) {
            case "no":
                $selected_shipping_included_no = "selected=\"selected\"";
                break;

            case "yes":
                $selected_shipping_included_yes = "selected=\"selected\"";
                break;
        }

        $shipping_description_value = $_POST["shipping_description"];
    }
}

?>



<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from event-theme.com/themes/goshophtml/default/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:30:32 GMT -->
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Goshop HTML Theme || Goshop Store Template</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.html">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

        <!-- CSS Global -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">        
        <link href="assets/plugins/bootstrap-select-1.9.3/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">         
        <link href="assets/plugins/owl-carousel2/assets/owl.carousel.css" rel="stylesheet" type="text/css"> 
        <link href="assets/plugins/Swiper-3.2.7/dist/css/swiper.min.css" rel="stylesheet" type="text/css"> 
        <link href="assets/plugins/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css" rel="stylesheet" type="text/css">   
        <link href="assets/plugins/royalslider/skins/universal/rs-universal.css" rel="stylesheet">
        <link href="assets/plugins/royalslider/royalslider.css" rel="stylesheet">
        <link href="assets/plugins/subscribe-better-master/subscribe-better.css" rel="stylesheet" type="text/css">

        <!-- Icons Font CSS -->
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

        <!-- Theme CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="assets/css/header.css" rel="stylesheet" type="text/css">        

    </head>

    <body class="home page">

                <!-- HEADER -->
        <header id="masthead" class="clearfix" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
		
            <div class="header-wrap" id="typo-sticky-header">
                <div class="container theme-container reltv-div">   

                    <div class="pull-right header-search visible-xs">
                        <a id="open-popup-menu" class="nav-trigger header-link-search" href="javascript:void(0)" title="Menu">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="top-header pull-left">
                                <div class="logo-area">
                                    <a href="index.php" class="thm-logo fsz-35">
                                        <!--<img src="files/main-logo.png" alt="Goshop HTML Theme">-->
                                        <b class="bold-font-3 wht-clr">International</b><span class="thm-clr funky-font"> Trade</span>
                                    </a>
                                </div>                              
                            </div>
                        </div>
                        <!-- Navigation -->

                        <div class="col-md-8 col-sm-8 static-div">
                            <div class="navigation pull-left">
                                <nav>                                                               
                                    <div class="" id="primary-navigation">                                        
                                        <ul class="nav navbar-nav primary-navbar">
										
                                            <li><a href="index.php">Home</a></li> 
											
                                            <li><a href="seller_view.php">Seller Deals</a></li>
											
                                            <li class="active"><a href="deals.php">Create Deal</a></li>
											
											<li><a href="profile.php">Profile</a></li>
											
                                            <li><a href="logout.php">Logout</a></li>
										
										</ul>										
									</div>    
								</nav>
                            </div>
							
                            <div class="pull-right srch-box">
                                <a id="open-popup-search" class="header-link-search" href="javascript:void(0)" title="Search">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </header>
        <!-- / HEADER -->

        <!-- CONTENT + SIDEBAR -->
        <div class="main-wrapper clearfix">
            
			<section class="gst-compare">

                <div class="gst-column col-lg-12 col-md-6 col-sm-12 col-xs-12">
				
				<h4 align="right"> <i class="fa fa-user thm-clr"></i> Welcome <span class="thm-clr"><?php echo $_SESSION['uname']; ?></span></h4>
				
					<form class="subscribe" id="deals_form" method= "post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
						<div class="gst-column col-lg-6">
							<div class="form-group">
								<div class="controls">
									<input class="form-control" type="text" id="title" name="title" placeholder="* Title here..." value="<?php echo $title_value;?>" required />
                                    <?php $validator->out_field_error('title');?>
								</div>
								
							</div>
							
							<div class="form-group">
								<div class="controls">
									<input  class="form-control" type="text" name="description" id="description" placeholder="* Description here" value="<?php echo $description_value;?>" required />
                                    <?php $validator->out_field_error('description');?>
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="controls">
									<input  class="form-control" type="text" name="qty" id="qty" placeholder="* Minimum Quantity per order" value="<?php echo $qty_value;?>" required />
                                    <?php $validator->out_field_error('qty');?>
										
										<!--<input class = "span5" type="text" name= "unit"id = "unit" placeholder= "* Please Choose the unit"> -->
										<!--<option>---Unit--</option>
										<select name="unit">
										<!--<option value= "Stage_Discount">Unit</option>-->
										<!--<option value= "Tickets">Tickets</option>
										<option value= "Bags">Bags</option>
										<option value= "Bottles">Bottles</option>										
										<option value= "vpack">Value_Pack</option>
										<option value= "kg">Kg</option>
										<option value= "lb">Lb</option>
										<option value= "pallet">Pallet</option>
										<option value= "case">Cases</option>										
										<option value= "other">Others</option>
									</select> -->
									<br>
									<input class="form-control" type="text" id="unit_price" name="unit_price" placeholder="* Enter regular price..." value="<?php echo $unit_price_value;?>" required />
                                    <?php $validator->out_field_error('unit_price');?>
								</div>
							</div>

							<div class="form-group">
								<div class="controls">
								<label>Unit 
									<select class = "form-control" id = "unit" name="unit"> 
										<option value= "tickets" <?php echo $selected_unit_tickets ?>>Tickets</option>
										<option value= "bags" <?php echo $selected_unit_bags ?>>Bags</option>
										<option value= "bottles" <?php echo $selected_unit_bottles ?>>Bottles</option>
										<option value= "vpack" <?php echo $selected_unit_vpack ?>>Value_Pack</option>
										<option value= "kg" <?php echo $selected_unit_kg ?>>Kg</option>
										<option value= "lb" <?php echo $selected_unit_lb ?>>Lb</option>
										<option value= "pallet" <?php echo $selected_unit_pallet ?>>Pallet</option>
										<option value= "case" <?php echo $selected_unit_case ?>>Cases</option>
										<option value= "other" <?php echo $selected_unit_other ?>>Others</option>
									</select>
								</label>
							</div>

							<div class="form-group">
								<div class = "controls" id =  "unit_other" style = "display:none;">
									<!-- add code for unit option other -->
									<input class="form-control" type="text" id="uother" name="uother" placeholder="* Enter the Unit" size = "20" value="<?php echo $uother_value;?>" />
                                    <?php $validator->out_field_error('uother');?>
								</div>
							</div>

							<!-- Adding Category-->
							<div class="form-group">
								<div class = "controls">
                                    <select class = "form-control" id = "category" name="category">
									    <option>Select a Category </option>
                                        <?php
									        getcategory($selected_category);
                                        ?>
									</select>
                                    <?php $validator->out_field_error('category');?>
								</div>
							</div>
							<div class="form-group">	
								<label># of Discount Option
									<select class = "form-control" id = "number_discount_option" name="number_discount_option">
										<!--<option value= "0">* # of Discount Option </option>									-->
										<option value= "1" <?php echo $selected_number_discount_option_1 ?>>1</option>
										<option value= "2" <?php echo $selected_number_discount_option_2 ?>>2</option>
										<option value= "3" <?php echo $selected_number_discount_option_3 ?>>3</option>
									</select>
								</label>
							</div>
							
						</div>
					</div>
						<div class="gst-column col-lg-6">
							
							
								<!--div class = "controls" id =  "number_discount_option_1" style = "display:none;"-->
                                <div class = "controls" id =  "number_discount_option_1">
									<table class="table table-bordered">
									<tr>
									<td>
									<input class="form-control" type="text" id="number_discount_1" name="number_discount_1" placeholder="* Enter first quantity" size = "20" value="<?php echo $number_discount_1_value;?>" required />
                                    <?php $validator->out_field_error('number_discount_1');?>
									</td>
									<td>
									<input class="form-control" type="text" id="amount_discount_1" name="amount_discount_1" placeholder="* Enter first price $ ..." size = "20" value="<?php echo $amount_discount_1_value;?>" required />
                                    <?php $validator->out_field_error('amount_discount_1');?>
									</td>
									</tr>
									</table>
								</div> 
	
								<div class = "controls" id =  "number_discount_option_2" style = "display:none;">
									<table class="table table-bordered">
									<tr>
									<td>
									<!-- add code for number_discount_option_2 -->
									<input class="form-control" type="text" id="number_discount_2" name="number_discount_2" placeholder="* Enter second quantity" size = "20" value="<?php echo $number_discount_2_value;?>" />
                                    <?php $validator->out_field_error('number_discount_2');?>
									</td>
									<td>
									<input class="form-control" type="text" id="amount_discount_2" name="amount_discount_2" placeholder="* Enter second price $ ..." size = "20" value="<?php echo $amount_discount_2_value;?>" />
                                    <?php $validator->out_field_error('amount_discount_2');?>
									</td>
									</tr>
									</table>
								</div>

								<div class = "controls" id =  "number_discount_option_3" style = "display:none;">
								<table class="table table-bordered">
									<tr>
									<td>
									<!-- add code for number_discount_option_3 -->
									<input class="form-control" type="text" id="number_discount_3" name="number_discount_3" placeholder="* Enter third quantity" size = "20" value="<?php echo $number_discount_3_value;?>" />
                                    <?php $validator->out_field_error('number_discount_3');?>
									</td>
									<td>
									<input class="form-control" type="text" id="amount_discount_3" name="amount_discount_3" placeholder="* Enter third price $ ..." size = "20" value="<?php echo $amount_discount_3_value;?>" />
                                    <?php $validator->out_field_error('amount_discount_3');?>
									</td>
									</tr>
									</table>
								</div>

							<div class="form-group">			
								<div class="controls">
								<label>Time Restricted
									<select class = "form-control" id = "time_restricted" name="time_restricted"> 
									<!--	<option value= "time_restricted">-Time Restricted-</option>-->
										<option value= "no" <?php echo $selected_time_restricted_no ?>>No</option>
										<option value= "yes" <?php echo $selected_time_restricted_yes ?>>Yes</option>
									</select>
								</label>

								</div>
							</div>

							<div class="form-group">
								<div class = "controls" id =  "time_restricted_yes" style = "display:none;">
								<table class="table table-bordered">
									<tr>
									<td>
									<!-- add code for time restrcted option yes-->
									<input class="form-control" type="text" id="start_date" name="start_date" placeholder="* Enter start date MM/DD/YYYY" size = "20" value="<?php echo $start_date_value;?>" />
                                    <?php $validator->out_field_error('start_date');?>
									</td>
									<td>
                                    <input class="form-control" type="text" id="end_date" name="end_date" placeholder="* Enter end date MM/DD/YYYY" size = "20" value="<?php echo $end_date_value;?>" />
                                    <?php $validator->out_field_error('end_date');?>
									</td>
									</tr>
									</table>
								</div>
							</div>
							
							<div class="form-group">			
								<div class="controls">
								<label>Location Restricted 
									<select class = "form-control" id = "location_restricted" name="location_restricted"> 
										<!--<option value= "location_restricted">-Location Restricted-</option>-->
                                        <option value= "no" <?php echo $selected_location_restricted_no ?>>No</option>
                                        <option value= "yes" <?php echo $selected_location_restricted_yes ?>>Yes</option>
									</select>
								</label>
							</div>

							<div class="form-group">	
								<div class = "controls" id =  "location_restricted_yes" style = "display:none;">
									<!-- add code for location restricted option yes-->
									<input class="form-control" type="text" id="location_description" name="location_description" placeholder="* Describe location restriction" size = "20" value="<?php echo $location_description_value;?>" />
                                    <?php $validator->out_field_error('location_description');?>
								</div>
							</div>							
							

							<div class="form-group">	
								<label>Shipping Included 
									<select class = "form-control" id = "shipping_included" name="shipping_included"> 
									<!--	<option value= "shipping_included">-Shipping Included-</option>-->
                                        <option value= "no" <?php echo $selected_shipping_included_no ?>>No</option>
                                        <option value= "yes" <?php echo $selected_shipping_included_yes ?>>Yes</option>
									</select>
								</label>
								</div>
							</div>
							
							<div class="form-group">	
								<div class = "controls" id = "shipping_included_yes" style = "display:none;">
									<!-- add code for shipping included option yes-->
									<input class="form-control" type="text" id="shipping_description" name="shipping_description" placeholder="* Enter shipping cost" size = "20" value="<?php echo $shipping_description_value;?>" />
                                    <?php $validator->out_field_error('shipping_description');?>
								</div>
							</div>							
														
							
							
							<div class="form-group">			
								
							</div>
							
							<div class="form-group">			
								<div class="controls">
									<input class="form-control" type="file" name="datafile" size="40" >
								</div>
							</div>
							
							<div class="form-group">
								<div class="controls">
									<button id="send-mail" class="alt fancy-button">Submit</button>
								</div>
							</div>
						</form>
					</div>
                </div>
            </section>
			
        </div>                                                                                                                       
<br>
        <div class="clear"></div>

 <!-- FOOTER -->
       <?php include "libs/_incl_simple_footer.php";?>  
 <!-- / FOOTER -->

        <!-- Search Popup -->
        <div class="popup-box page-search-box">
            <div>
                <div class="popup-box-inner">
                    <form>
                        <input class="search-query" type="text" placeholder="Search and hit enter" />
                    </form>
                </div>
            </div>
            <a href="javascript:void(0)" class="close-popup-box close-page-search"><i class="fa fa-close"></i></a>
        </div>
        <!-- / Search Popup -->

        <!-- Popup: Login 1 -->
        <div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">                
                <button type="button" class="close close-btn popup-cls" data-dismiss="modal" aria-label="Close"> <i class="fa-times fa"></i> </button>

                <div class="modal-content login-2">   
                    <div class="login-wrap text-center">                        
                        <h2 class="fsz-35 spcbtm-15"> <span class="bold-font-3 blk-clr">GoShop</span> <span class="thm-clr funky-font">fashion</span> </h2>
                        <p class="fsz-20 title-3"> WELCOME TO OUR  WONDERFUL WORLD </p>
                        <p class="fsz-15 bold-font-4"> Did you know that we ship to over <span class="thm-clr"> 24 different countries </span> </p>                       

                        <div class="login-form">
                            <a class="fb-btn btn spcbtm-15" href="#"> <i class="fa fa-facebook btn-icon"></i>Login with Facebook </a>

                            <p class="bold-font-2 fsz-12 signup"> OR SIGN UP </p>

                            <form class="login">
                                <div class="form-group"><input type="text" placeholder="Email" class="form-control"></div>
                                <div class="form-group"><input type="text" placeholder="Password" class="form-control"></div>
                                <div class="form-group">
                                    <button class="alt fancy-button" type="submit"> <span class="fa fa-lightbulb-o"></span> Login</button>
                                </div>
                            </form>

                            <p>* Denotes mandatory field.</p>
                            <p>** At least one telephone number is required.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Popup: Login 1 -->

        <!-- Subscribe Popup 1
        <section class="subscribe-me">
            <a href="#close" class="sb-close-btn close popup-cls"><i class="fa-times fa"></i></a>      
            <div class="modal-content subscribe-2 blk-clr">   
                <div class="login-wrap text-center">                        
                    <h2 class="fsz-35 spcbtm-15"> <span class="bold-font-3 blk-clr">GoShop</span> <span class="thm-clr funky-font">bikes</span> </h2>
                    <h2 class="sec-title fsz-50">NEWSLETTER</h2>
                    <h3 class="fsz-15 bold-font-4"> Did you know that we ship to over <span class="thm-clr"> 24 different countries </span> </h3>

                    <div class="login-form spctop-30"> 
                        <form class="subscribe">
                            <div class="form-group"><input type="text" placeholder="Enter your name" class="form-control"></div>
                            <div class="form-group"><input type="text" placeholder="Enter your email address" class="form-control"></div>
                            <div class="form-group">
                                <button class="alt fancy-button" type="submit"> <span class="fa fa-envelope"></span> Subscribe </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- / Subscribe Popup 1 -->

        <!-- Product Preview Popup -->
        <section class="modal fade" id="product-preview" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg product-modal">
                <button class="close close-btn popup-cls" aria-label="Close" data-dismiss="modal" type="button">
                    <i class="fa-times fa"></i>
                </button>
                <div class="modal-content single-product">
                    <div class="diblock">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div id="gallery-1" class="royalSlider rsUni">
                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg" href="assets/img/products/single-1.jpg" data-rsw="500" data-rsh="500"> <img class="rsTmb" src="assets/img/products/single-thumb-1.jpg" alt=""></a>
                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg" href="assets/img/products/single-2.jpg" data-rsw="500" data-rsh="500"> <img class="rsTmb" src="assets/img/products/single-thumb-2.jpg" alt=""></a>
                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg" href="assets/img/products/single-3.jpg" data-rsw="500" data-rsh="500"> <img class="rsTmb" src="assets/img/products/single-thumb-3.jpg" alt=""></a>
                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg" href="assets/img/products/single-1.jpg" data-rsw="500" data-rsh="500"> <img class="rsTmb" src="assets/img/products/single-thumb-1.jpg" alt=""></a>
                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg" href="assets/img/products/single-2.jpg" data-rsw="500" data-rsh="500"> <img class="rsTmb" src="assets/img/products/single-thumb-2.jpg" alt=""></a>
                                <a class="rsImg" data-rsbigimg="assets/img/products/single-1.jpg" href="assets/img/products/single-3.jpg" data-rsw="500" data-rsh="500"> <img class="rsTmb" src="assets/img/products/single-thumb-3.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="spc-15 hidden-lg clear"></div>
                        <div class=" col-sm-12 col-lg-6 col-xs-12">
                            <div class="summary entry-summary">
                                <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                    <div class="rating"> 
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>                                           
                                        <span class="star active"></span>
                                        <span class="star half"></span>
                                    </div>

                                    <div  class="posted_in">
                                        <h3 class="funky-font-2 fsz-20">Women Collection</h3>
                                    </div>
                                </div>

                                <div class="product_title_wrapper">
                                    <div itemprop="name" class="product_title entry-title">
                                        Flusas Denim <span class="thm-clr">Dress</span>
                                        <p class="font-3 fsz-18 no-mrgn price"> <b class="amount blk-clr">$175.00</b> <del>$299.00</del> </p>       
                                    </div>
                                </div>

                                <div itemprop="description" class="fsz-15">
                                    <p>Qossi is an emerging company and dedicated to making high quality bags and fashions.Qossi designers are internationally renowned designers,having participated in many international fashion designing contests,and perform outstandingly</p>                                  
                                </div>

                                <ul class="stock-detail list-items fsz-12">
                                    <li> <strong> MATERIAL : <span class="blk-clr"> COTTON </span> </strong> </li>
                                    <li> <strong>  STOCK : <span class="blk-clr"> READY STOCK </span> </strong> </li>
                                </ul>

                                <form class="variations_form cart" method="post">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group selectpicker-wrapper">
                                                <label class="fsz-15 title-3"> <b> CHOOSE COLOR </b> </label>
                                                <div class="search-selectpicker selectpicker-wrapper">
                                                    <select
                                                        class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                        data-toggle="tooltip" title="White">
                                                        <option>Pink</option>
                                                        <option>Blue</option>
                                                        <option>White</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group selectpicker-wrapper">
                                                <label class="fsz-15 title-3"> <b> CHOOSE SIZE </b> </label>
                                                <div class="search-selectpicker selectpicker-wrapper">
                                                    <select
                                                        class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                        data-toggle="tooltip" title="Large">
                                                        <option>Small</option>
                                                        <option>Medium</option>
                                                        <option>Large</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group selectpicker-wrapper">
                                                <label class="fsz-15 title-3"> <b> QUANTITY </b> </label>
                                                <div class="search-selectpicker selectpicker-wrapper">
                                                    <select
                                                        class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                        data-toggle="tooltip" title="2 Pcs">
                                                        <option>1 Pcs</option>
                                                        <option>2 Pcs</option>
                                                        <option>3 Pcs</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button type="submit" class="single_add_to_cart_button button alt fancy-button left">Add to cart</button>
                                            </div>    
                                        </div>
                                    </div>
                                </form>
                            </div><!-- .summary -->
                        </div>  
                    </div>
                </div>
            </div>
        </section>
        <!-- / Product Preview Popup -->

        <!-- Top -->
        <div class="to-top" id="to-top"> <i class="fa fa-long-arrow-up"></i> </div>

        <!-- JS Global -->
        <script src="assets/plugins/jquery/jquery-2.1.3.js"></script>    
        <script src="assets/plugins/royalslider/jquery.royalslider.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/bootstrap-select-1.9.3/dist/js/bootstrap-select.min.js"></script>             
        <script src="assets/plugins/owl-carousel2/owl.carousel.min.js"></script> 
        <script src="assets/plugins/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>     
        <script src="assets/plugins/isotope-master/dist/isotope.pkgd.min.js"></script>        
        <script src="assets/plugins/subscribe-better-master/jquery.subscribe-better.min.js"></script>       

        <!-- Page JS -->
        <script src="assets/js/countdown.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/custom.js"></script>         
        <script src="assets/plugins/Swiper-3.2.7/dist/js/swiper.jquery.min.js"></script>
		
		<script type="text/javascript">
		$('select[name=unit]').change(function () {
            if ($(this).val() == 'other') {
                $('#unit_other').show();
            } else {
                $('#unit_other').hide();
            }
		});		

		$('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '1') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').hide();
                $('#number_discount_option_3').hide();
            } else {
                $('#number_discount_option_1').hide();
            }
		});

		$('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '2') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').show();
                $('#number_discount_option_3').hide();
            } else {
                $('#number_discount_option_2').hide();
            }
		});

		$('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '3') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').show();
                $('#number_discount_option_3').show();
            } else {
                $('#number_discount_option_3').hide();
            }
		});
		
		$('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '0') {
                $('#number_discount_option_1').hide();
                $('#number_discount_option_2').hide();
                $('#number_discount_option_3').hide();
            }
		});

        $('select[name=time_restricted]').change(function () {
            if ($(this).val() == 'yes') {
                $('#time_restricted_yes').show();
            } else {
                $('#time_restricted_yes').hide();
            }
        });
		
		$('select[name=location_restricted]').change(function () {
            if ($(this).val() == 'yes') {
                $('#location_restricted_yes').show();
            } else {
                $('#location_restricted_yes').hide();
            }
		});

		$('select[name=shipping_included]').change(function () {
            if ($(this).val() == 'yes') {
                $('#shipping_included_yes').show();
            } else {
                $('#shipping_included_yes').hide();
            }
		});

        // Followings are when returning to fill out page after submit due to error
        $('select[name=unit]').change(function () {
            if ($(this).val() == 'other') {
                $('#unit_other').show();
            } else {
                $('#unit_other').hide();
            }
        }).change();

        $('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '1') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').hide();
                $('#number_discount_option_3').hide();
            } else {
                $('#number_discount_option_1').hide();
            }
        }).change();

        $('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '2') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').show();
                $('#number_discount_option_3').hide();
            } else {
                $('#number_discount_option_2').hide();
            }
        }).change();

        $('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '3') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').show();
                $('#number_discount_option_3').show();
            } else {
                $('#number_discount_option_3').hide();
            }
        }).change();

        $('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '0') {
                $('#number_discount_option_1').hide();
                $('#number_discount_option_2').hide();
                $('#number_discount_option_3').hide();
            }
        }).change();

        $('select[name=time_restricted]').change(function () {
            if ($(this).val() == 'yes') {
                $('#time_restricted_yes').show();
            } else {
                $('#time_restricted_yes').hide();
            }
        }).change();

        $('select[name=location_restricted]').change(function () {
            if ($(this).val() == 'yes') {
                $('#location_restricted_yes').show();
            } else {
                $('#location_restricted_yes').hide();
            }
        }).change();

        $('select[name=shipping_included]').change(function () {
            if ($(this).val() == 'yes') {
                $('#shipping_included_yes').show();
            } else {
                $('#shipping_included_yes').hide();
            }
        }).change();

        </script>

    </body>

<!-- Mirrored from event-theme.com/themes/goshophtml/default/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:31:11 GMT -->
</html>