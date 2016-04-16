<?php

require_once("./libs/core/init.php");
require_once("./libs/login_lib.php");
require_once("./libs/validator.php");
require_once("./libs/functions.php");
require_once("./libs/_incl_confirm_login.php");


$var_user_id = $_SESSION['uid'];
$var_user_type= $_SESSION["utype"];

$validator = new validator();
$field_name = "";

// Set previous input value for seller
$selected_regtype_seller = "";
$seller_email_value = "";
$seller_pwd_value = "";
$seller_pwd_repeat_value = "";
$seller_first_name_value = "";
$seller_last_name_value = "";
$seller_buss_name_value = "";
$seller_addr_value = "";
$seller_mobile_number_value = "";
$selected_seller_rev_msg_yes = "";
$selected_seller_rev_msg_no = "";
$selected_seller_category_food = "";
$selected_seller_category_electronics = "";
$selected_seller_category_rawmaterial = "";
$selected_seller_category_entertainment = "";

// Set previous input value for buyer
$selected_regtype_buyer = "";
$buyer_first_name_value = "";
$buyer_last_name_value = "";
$buyer_addr_value = "";
$buyer_mobile_number_value = "";
$selected_buyer_rev_msg_yes = "";
$selected_buyer_rev_msg_no = "";
$selected_buyer_category_food = "";
$selected_buyer_category_electronics = "";
$selected_buyer_category_rawmaterial = "";
$selected_buyer_category_entertainment = "";

if($_POST) {
	/*
     * Set validator
     */

	//***** SELLER *****
	if ($var_user_type== "seller") { // When seller

		// seller_first_name
		$field_name = "seller_first_name";
		$field_display_name = "First Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('letters-only'), $field_display_name);

		// seller_last_name
		$field_name = "seller_last_name";
		$field_display_name = "Last Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('letters-only'), $field_display_name);

		// seller_buss_name
		$field_name = "seller_buss_name";
		$field_display_name = "Business Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

		// seller_addr
		$field_name = "seller_addr";
		$field_display_name = "Address";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

		// seller_mobile_number
		$field_name = "seller_mobile_number";
		$field_display_name = "Contact number";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);
	}
	//***** BUYER *****
	else if ($var_user_type == "buyer") { // When buyer
		
		// seller_first_name
		$field_name = "seller_first_name";
		$field_display_name = "First Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('letters-only'), $field_display_name);

		// seller_last_name
		$field_name = "seller_last_name";
		$field_display_name = "Last Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('letters-only'), $field_display_name);

		// seller_buss_name
		$field_name = "seller_buss_name";
		$field_display_name = "Business Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

		// seller_addr
		$field_name = "seller_addr";
		$field_display_name = "Address";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

		// seller_mobile_number
		$field_name = "seller_mobile_number";
		$field_display_name = "Contact number";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);
	}

	/*
     * After validation
     */

	// valid input
	if($validator-> form_valid()) {
		// When seller
		if ($var_user_type== "seller") {
			$_SESSION["regtype"] = $var_user_type;
			//$_SESSION["seller_email"] = $_POST["seller_email"];
			//$_SESSION["seller_pwd"] = $_POST["seller_pwd"];
			$_SESSION["seller_first_name"] = $_POST["seller_first_name"];
			$_SESSION["seller_last_name"] = $_POST["seller_last_name"];
			$_SESSION["seller_buss_name"] = $_POST["seller_buss_name"];
			$_SESSION["seller_addr"] = $_POST["seller_addr"];
			$_SESSION["seller_mobile_number"] = $_POST["seller_mobile_number"];
			$_SESSION["seller_rev_msg"] = $_POST["seller_rev_msg"];
			if (isset($_POST["seller_category_food"])) {
				$_SESSION["seller_category_food"] = "1";
			}
			else {
				$_SESSION["seller_category_food"] = "0";
			}
			if (isset($_POST["seller_category_electronics"])) {
				$_SESSION["seller_category_electronics"] = "1";
			}
			else {
				$_SESSION["seller_category_electronics"] = "0";
			}
			if (isset($_POST["seller_category_rawmaterial"])) {
				$_SESSION["seller_category_rawmaterial"] = "1";
			}
			else {
				$_SESSION["seller_category_rawmaterial"] = "0";
			}
			if (isset($_POST["seller_category_entertainment"])) {
				$_SESSION["seller_category_entertainment"] = "1";
			}
			else {
				$_SESSION["seller_category_entertainment"] = "0";
			}
		}
		// When buyer
		else if ($var_user_type == "buyer") {
			//$_SESSION["seller_email"] = $_POST["seller_email"];
			//$_SESSION["seller_pwd"] = $_POST["seller_pwd"];
			$_SESSION["seller_first_name"] = $_POST["seller_first_name"];
			$_SESSION["seller_last_name"] = $_POST["seller_last_name"];
			$_SESSION["seller_buss_name"] = $_POST["seller_buss_name"];
			$_SESSION["seller_addr"] = $_POST["seller_addr"];
			$_SESSION["seller_mobile_number"] = $_POST["seller_mobile_number"];
			$_SESSION["seller_rev_msg"] = $_POST["seller_rev_msg"];
			if (isset($_POST["seller_category_food"])) {
				$_SESSION["seller_category_food"] = "1";
			}
			else {
				$_SESSION["seller_category_food"] = "0";
			}
			if (isset($_POST["seller_category_electronics"])) {
				$_SESSION["seller_category_electronics"] = "1";
			}
			else {
				$_SESSION["seller_category_electronics"] = "0";
			}
			if (isset($_POST["seller_category_rawmaterial"])) {
				$_SESSION["seller_category_rawmaterial"] = "1";
			}
			else {
				$_SESSION["seller_category_rawmaterial"] = "0";
			}
			if (isset($_POST["seller_category_entertainment"])) {
				$_SESSION["seller_category_entertainment"] = "1";
			}
			else {
				$_SESSION["seller_category_entertainment"] = "0";
			}
		}

		// Go to DB insert page
		echo "<script type=\"text/javascript\">window.location.replace(\"./libs/profile_lib.php\");</script>";

	}
	// invalid input
	else {
		// When seller
		if (isset($_POST['seller_reg']) == "seller") {
			//$selected_regtype_seller = "selected=\"selected\"";
			//$seller_email_value = $_POST["seller_email"];
			//$seller_pwd_value = $_POST["seller_pwd"];
			//$seller_pwd_repeat_value = $_POST["seller_pwd_repeat"];
			$seller_first_name_value = $_POST["seller_first_name"];
			$seller_last_name_value = $_POST["seller_last_name"];
			$seller_buss_name_value = $_POST["seller_buss_name"];
			$seller_addr_value = $_POST["seller_addr"];
			$seller_mobile_number_value = $_POST["seller_mobile_number"];
			if ($_POST["seller_rev_msg"] == "yes") {
				$selected_seller_rev_msg_yes = "selected=\"selected\"";
			} else if ($_POST["seller_rev_msg"] == "No") {
				$selected_seller_rev_msg_no = "selected=\"selected\"";
			}
			if (isset($_POST["seller_category_food"])) {
				$selected_seller_category_food = "checked=\"checked\"";
			}
			if (isset($_POST["seller_category_electronics"])) {
				$selected_seller_category_electronics = "checked=\"checked\"";
			}
			if (isset($_POST["seller_category_rawmaterial"])) {
				$selected_seller_category_rawmaterial = "checked=\"checked\"";
			}
			if (isset($_POST["seller_category_entertainment"])) {
				$selected_seller_category_entertainment = "checked=\"checked\"";
			}
		}
		// When buyer
		else if (isset($_POST['buyer_reg']) == "buyer") {
			//$seller_email_value = $_POST["seller_email"];
			//$seller_pwd_value = $_POST["seller_pwd"];
			//$seller_pwd_repeat_value = $_POST["seller_pwd_repeat"];
			$seller_first_name_value = $_POST["seller_first_name"];
			$seller_last_name_value = $_POST["seller_last_name"];
			$seller_buss_name_value = $_POST["seller_buss_name"];
			$seller_addr_value = $_POST["seller_addr"];
			$seller_mobile_number_value = $_POST["seller_mobile_number"];
			if ($_POST["seller_rev_msg"] == "yes") {
				$selected_seller_rev_msg_yes = "selected=\"selected\"";
			} else if ($_POST["seller_rev_msg"] == "No") {
				$selected_seller_rev_msg_no = "selected=\"selected\"";
			}
			if (isset($_POST["seller_category_food"])) {
				$selected_seller_category_food = "checked=\"checked\"";
			}
			if (isset($_POST["seller_category_electronics"])) {
				$selected_seller_category_electronics = "checked=\"checked\"";
			}
			if (isset($_POST["seller_category_rawmaterial"])) {
				$selected_seller_category_rawmaterial = "checked=\"checked\"";
			}
			if (isset($_POST["seller_category_entertainment"])) {
				$selected_seller_category_entertainment = "checked=\"checked\"";
			}
		}
	}
}
?>

<?php 
			
				
				$var_get_profile = "SELECT * FROM register WHERE email='$var_user_id'";
				$var_run_profile = mysqli_query ($con,$var_get_profile);
				
				while($var_row_profile= mysqli_fetch_array($var_run_profile))
				{
						$var_first_name = $var_row_profile['first_name'];
						$var_last_name = $var_row_profile['last_name'];
						$var_business_name = $var_row_profile['business_name'];	
						$var_address = $var_row_profile['Address'];							
						$var_mobile_number = $var_row_profile['mobile_number'];			
						$var_receive_message = $var_row_profile['receive_message'];
						$var_food_category = $var_row_profile['food_category'];
						$var_electronics_category = $var_row_profile['electronics_category'];
						$var_rawmaterial_category = $var_row_profile['rawmaterial_Category'];						
						$var_entertainment_category = $var_row_profile['entertainment_Category'];
				}
				
				$seller_first_name_value = $var_first_name;
				$seller_last_name_value = $var_last_name;
				$seller_buss_name_value = $var_business_name;
				$seller_addr_value = $var_address;
				$seller_mobile_number_value = $var_mobile_number;
				if (strtolower($var_receive_message) == "yes") {
					$selected_seller_rev_msg_yes = "selected=\"selected\"";
				} else if (strtolower($var_receive_message) == "no") {
					$selected_seller_rev_msg_no = "selected=\"selected\"";
				}
				
				$selected_seller_category_food = $var_food_category;
				$selected_seller_category_electronics = $var_electronics_category;
				$selected_seller_category_rawmaterial = $var_rawmaterial_category;
				$selected_seller_category_entertainment = $var_entertainment_category;

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
            <div class="site-subheader site-header">
                <div class="container theme-container">
                    <!-- Language & Currency Switcher -->
                    <!-- Mini Cart -->
                    <ul class="pull-right list-unstyled list-inline">
                        <!-- To Display User name if logged in -->
                        <?php
						echo"<li class='menu-item'>";
							
								if (isset($_SESSION["uid"])) 
									{
									echo"<a href='profile.php'> Hi, ".$_SESSION['uname']."</a>";
									}
								else
									{
									
									}
							
                        echo"</li>";
						?>
						<!-- To Display Sign up if not logged in -->
						<?php
								if (isset($_SESSION["uid"])) 
									{
									
									}
								else
									{
										echo"<li class='nav-dropdown'>";
											echo"<a href='#'>Signup</a>";
												echo"<ul class='nav-dropdown-inner list-unstyled accnt-list'>";
													echo"<li> <a href='reg_buyer.php'> Buyer</a></li>";                                              
													echo"<li> <a href='reg_seller.php'> Seller</a></li>";                                            
												echo"</ul>";
										echo"</li>";
									}
							?>
						<!-- To Display Login / Logout based on logged in status -->	
                        <li class="menu-item">
							<?php
								if (isset($_SESSION["uid"])) 
									{
									echo"<a  href='logout.php'>Logout</a>";
									}
								else
									{
									echo"<a  href='#login-popup' data-toggle='modal'>Login</a>";
									}
							?>
                        </li>
                    </ul>

                </div>
            </div>
			
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
										
                                            <li  class="active"><a href="index.php">Home</a></li> 
											
                                            <li><a href="#">About Us</a></li>
											
                                            <li><a href="contact-us.html">Category</a></li>
											
											<li><a href="contact-us.html">F.A.Q</a></li>
											
                                            <li><a href="contact-us.html">Contact</a></li>
												
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

        <!-- CONTENT + SIDEBAR 
		 Niki Switch between buyer and seller need to add code for buyer-->
        <div class="main-wrapper clearfix">
            
			<section class="gst-compare">

                <div class="gst-column col-lg-12 col-md-6 col-sm-12 col-xs-12">
					<form class="subscribe" id="seller_form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<h2> <i class="fa fa-user fa-2x thm-clr"></i> Update your <span class="thm-clr">info</span></h2>
					<div class="gst-column col-lg-6">
						
							<p></p>
																					
							<div class="form-group">
								<input class="form-control" type="text" name="seller_first_name" id="seller_first_name" placeholder="* First Name..." value="<?php echo $seller_first_name_value;?>" required />
								<?php $validator->out_field_error('seller_first_name');?>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" name="seller_last_name" id="seller_last_name" placeholder="* Last Name..." value="<?php echo $seller_last_name_value;?>" required />
								<?php $validator->out_field_error('seller_last_name');?>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" name="seller_buss_name" id="seller_buss_name" placeholder="* Business Name..." value="<?php echo $seller_buss_name_value;?>" required />
								<?php $validator->out_field_error('seller_buss_name');?>
							</div>
							
							<div class="form-group">
								<textarea class="form-control" name="seller_addr" id="seller_addr" placeholder="* Address..." required><?php echo htmlspecialchars($seller_addr_value, ENT_QUOTES, 'UTF-8'); ?></textarea>
								<?php $validator->out_field_error('seller_addr');?>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" name="seller_mobile_number" id="seller_mobile_number" placeholder="* Contact no..."value="<?php echo $seller_mobile_number_value;?>" required />
								<?php $validator->out_field_error('seller_mobile_number');?>
							</div>
							
							
					</div>
					
					<div class="gst-column col-lg-6">
							<p></p>
							
							
							<div class="form-group">
								<select class="form-control" name="seller_rev_msg" id="seller_rev_msg">
									<option value= "seller_rev_msg"> -- Do you want to receive message--</option>
									<option value= "yes" <?php echo $selected_seller_rev_msg_yes ?>>Yes</option>
									<option value= "no" <?php echo $selected_seller_rev_msg_no ?>>No</option>
								</select>
							</div>
							
							<div class="">
											<div class="controls">Select Category of your choice:</br>
											
											<?php if ($var_food_category == 1) : ?>
													<input class="checkbox-inline" type="checkbox" name="seller_category_food" value="food" checked />Food products<br />
											<?php elseif($var_food_category == 0) : ?>	
													<input class="checkbox-inline" type="checkbox" name="seller_category_food" value="food" />Food products<br />
											<?php endif; ?>
											<?php if ($var_electronics_category == 1) : ?>
												<input class="checkbox-inline" type="checkbox" name="seller_category_electronics" value="electronics" checked />Electronics<br />
											<?php elseif($var_electronics_category == 0) : ?>	
												<input class="checkbox-inline" type="checkbox" name="seller_category_electronics" value="electronics" />Electronics<br />
											<?php endif; ?>
											<?php if ($var_rawmaterial_category == 1) : ?>											
												<input class="checkbox-inline" type="checkbox" name="seller_category_rawmaterial" value="rawmaterial" checked />Raw Material<br />
											<?php elseif($var_rawmaterial_category == 0) : ?>	
												<input class="checkbox-inline" type="checkbox" name="seller_category_rawmaterial" value="rawmaterial" />Raw Material<br />
											<?php endif; ?>
											<?php if ($var_entertainment_category == 1) : ?>	
												<input class="checkbox-inline" type="checkbox" name="seller_category_entertainment" value="entertainment" checked />Entertainment
											<?php elseif($var_entertainment_category == 0) : ?>	
												<input class="checkbox-inline" type="checkbox" name="seller_category_entertainment" value="entertainment" />Entertainment		
											<?php endif; ?>	
											</div>
										</div>
							<br>
                            <div class="form-group">
								<input type="hidden" name="seller_reg" id="seller_reg" value="seller" />
                                <button class="alt fancy-button" id="send-mail"> <span class="fa fa-user"></span> Update </button>
								
                            </div>
							<?php //echo "<script> alert(\"New record saved successfully..!\")</script>";?>
                        </form>
					</div>	  
                </div>
            </section>
			
        </div>                                                                                                                       

        <div class="clear"></div>

  <!-- FOOTER -->
       <?php include "libs/_incl_footer.php";?>  
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

    </body>

<!-- Mirrored from event-theme.com/themes/goshophtml/default/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:31:11 GMT -->
</html>