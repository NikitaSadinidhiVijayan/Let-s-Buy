<?php

require_once("./libs/core/init.php");
require_once("./libs/validator.php");
require_once("./libs/functions.php");

require_once("./libs/core/init.php");
require_once("./libs/_incl_confirm_login.php");
require_once("./libs/login_lib.php");

$user_member_type = $_SESSION["utype"];
$user_id = $_SESSION["uid"];
$user_name = $_SESSION["uname"];
$user_key=$_SESSION["ukey"]

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
											
                                            <li class="active"><a href="buyer_view.php">Buyer Deals</a></li>
											
                                            											
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
					
					<br>
					
					<table class="table table-bordered table-hover">
					<thead>
					  <tr>
						
						<th>Title</th>
						<th>Quantity</th>
						<th>Address</th>
						<th>State</th>
						<th>Zipcode</th>
					  </tr>
					</thead>
					<tbody>
					
					 <?php 
						$var_display_deal = "
                            SELECT j.create_deal_id, j.order_quantity, j.address, j.state, j.zipcode, c.title
                            FROM join_deal AS j
                            INNER JOIN create_deal AS c
                            ON j.create_deal_id = c.deal_id
                            WHERE user_id='$user_key'
                        ";
						$var_run_display_deal = mysqli_query($con,$var_display_deal);
						
						while($var_row_display_deal = mysqli_fetch_array($var_run_display_deal))
						{
							$var_display_deal_id = $var_row_display_deal['create_deal_id'];
							$var_display_deal_qty = $var_row_display_deal['order_quantity'];
							$var_display_address = $var_row_display_deal['address'];
							$var_display_state = $var_row_display_deal['state'];
							$var_display_zipcode = $var_row_display_deal['zipcode'];
							$var_display_title = $var_row_display_deal['title'];
							
							echo "<tr>
							 <td> <a href= 'single_product.php?deal_url_id=$var_display_deal_id'> $var_display_title </a></td>
							 <td> $var_display_deal_qty </td>
							 <td> $var_display_address </td>
							 <td> $var_display_state </td>
							 <td> $var_display_zipcode </td>
							 
							</tr>";
						}
						?>
						
					</tbody>
					</table>
				</div>
				
            </section>
        </div>                                                                                                                       

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