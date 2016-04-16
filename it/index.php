<!-- Initernational Trade Index Page -->
<?php

require_once("./libs/core/init.php");
require_once("./libs/login_lib.php");
require_once("./libs/functions.php");

if($_POST) {
    require_once("./libs/login_lib.php");

    $login = new Login($_POST['login_id'],md5($_POST['login_pwd']));

    // login form check
    if(isset($_POST['login_exe']) == "login") {
        if (!$_POST['login_id'])
            $login->error("Check ID!");
        else {
            if (!$_POST['login_pwd'])
                $login->error("Check password!");
            else {
                if (!$login->check_login())
                    $login->error("Check ID or password!");
                else {
                    $message = "Logged in as a ".$login->member_type;
                    $login->warning($message);

                    $_SESSION["ukey"] = $login->user_key;
                    $_SESSION["uid"] = $login->id;
                    $_SESSION["uname"] = $login->name;
                    $_SESSION["utype"] = $login->member_type;

                    // Go to the first page of Seller
                    if ($login->member_type == "seller") {
                        $echo_html = "<script type=\"text/javascript\">window.location.replace(\"./seller_view.php\");</script>";
                        echo $echo_html;
                    }
                    else if ($login->member_type == "buyer") {
                        $echo_html = "<script type=\"text/javascript\">window.location.replace(\"./buyer_view.php\");</script>";
                        echo $echo_html;
                    }
                }
            }
        }
    }
}

$message = "";

if (isset($_SESSION["uid"])) {
    //$login = new Login($_GET['login_id'], $_GET['login_pwd']);
    //$login->check_login();
    $message = "You are currently LOGGED IN as a <b>".strtoupper($_SESSION["utype"])."</b>, the ID is <b>".$_SESSION["uid"]."</b>, the Key is <b>".$_SESSION["ukey"]."</b>, and the NAME is <b>".$_SESSION["uname"]."</b>";
}
/*
if (isset($_GET['login_id']) && isset($_GET['login_pwd'])) {
    $login = new Login($_GET['login_id'], $_GET['login_pwd']);
    $login->check_login();
    $message = "You are currently LOGGED IN as a ".strtoupper($login->member_type)." and the ID is ".$login->id;
}
*/
else {
    $message = "You are currently <b>LOGGED OUT</b>";
}

?>
<!-- Actual HTML STARTS Here-->

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> International Trade || Home</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.html">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

        <!-- CSS Global -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">        
        <link href="assets/plugins/bootstrap-select-1.9.3/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">         
        <link href="assets/plugins/owl-carousel2/assets/owl.carousel.css" rel="stylesheet" type="text/css"> 
        <link href="assets/plugins/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css" rel="stylesheet" type="text/css">   
        <link href="assets/plugins/royalslider/skins/universal/rs-universal.css" rel="stylesheet">
        <link href="assets/plugins/royalslider/royalslider.css" rel="stylesheet">
        <link href="assets/plugins/subscribe-better-master/subscribe-better.css" rel="stylesheet" type="text/css">

        <!-- Icons Font CSS -->
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

        <!-- Theme CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="assets/css/header.css" rel="stylesheet" type="text/css">  

        <!--[if lt IE 9]>
       <script src="assets/plugins/iesupport/html5shiv.js"></script>
       <script src="assets/plugins/iesupport/respond.js"></script>
       <![endif]-->

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
						
						<!-- To Display View [seller / buyer] if logged in -->
                        <?php
						echo"<li class='menu-item'>";
							
								if (isset($_SESSION["uid"])) 
									{
										if ($_SESSION["utype"]=="seller")
										echo"<a href='seller_view.php'>My Page</a>";
										else
										echo"<a href='buyer_view.php'>My Page</a>";
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
											
                                            <li><a href="about.html">About Us</a></li>
											
                                             <li class="dropdown mega-dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Category</a>                                            
                                                <div class="dropdown-menu mega-dropdown-menu mega-styl2"  style="background: white no-repeat url(assets/img/extra/megamenu-2.jpg) right 25px center; ">
                                                    <div class="col-sm-6 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> Exclusive  </b> <span class="thm-clr funky-font fsz-25"> Deals </span>
                                                            </h2>
                                                            <ul>
															<?php 
															// display the category menu- refer in functions.php
															displaycategory();
															 
															?>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>                                                   
                                                </div>
											</li> 
											
											<li><a href="faq.html">F.A.Q</a></li>
											
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

        <!-- CONTENT + SIDEBAR -->
        <div class="main-wrapper clearfix">
            <!-- Main Slider -->
            <div id="owl-carousel-main" class="owl-carousel nav-1">
                <div class="gst-slide">
                    <img src="assets/img/slides/1.jpg"  alt=""/>
                    <div class="gst-caption container theme-container">
                        <div>
                            <div class="caption-right">
                                <h3 class="fsz-40 wht-clr funky-font-2">  International Trade  </h3>
                                <h2>Some Tag Line <span class="thm-clr"> Here</span></h2>
                                <p class="hidden-xs">Description About International Trade Website</p>
                                <a class="fancy-btn-alt fsz-16" href="#newarrival">More</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="gst-slide">
                    <img src="assets/img/slides/2.jpg" alt=""/>
                    <div class="gst-caption container theme-container">
                        <div>
                            <div class="caption-right">
                                <h3 class="fsz-40 wht-clr funky-font-2">  International Trade  </h3>
                                <h2>Some Tag Line <span class="thm-clr"> Here</span></h2>
                                <p class="hidden-xs">Description About International Trade Website</p>
                                <a class="fancy-btn-alt fsz-16" href="#">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Main Slider -->

            <!-- Banner -->
            <section class="banner clear">
                <div class="col-lg-4 col-md-4 col-sm-12 no-padding promo-wrap">
                    <div class="gst-promo gst-color-white">
                        <img src="images/iphone.jpe" alt="" />
                        <div class="vertical-align-div gst-promo-text col-lg-6 right">
                            <div>
                                <div class="vertical-align-text">
                                    <h2> <span class="sec-title fsz-20 wht-clr"> ELECTRONICS </span> <span class="light-font-3 fsz-20 thm-clr"> starting from $350 </span> </h2>
                                    <p class="fsz-18">Mobiles , Music Player ,  Accessories ...</p>
                                    <a href="#" class="fancy-btn fancy-btn-small">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 no-padding promo-wrap">
                    <div class="gst-promo gst-color-white">
                        <img src="assets/img/banner/promo2.jpg" alt="" />

                        <div class="vertical-align-div gst-promo-text col-lg-8 right">
                            <div>
                                <div class="vertical-align-text">
                                    <h2> <span class="sec-title fsz-20 wht-clr"> FOOD  ITEMS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="light-font-3 fsz-20 thm-clr"> starting from $15 </span> </h2>
                                    <p class="fsz-18">Rice , Food Item 1 ,  Food Item 2 ...</p>
                                    <a href="#" class="fancy-btn fancy-btn-small">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 no-padding promo-wrap">
                    <div class="gst-promo gst-color-white">
                        <img src="assets/img/banner/promo3.jpg" alt="" />
                        <div class="vertical-align-div gst-promo-text col-lg-7 col-xs-offset-1">
                            <div>
                                <div class="vertical-align-text">
                                    <h2> <span class="sec-title fsz-20 blklt-clr"> WOMEN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="light-font-3 fsz-20 wht-clr"> starting from $350 </span> </h2>
                                    <p class="fsz-18 thm-clr">Dress 1 , Dress 2 ,  &nbsp;&nbsp;&nbsp; Dress 3 ...</p>
                                    <a href="#" class="fancy-btn fancy-btn-small">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / Banner -->

            <!-- Product Slider -->
            <section class="gst-row row-bikes clear"> 
                <div class="products-wrap text-center">
                    <div class="fancy-heading text-center">
                        <h3>Choose Your <span class="thm-clr">PRODUCT</span></h3>
                        <h5 class="funky-font-2">The Ultimate Deals with exciting Price </h5>
                        <i class="thm-clr fsz-20 fa fa-angle-double-down"></i>
                    </div>

                    <!-- Portfolio items -->
					<div class="products-slider nav-2">
						
							
							<?php 
								$sql="SELECT * FROM create_deal WHERE deal_category= (2 AND 5) order by RAND() LIMIT 4" ;  // add function to display new arrival part
								$res=mysqli_query($con,$sql);
								while($row = mysqli_fetch_assoc($res))
								{
									$deal_url_id=0;
									$var_deal_id=$row["deal_id"];
									//$var_deal_id=$row["deal_image"];
																				
												echo "<div class='product'>";
													echo "<div class='product-media'>";
														echo"<img src='images/".$row["deal_image"]."' alt=''/>";                                              
													echo"</div>";
													echo "<div class='product-content'>";
														echo "<h3> <a href='single_product.php?deal_url_id=$var_deal_id' class='title-2'>".$row["title"]."</a> </h3>";
														echo "<p class='font-2'>Start from <span class='thm-clr'>$".$row["amount_discount_1"]."</span> </p>";
													echo"</div>";
												echo"</div>	";
											//echo "</div>";
										//echo"</div>";						
								}
							?>
						
					</div>
                       

                    <a href="#" class="fancy-btn fancy-btn-small fsz-15">View all Deals</a>
                </div>           
            </section>
            <!-- / Product Slider -->

            <!-- Product Compare -->            
            <section class="gst-compare">

                <div class="gst-column col-lg-6 col-md-6 col-sm-12 col-xs-12 gst-compare-men">
                    <div class="col-lg-6 right">
                        <h5 class="title-2">IPHONE 6S +</h5>

                        <h3>                                         
                            <span class="sec-title fsz-45"> Mobiles </span>
                            <span class="thin-font-3 fsz-40 thm-clr"> $350 </span>
                        </h3>

                        <ul>
                            <li>point 1 about phone</li>
                            <li>point 2 about phone</li>
                            <li>point 3 about phone</li>
                        </ul>

                        <p class="gst-compare-actions">
                            <a class="compare-add-to-cart" href="#">Details</a>
                        </p>
                    </div>
                </div>

                <div class="gst-column col-lg-6 col-md-6 col-sm-12 col-xs-12 gst-compare-women">
                    <div class="col-lg-7">
                        <h5 class="title-2">IPHONE 6 SE</h5>

                        <h3>                                         
                            <span class="sec-title fsz-45"> Mobiles </span>
                            <span class="thin-font-3 fsz-40 thm-clr"> $250 </span>
                        </h3>

                        <ul>
                            <li>point 1 about phone</li>
                            <li>point 2 about phone</li>
                            <li>point 3 about phone</li>
                        </ul>

                        <p class="gst-compare-actions">
                            <a class="compare-add-to-cart" href="#">Details</a>
                        </p>
                    </div>
                </div>

                <div class="descount bold-font-2"> <div class="rel-div"> <p> DISCOUNT UP TO 75% </p> </div> </div>
            </section>
            <!-- / Product Compare -->

            <!-- New Arrivals -->
            <section class="gst-row row-arrivals woocommerce ovh" id= "newarrival">
                <div class="container theme-container">
                    <div class="gst-column col-lg-12 no-padding text-center">
                        <div class="fancy-heading text-center">
                            <h3><span class="thm-clr">New</span> Deals</h3>
                            <h5 class="funky-font-2">Leading Products</h5>
                        </div>

                        <!-- Filter for items -->
                        <!--<div class="clearfix tabs space-15">
                            <ul class="filtrable products_filter">
                                <li class=""><a href="#" data-filter=".tab-2">CLOTHING</a></li>
                                <li class="active"><a href="#" data-filter=".tab-1" >BIKES</a></li>
                                <li class=""><a href="#" data-filter=".tab-3">COMPONENTS</a></li>                                
                                <li class=""><a href="#" data-filter=".tab-4" >ACCESSORIES</a></li>
                                <li class=""><a href="#" data-filter=".tab-5">PROTECTIONS</a></li>
                            </ul>
                        </div> -->
						
						<!-- PHP CODE GOES HERE -->
				<?php
				$sql="SELECT * FROM create_deal order by RAND() LIMIT 4" ;  // add function to display new arrival part
				$res=mysqli_query($con,$sql);
				while($row = mysqli_fetch_assoc($res))
					{
						$deal_url_id=0;
						$var_deal_id=$row["deal_id"];
						echo"<div class='col-md-3 col-sm-6 col-xs-12 isotope-item tab-2 tab-3 tab-5'>";
							echo"<div class='portfolio-wrapper'>";
								echo"<div class='portfolio-thumb'>";
									echo"<img src='images/".$row["deal_image"]."' alt=''>";
										echo"<div class='portfolio-content'>";
											echo"<div class='pop-up-icon'>";
												echo"<a class='left-link' href='#product-preview' data-toggle='modal'><i class='fa fa-search'></i></a>";
												
												echo"<a class='right-link' href='#'><i class='fa fa-heart'> </i></a>";
											echo "</div>";
										echo "</div>";
								echo "</div>";
								echo"<div class='product-content'>";
									echo"<h3> <a class='title-3 fsz-18' href='single_product.php?deal_url_id=$var_deal_id'>".$row["title"]."</a> </h3>";
									echo"<p class='font-2'>Starting from<span class='thm-clr'> $ ".$row["unit_price"]."</span> </p>";  
								echo "</div>";		
							echo "</div>";
						echo "</div>";           				
					}
			?> 

                        <!-- PHP CODE ENDS HERE -->
                    </div>
                </div>
            </section>
            <!-- / New Arrivals -->

            <!-- Featured Products Section-->
			

            <section class="box-content">   
                <div class="fancy-heading text-center spcbtm-15">
                    <h3>Featured Products</h3>
                    <h5 class="funky-font-2">Our featured products here</h5>
                </div>
                <div class="featured-products diblock">
					<!-- PHP CODE GOES HERE -->
						<?php
					$sql="SELECT * FROM create_deal order by RAND() LIMIT 8" ;
					$res=mysqli_query($con,$sql);
					while($row = mysqli_fetch_assoc($res))
					{
						$deal_url_id=0;
						$var_deal_id=$row["deal_id"];
						echo"<div class='col-sm-6 col-lg-3 no-lr-padding'>";
							echo"<div class='image'><img src='images/".$row["deal_image"]."' alt='Product'></div>";
								echo"<div class='description'>";
									echo"<div class='text'>";
										 echo"<a href='single_product.php?deal_url_id=$var_deal_id' class='add-to-cart cart-icn2'></a>";
										 echo"<div class='name'><a href='single_product.php?deal_url_id=$var_deal_id'>".$row["title"]."</a></div>";
											echo"<div class='url fn n '>".$row["description"]."</div>";									
											echo"<div class='price font-3'> $ ".$row["unit_price"]."</div>";
								echo "</div>";		
							echo "</div>";
						echo "</div>";           				
					}
			?> 

                        <!-- PHP CODE ENDS HERE -->
                   
                </div>
            </section>
         <!-- Featured Products Section-->

            <!-- Product Slider -->
            <section class="gst-row wht-clr gst-cta row-cta ovh">
                <div class="container theme-container">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <h2>Found your <span class="thm-clr extbold-font-4">Dream Product</span> ? Why wait</h2>
                            <p class="gry-clr fsz-16">Get it now with attractive deal from International Trade..</p>
                        </div>

                        <div class="col-md-5 col-sm-12 col-xs-12 text-right gst-cta-buttons">
                            <a href="#" class="fancy-btn fancy-btn-small">View Products</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / Product Slider -->

            <!-- OPENING HOURS -->
            <section class="gst-row ">
                <div class="container theme-container">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 add-wrap">
                        <div class=" text-center">
                            <h2 class="fsz-35"> <span class="bold-font-3 wht-clr">International</span> <span class="thm-clr funky-font">Trade</span> </h2>
                            <p>148 Parramatta Road Stanmore NSW 2048, New York City </p>
                            <div class="fancy-heading text-center">
                                <h2 class="title-2">24 / 7 TECH SUPPORT</h2>                           
                            </div>
                            <p> Helpline Numbers -- </p>
                            <p> Help Through Mail -- </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / OPENING HOURS -->

        </div>                                                                                                                       
        <div class="clear"></div>

 <!-- FOOTER -->
       <?php include "libs/_incl_footer.php";?>  
 <!-- / FOOTER -->

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

                                
                            </div><!-- .summary -->
                        </div>  
                    </div>
                </div>
            </div>
        </section>
        <!-- / Product Preview Popup -->

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

                <div class="modal-content login-1 wht-clr">   
                    <div class="login-wrap text-center">                        
                        <h2 class="fsz-35 spcbtm-15"> <span class="bold-font-3 wht-clr">International</span> <span class="thm-clr funky-font">Trade</span> </h2>
                        <p class="fsz-20 title-3"> WELCOME TO OUR  WONDERFUL WORLD OF SHOPPING </p>
                        <p class="fsz-15 bold-font-4"> Login to get the most out of  <span class="thm-clr"> International Trade Website </span> </p>                       

                        <div class="login-form">  
							<br>
                             <form class="login" name="loginform" id="loginform" method = "post" action= "<?php echo $_SERVER["PHP_SELF"];?>">
                                <div class="form-group"><input type="text" id="user_id" name="login_id" placeholder="Email" class="form-control"></div>
                                <div class="form-group"><input type="password" id="user_pass" name="login_pwd" placeholder="Password" class="form-control"></div>
                                <div class="form-group">
                                    <button class="alt fancy-button" id="login-submit" type="submit"> <span class="fa fa-lightbulb-o"></span> Login</button>
									<input type="hidden" name="login_exe" value="login" />
                                </div>
                            </form>

                            <p><i class="fa fa-user"></i> New User ??? <a class="thm-clr" href="">Click Here to Register .</a></p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Popup: Login 1 --> 
		
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

    </body>
</html>