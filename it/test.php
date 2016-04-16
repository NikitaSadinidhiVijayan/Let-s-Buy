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


?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from event-theme.com/themes/goshophtml/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:25:13 GMT -->
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
                    <!-- Language & Currency Switcher 
                    <ul class="pull-left list-unstyled list-inline">
                        <li class="nav-dropdown language-switcher">
                            <div>EN</div>
                            <ul class="nav-dropdown-inner list-unstyled list-lang">
                                <li><span class="current">EN</span></li>
                                <li><a title="Russian" href="#">RU</a></li>
                                <li><a title="France" href="#">FR</a></li>
                                <li><a title="Brazil" href="#">IT</a></li>                                
                            </ul>
                        </li>
                        <li class="nav-dropdown language-switcher">
                            <div><span class="fa fa-dollar"></span>USD</div>
                            <ul class="nav-dropdown-inner list-unstyled list-currency">
                                <li><span class="current"><span class="fa fa-dollar"></span>USD</span></li>
                                <li><a title="Euro" href="#"><span class="fa fa-eur"></span>Euro</a></li>
                                <li><a title="GBP" href="#"><span class="fa fa-gbp"></span>GBP</a></li>
                            </ul>
                        </li>
                    </ul> -->

                    <!-- Mini Cart -->
                    <ul class="pull-right list-unstyled list-inline">
                        <li class="nav-dropdown">
                            <a href="#">My Account</a>
                            <ul class="nav-dropdown-inner list-unstyled accnt-list">
                                <li> <a href="my-account.html">My Account</a></li>                                                
                                <li> <a href="account-info.html"> Account Information </a></li>                                                
                                <li> <a href="cng-pw.html">Change Password</a></li>
                                <li> <a href="address-book.html">Address Books</a></li>
                                <li> <a href="order-history.html">Order History</a></li>
                                <li> <a href="review-rating.html">Reviews and Ratings</a></li>
                                <li> <a href="return.html">Returns Requests</a></li>
                                <li> <a href="newsletter.html">Newsletter</a></li>
                                <li> <a href="myaccount-leftsidebar.html">Left Sidebar</a></li>
                            </ul>
                        </li>
                        <li id="cartContent" class="cartContent">
                            <a id="miniCartDropdown" href="cart.html">
                                My Cart 
                                <span class="cart-item-num">3</span>
                            </a>

                            <div id="miniCartView" class="cartView">
                                <ul id="minicartHeader" class="product_list_widget list-unstyled">
                                    <li>
                                        <div class="media clearfix">
                                            <div class="media-lefta">
                                                <a href="single-product.html">
                                                    <img  src="assets/img/products/cart-popup-1.jpg" alt="hoodie_5_front" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="single-product.html">Flusas Feminin</a>
                                                <span class="price"><span class="amount"><span class="fa fa-dollar"></span>20.00</span></span>
                                                <span class="quantity">Qty:  1Pcs</span>
                                            </div>
                                        </div>

                                        <div class="product-remove">
                                            <a href="#" class="btn-remove" title="Remove this item"><i class="fa fa-close"></i></a>				
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media clearfix">
                                            <div class="media-lefta">
                                                <a href="single-product.html">
                                                    <img  src="assets/img/products/cart-popup-2.jpg" alt="T_2_front" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="single-product.html">Autum Winter</a>
                                                <span class="price"><span class="amount"><span class="fa fa-dollar"></span>20.00</span></span>
                                                <span class="quantity">Qty:  1Pcs</span>
                                            </div>
                                        </div>

                                        <div class="product-remove">
                                            <a href="#" class="btn-remove" title="Remove this item"><i class="fa fa-close"></i></a>				
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media clearfix">
                                            <div class="media-lefta">
                                                <a href="single-product.html">
                                                    <img  src="assets/img/products/cart-popup-3.jpg" alt="cd_6_angle" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="single-product.html">Women's Summer</a>
                                                <span class="price"><span class="amount"><span class="fa fa-dollar"></span>20.00</span></span>
                                                <span class="quantity">Qty:  1Pcs</span>
                                            </div>
                                        </div>

                                        <div class="product-remove">
                                            <a href="#" class="btn-remove" title="Remove this item"><i class="fa fa-close"></i></a>				
                                        </div>
                                    </li> 
                                </ul>

                                <div class="cartActions">
                                    <span class="pull-left">Subtotal</span>
                                    <span class="pull-right"><span class="amount"><span class="fa fa-dollar"></span>75.00</span></span>
                                    <div class="clearfix"></div>

                                    <div class="minicart-buttons">
                                        <div class="col-lg-6">
                                            <a href="cart.html">Your Cart</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="checkout.html" class="minicart-checkout">Checkout</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item">
                            <a href="checkout.html">Checkout</a>
                        </li>
                        <li class="menu-item">
                            <a  href="#login-popup" data-toggle="modal">Login</a>
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
                                    <a href="index-2.html" class="thm-logo fsz-35">
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
                                            <li class="dropdown active">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Home</a>
                                                <ul class="dropdown-menu">  
                                                    <li><a href="index-2.html">Home</a></li>
                                                    <li><a href="index-3.html">Home 2</a></li>
                                                    <li><a href="index-4.html">Home 3</a></li>    
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Sub Menu</a>
                                                        <ul class="dropdown-menu">  
                                                            <li><a href="#">Sub Menu 1</a></li>
                                                            <li><a href="#">Sub Menu 2</a></li>    
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Sub Menu 3</a>
                                                                <ul class="dropdown-menu">  
                                                                    <li><a href="#">Sub Menu 4</a></li>
                                                                    <li><a href="#">Sub Menu 5</a></li> 
                                                                    <li><a href="#">Sub Menu 6</a></li> 
                                                                </ul>
                                                            </li> 
                                                        </ul>
                                                    </li> 
                                                </ul>
                                            </li> 
                                            <li><a href="#">Bikes</a></li>
                                            <li class="dropdown mega-dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Clothing</a>                                            
                                                <div class="dropdown-menu mega-dropdown-menu mega-styl2"  style="background: white no-repeat url(assets/img/extra/megamenu-2.jpg) right 25px center; ">
                                                    <div class="col-sm-6 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> WOMEN  </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>                                                   
                                                </div>
                                            </li> 
                                            <li class="dropdown mega-dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Components</a>                                            

                                                <div class="dropdown-menu mega-dropdown-menu pr"  style="background: white no-repeat url(assets/img/extra/megamenu-1.jpg) right top; ">
                                                    <div class="col-md-3 col-sm-3 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> WOMEN  </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3 col-sm-3 menu-block">                                                
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> MEN </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> KID’S  </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3 col-sm-3 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> ELECTRONIC  </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </li> 
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Blog</a>
                                                <ul class="dropdown-menu">  
                                                    <li><a href="blog.html"> Blog </a></li>                                            
                                                    <li><a href="blog-leftside.html"> Blog Lef Sidebar</a></li>
                                                    <li><a href="blog-single.html"> Blog Single </a></li>                                                   
                                                </ul>
                                            </li>
                                            <li><a href="contact-us.html">Contact</a></li>
                                            <li class="dropdown mega-dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Page</a>                                            
                                                <div class="dropdown-menu mega-dropdown-menu mega-styl2"  style="background: white no-repeat url(assets/img/extra/megamenu-3.jpg) right top; ">
                                                    <div class="col-sm-6 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> Product  </b> <span class="thm-clr funky-font fsz-25"> categories </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="category.html"> category </a></li>
                                                                <li><a href="category-left-sidebar.html"> category left sidebar </a></li>
                                                                <li><a href="category-fullwidth.html"> category fullwidth </a></li>
                                                                <li><a href="category2.html"> category Style 2</a></li>
                                                                <li><a href="category2-left-sidebar.html"> category style 2 left sidebar </a></li>
                                                                <li><a href="single-product.html"> single product </a></li>  
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> Theme  </b> <span class="thm-clr funky-font fsz-25"> pages </span>
                                                            </h2>
                                                            <ul>                                                                  
                                                                <li><a href="cart.html"> Shopping Cart </a></li>
                                                                <li><a href="checkout.html"> checkout </a></li>                                                            
                                                                <li><a href="about-us.html"> About Us </a></li>
                                                                <li><a href="404-error.html"> Error </a></li>
                                                                <li><a href="coming-soon.html"> Coming Soon </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
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
                            <div class="caption-center">
                                <p class="slider-title"> <span class="fsz-220 funky-font">Bikes</span> <span class="funky-font-2 fsz-28">Slim, Strong, and Fun Anytime</span> </p>
                                <a class="fancy-btn fsz-16" href="#">Find Your Bike</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gst-slide">
                    <img src="assets/img/slides/2.jpg" alt=""/>
                    <div class="gst-caption container theme-container">
                        <div>
                            <div class="caption-center">
                                <p class="slider-title"> <span class="fsz-220 funky-font">Riding</span> <span class="funky-font-2 fsz-28">our bikes stronger <br> than you ever imagined </span> </p>
                                <a class="fancy-btn fsz-16" href="#">Find Your Bike</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gst-slide">
                    <img src="assets/img/slides/3.jpg" alt=""/>
                    <div class="gst-caption container theme-container">
                        <div>
                            <div class="caption-right">
                                <h3 class="fsz-40 wht-clr funky-font-2">  Waterproof Jacket  </h3>
                                <h2>Goshop <span class="thm-clr">Big Sale</span></h2>
                                <p class="lgt-gry hidden-xs">Cycling is a healthy, fun and exciting way to travel. No matter what type of cycling you're into, we've got a bike for you.</p>
                                <a class="fancy-btn-alt fsz-16" href="#">Shop Now</a>
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
                        <img src="assets/img/banner/promo1.jpg" alt="" />
                        <div class="vertical-align-div gst-promo-text col-lg-6 right">
                            <div>
                                <div class="vertical-align-text">
                                    <h2> <span class="sec-title fsz-40 wht-clr"> Men </span> <span class="light-font-3 fsz-33 lght-ylw"> $350 </span> </h2>
                                    <p class="fsz-18">Bikes, clothing and many more...</p>
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
                                    <h2> <span class="sec-title fsz-40 wht-clr"> Women </span> <span class="light-font-3 fsz-33 thm-clr"> $250 </span> </h2>                                  
                                    <p class="fsz-18">Bikes, clothing, accessories and much more...</p>
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
                                    <h2> <span class="sec-title fsz-40 blklt-clr"> Bike's </span> <span class="light-font-3 fsz-33 lght-ylw"> $550 </span> </h2>                                    
                                    <p class="fsz-18">All famous bike brands only for you...</p>
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
                        <h3>Choose Your <span class="thm-clr">Bike</span></h3>
                        <h5 class="funky-font-2">Search by type of bike</h5>
                        <i class="thm-clr fsz-20 fa fa-angle-double-down"></i>
                    </div>

                    <!-- Portfolio items -->
                    <div class="products-slider nav-2">
					
					<!-- PHP CODE GOES HERE -->
						<?php
							$sql="SELECT * FROM create_deal" ;
							$res=mysqli_query($con,$sql);
								while($row = mysqli_fetch_assoc($res))
									{
										echo"<div class='product'>";
										echo"<div class='product-media'>";
										echo"<img src='images/".$row["deal_image"]."' alt=''>";                                                 
										echo "</div>";
									
										echo"<div class='product-content'>";
										echo"<h3> <a href='' class='title-2'>".$row["title"]."</a> </h3>";
										echo"<p class='font-2'>Start from <span class='thm-clr'>  $ ".$row["unit_price"]." </span> </p>"; 
										echo "</div>";
										echo "</div>";				       
						
									}
						?> 
                    <!-- PHP CODE ENDS HERE -->
					
                        <div class="product">
                            <div class="product-media">
                                <img src="assets/img/products/slid-prod-2.png" alt="" />                                                 
                            </div>
                            <div class="product-content">
                                <h3> <a href="single-product.html" class="title-2">ROAD BIKES</a> </h3>
                                <p class="font-2">Start from <span class="thm-clr"> $299.00 </span> </p>    
                            </div>
                        </div>

                        <div class="product">
                            <div class="product-media">
                                <img src="assets/img/products/slid-prod-1.png" alt="" />                                                  
                            </div>
                            <div class="product-content">
                                <h3> <a href="single-product.html" class="title-2"> MOUNTAIN BIKES </a> </h3>
                                <p class="font-2">Start from <span class="thm-clr"> $599.00 </span> </p>    
                            </div>
                        </div>

                        <div class="product">
                            <div class="product-media">
                                <img src="assets/img/products/slid-prod-3.png" alt="" />
                            </div>
                            <div class="product-content">
                                <h3> <a href="single-product.html" class="title-2">BMX BIKES</a> </h3>
                                <p class="font-2">Start from <span class="thm-clr"> $399.00 </span> </p>    
                            </div>
                        </div>

                        <div class="product">
                            <div class="product-media">
                                <img src="assets/img/products/slid-prod-2.png" alt="" />                                                 
                            </div>
                            <div class="product-content">
                                <h3> <a href="single-product.html" class="title-2">ROAD BIKES</a> </h3>
                                <p class="font-2">Start from <span class="thm-clr"> $299.00 </span> </p>    
                            </div>
                        </div>

                        <div class="product">
                            <div class="product-media">
                                <img src="assets/img/products/slid-prod-1.png" alt="" />                                                  
                            </div>
                            <div class="product-content">
                                <h3> <a href="single-product.html" class="title-2"> MOUNTAIN BIKES </a> </h3>
                                <p class="font-2">Start from <span class="thm-clr"> $599.00 </span> </p>    
                            </div>
                        </div>

                        <div class="product">
                            <div class="product-media">
                                <img src="assets/img/products/slid-prod-3.png" alt="" />
                            </div>
                            <div class="product-content">
                                <h3> <a href="single-product.html" class="title-2">BMX BIKES</a> </h3>
                                <p class="font-2">Start from <span class="thm-clr"> $399.00 </span> </p>    
                            </div>
                        </div>
                    </div>

                    <a href="#" class="fancy-btn fancy-btn-small fsz-15">View all Bikes</a>
                </div>           
            </section>
            <!-- / Product Slider -->

            <!-- Product Compare -->            
            <section class="gst-compare">

                <div class="gst-column col-lg-6 col-md-6 col-sm-12 col-xs-12 gst-compare-men">
                    <div class="col-lg-6 right">
                        <h5 class="title-1">Waterproof Jacket</h5>

                        <h3>                                         
                            <span class="sec-title fsz-45"> Men </span>
                            <span class="thin-font-3 fsz-40 thm-clr"> $350 </span>
                        </h3>

                        <ul>
                            <li>Integrated i-Lume LED rear light</li>
                            <li>Optional hood available separately</li>
                            <li>Breathability rating 15,000</li>
                        </ul>

                        <p class="gst-compare-actions">
                            <a href="#">Detail</a>
                            <a class="compare-add-to-cart" href="#">Add to Cart</a>
                        </p>
                    </div>
                </div>

                <div class="gst-column col-lg-6 col-md-6 col-sm-12 col-xs-12 gst-compare-women">
                    <div class="col-lg-7">
                        <h5 class="title-1">Waterproof Jacket</h5>

                        <h3>                                         
                            <span class="sec-title fsz-45"> Women </span>
                            <span class="thin-font-3 fsz-40 thm-clr"> $250 </span>
                        </h3>

                        <ul>
                            <li>Integrated i-Lume LED rear light</li>
                            <li>Optional hood available separately</li>
                            <li>Breathability rating 15,000</li>
                        </ul>

                        <p class="gst-compare-actions">
                            <a href="#">Detail</a>
                            <a class="compare-add-to-cart" href="#">Add to Cart</a>
                        </p>
                    </div>
                </div>

                <div class="descount bold-font-2"> <div class="rel-div"> <p> DISCOUNT UP TO 75% </p> </div> </div>
            </section>
            <!-- / Product Compare -->

            <!-- New Arrivals -->
            <section class="gst-row row-arrivals woocommerce ovh">
                <div class="container theme-container">
                    <div class="gst-column col-lg-12 no-padding text-center">
                        <div class="fancy-heading text-center">
                            <h3><span class="thm-clr">New</span> Arrivals</h3>
                            <h5 class="funky-font-2">Trending Products</h5>
                        </div>

                        <!-- Filter for items -->
                        <div class="clearfix tabs space-15">
                            <ul class="filtrable products_filter">
								<!--<PHP CODE FOR CATEOGRY> -->
								<?php
								$sql="SELECT * FROM category";
								$res=mysqli_query($con,$sql);
								while($row = mysqli_fetch_assoc($res))
									{
						              echo"<li class=''><a href='#' data-filter='tab-2'>".$row["category"]."</a></li> ";             
									}
									
							echo"</ul>";
						echo "</div>";
						
						//Filter for items Ends
							
							echo"<div class='row isotope isotope-items' id='product-filter'>";
								echo"<div class='col-md-3 col-sm-6 col-xs-12 isotope-item tab-2'>";
									echo"<div class='portfolio-wrapper'>";
										echo"<div class='portfolio-thumb'>";
											echo"<img src='images/".$row["category"]."' alt=''>";
												echo"<div class='portfolio-content'>";
													echo"<div class='pop-up-icon'>";
													echo"<a class='left-link' href='#product-preview' data-toggle='modal'><i class='fa fa-search'></i></a>";
													echo"<a class='center-link' href='#'><i class='cart-icn'> </i></a>";
													echo"<a class='right-link' href='#'><i class='fa fa-heart'> </i></a>";
													echo "</div>";
												echo "</div>";
										echo "</div>";
									echo"<div class='product-content'>";
									echo"<h3> <a class='title-3 fsz-18' href='#'>".$row["category"]."</a> </h3>";
									echo"<p class='font-2'>Starting from<span class='thm-clr'> $ ".$row["category"]."</span> </p>";  
									echo "</div>";		
									echo "</div>";
								echo "</div>";

								echo"<div class='col-md-3 col-sm-6 col-xs-12 isotope-item tab-1 '>";
									echo"<div class='portfolio-wrapper'>";
										echo"<div class='portfolio-thumb'>";
											echo"<img src='images/".$row["category"]."' alt=''>";
												echo"<div class='portfolio-content'>";
													echo"<div class='pop-up-icon'>";
													echo"<a class='left-link' href='#product-preview' data-toggle='modal'><i class='fa fa-search'></i></a>";
													echo"<a class='center-link' href='#'><i class='cart-icn'> </i></a>";
													echo"<a class='right-link' href='#'><i class='fa fa-heart'> </i></a>";
													echo "</div>";
												echo "</div>";
										echo "</div>";
									echo"<div class='product-content'>";
									echo"<h3> <a class='title-3 fsz-18' href='#'>".$row["category"]."</a> </h3>";
									echo"<p class='font-2'>Starting from<span class='thm-clr'> $ ".$row["category"]."</span> </p>";  
									echo "</div>";		
									echo "</div>";
								echo "</div>";
							echo "</div>";
								?> 
                    </div>
                </div>
            </section>
            <!-- / New Arrivals -->

            <!-- Featured Products -->
			

            <section class="box-content">   
                <div class="fancy-heading text-center spcbtm-15">
                    <h3>Featured Products</h3>
                    <h5 class="funky-font-2">Our featured products here</h5>
                </div>
                <div class="featured-products diblock">
                    <div class="col-sm-6 col-lg-3 no-lr-padding">
                        <div class="image"><img src="assets/img/products/featured-product-1.png" alt="Product"></div>
                        <div class="description">
                            <div class="text">
                                <a href="#" class="add-to-cart cart-icn2"></a>
                                <div class="brand funky-font-2 ">Cycling Shoes</div>
                                <div class="name"><a href="#">Sidebike m065 pro</a></div>
                                <div class="price font-3">$250.00</div>
                                <div class="rating">                                                              
                                    <span class="star active"></span>
                                    <span class="star active"></span>
                                    <span class="star active"></span>                                           
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 no-lr-padding">
                        <div class="image"><img src="assets/img/products/featured-product-2.png" alt="Product"></div>
                        <div class="description">
                            <div class="text">
                                <a href="#" class="add-to-cart cart-icn2"></a>
                                <div class="brand funky-font-2 ">Cycling Shoes</div>
                                <div class="name"><a href="#">Sidebike m065 pro</a></div>
                                <div class="price font-3">$250.00</div>
                                <div class="rating">                                                              
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>                                           
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 no-lr-padding">
                        <div class="image"><img src="assets/img/products/featured-product-3.png" alt="Product"></div>
                        <div class="description">
                            <div class="text">
                                <a href="#" class="add-to-cart cart-icn2"></a>
                                <div class="brand funky-font-2 ">Cycling Shoes</div>
                                <div class="name"><a href="#">Sidebike m065 pro</a></div>
                                <div class="price font-3">$250.00</div>
                                <div class="rating">                                                              
                                    <span class="star active"></span>
                                    <span class="star active"></span>
                                    <span class="star active"></span>                                           
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 no-lr-padding">
                        <div class="image"><img src="assets/img/products/featured-product-4.png" alt="Product"></div>
                        <div class="description">
                            <div class="text">
                                <a href="#" class="add-to-cart cart-icn2"></a>
                                <div class="brand funky-font-2 ">Cycling Shoes</div>
                                <div class="name"><a href="#">Sidebike m065 pro</a></div>
                                <div class="price font-3">$250.00</div>
                                <div class="rating">                                                              
                                    <span class="star active"></span>
                                    <span class="star active"></span>
                                    <span class="star"></span>                                           
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 no-lr-padding">
                        <div class="image"><img src="assets/img/products/featured-product-5.png" alt="Product"></div>
                        <div class="description">
                            <div class="text">
                                <a href="#" class="add-to-cart cart-icn2"></a>
                                <div class="brand funky-font-2 ">Cycling Shoes</div>
                                <div class="name"><a href="#">Sidebike m065 pro</a></div>
                                <div class="price font-3">$250.00</div>
                                <div class="rating">                                                              
                                    <span class="star active"></span>
                                    <span class="star active"></span>
                                    <span class="star active"></span>                                           
                                    <span class="star half"></span>
                                    <span class="star"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 no-lr-padding">
                        <div class="image"><img src="assets/img/products/featured-product-6.png" alt="Product"></div>
                        <div class="description">
                            <div class="text">
                                <a href="#" class="add-to-cart cart-icn2"></a>
                                <div class="brand funky-font-2 ">Cycling Shoes</div>
                                <div class="name"><a href="#">Sidebike m065 pro</a></div>
                                <div class="price font-3">$250.00</div>
                                <div class="rating">                                                              
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>                                           
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 no-lr-padding">
                        <div class="image"><img src="assets/img/products/featured-product-7.png" alt="Product"></div>
                        <div class="description">
                            <div class="text">
                                <a href="#" class="add-to-cart cart-icn2"></a>
                                <div class="brand funky-font-2">Cycling Shoes</div>
                                <div class="name"><a href="#">Sidebike m065 pro</a></div>
                                <div class="price font-3">$250.00</div>
                                <div class="rating">                                                              
                                    <span class="star active"></span>
                                    <span class="star active"></span>
                                    <span class="star active"></span>                                           
                                    <span class="star half"></span>
                                    <span class="star"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / Featured Products -->

            <!-- Product Slider -->
            <section class="gst-row wht-clr gst-cta row-cta ovh">
                <div class="container theme-container">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <h2>Found your <span class="thm-clr extbold-font-4">Dream Bike</span>? Why wait</h2>
                            <p class="gry-clr fsz-16">Get it now with a 0% finance deal from GoShop Fashion..</p>
                        </div>

                        <div class="col-md-5 col-sm-12 col-xs-12 text-right gst-cta-buttons">
                            <a href="#" class="fancy-btn-alt fancy-btn-small">Discover</a>
                            <a href="#" class="fancy-btn fancy-btn-small">Purchase</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / Product Slider -->

            <!-- Product Slider -->
            <section class="gst-row row-carbon-fiber ovh">
                <div class="container theme-container">
                    <div class="gst-column col-lg-12 no-padding text-center">
                        <div class="fancy-heading text-center">
                            <h3>Carbon Fiber <span class="thm-clr">Cervelo</span></h3>
                            <h5 class="funky-font-2">Limited time offer only on GoShop</h5>
                        </div>

                        <div class="row"> 
                            <div class="col-lg-8 col-sm-8">
                                <div class="gst-empty-space clearfix"></div>
                                <div class="gst-empty-space clearfix"></div>
                                <div id="countdown-timer1" class="gst-countdown"></div>
                                <div class="gst-empty-space clearfix"></div>
                                <div class="gst-empty-space clearfix"></div>
                                <img class="right" src="assets/img/products/bike-1.png" alt="" />                           
                            </div>

                            <div class="col-lg-4 col-sm-4">
                                <img src="assets/img/extra/person.png" alt="" />
                            </div>
                        </div>

                        <div class="price-tag">   
                            <span> <b class="fsz-25 blk-clr" > PRICE: </b> </span>
                            <span class="thm-clr fsz-40 light-font-3"> $<b>1150</b> </span>
                            <span class="discnt fsz-40 light-font-3"> $<b>1850</b> </span>                            
                        </div>
                        <div class="gst-empty-space clearfix"></div>
                        <a href="single-product.html" class="fancy-btn fancy-btn-small">Add to Cart</a>
                    </div>
                </div>
            </section>
            <!-- / Product Slider -->

            <!-- Testimonials Slider -->
            <section class="gst-row gst-color-white row-they-say ovh" id="they-say-carousel">
                <div class="container theme-container">
                    <div class="gst-column col-lg-12 no-padding text-center">
                        <div class="fancy-heading text-center wht-clr">
                            <h3>They Says</h3>
                            <h5 class="funky-font-2">Happy Clients</h5>
                        </div>

                        <div class="quotes-carousel">
                            <div class="they-say nav-2">
                                <div class="item">                                   
                                    <p><strong>Cycling is a healthy</strong>, fun and exciting way to travel. No matter what type of cycling you're into, we;ve got a bike for you. We stock one of the larget bicycle ranges everywhere.</p>
                                    <cite>
                                        <strong>JESSICA WILSON</strong> - France
                                    </cite>
                                </div>

                                <div class="item">                              
                                    <p><strong>Cycling is a healthy</strong>, fun and exciting way to travel. No matter what type of cycling you're into, we;ve got a bike for you. We stock one of the larget bicycle ranges everywhere.</p>
                                    <cite>
                                        <strong>JESSICA WILSON</strong> - France
                                    </cite>
                                </div>

                                <div class="item">                               
                                    <p><strong>Cycling is a healthy</strong>, fun and exciting way to travel. No matter what type of cycling you're into, we;ve got a bike for you. We stock one of the larget bicycle ranges everywhere.</p>
                                    <cite>
                                        <strong>JESSICA WILSON</strong> - France
                                    </cite>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- / Testimonials Slider -->

            <!-- Special Offers -->
            <section class="container theme-container">
                <div class="gst-row">
                    <div class="fancy-heading text-center spcbtm-15">
                        <h3>Special Offers</h3>
                        <h5 class="funky-font-2">Special price only this month</h5>
                    </div>
                    <div class="special-offers row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="product">
                                <div class="image"><a href="#"><img src="assets/img/products/cat-1.png" alt="Product"></a></div>
                                <div class="right">
                                    <p class="funky-font-2">Mountain bike</p>
                                    <div class="name"><a href="#">GT SENSOR COMP 27.5</a></div>
                                    <div class="price font-2">Price: <span class="price-new">$299.00</span> <span class="price-old">$599.00</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="product">
                                <div class="image"><a href="#"><img src="assets/img/products/cat-2.png" alt="Product"></a></div>
                                <div class="right">
                                    <p class="funky-font-2">Mountain bike</p>
                                    <div class="name"><a href="#">BREEZER SQUALL 1.0</a></div>
                                    <div class="price font-2">Price: <span class="price-new">$299.00</span> <span class="price-old">$599.00</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="product">
                                <div class="image"><a href="#"><img src="assets/img/products/cat-3.png" alt="Product"></a></div>
                                <div class="right">
                                    <p class="funky-font-2">Mountain bike</p>
                                    <div class="name"><a href="#">GT SENSOR COMP 27.5</a></div>
                                    <div class="price font-2">Price: <span class="price-new">$299.00</span> <span class="price-old">$599.00</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="product">
                                <div class="image"><a href="#"><img src="assets/img/products/cat-4.png" alt="Product"></a></div>
                                <div class="right">
                                    <p class="funky-font-2">Mountain bike</p>
                                    <div class="name"><a href="#">BREEZER SQUALL 1.0</a></div>
                                    <div class="price font-2">Price: <span class="price-new">$299.00</span> <span class="price-old">$599.00</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="product">
                                <div class="image"><a href="#"><img src="assets/img/products/cat-5.png" alt="Product"></a></div>
                                <div class="right">
                                    <p class="funky-font-2">Mountain bike</p>
                                    <div class="name"><a href="#">GT SENSOR COMP 27.5</a></div>
                                    <div class="price font-2">Price: <span class="price-new">$299.00</span> <span class="price-old">$599.00</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="product">
                                <div class="image"><a href="#"><img src="assets/img/products/cat-6.png" alt="Product"></a></div>
                                <div class="right">
                                    <p class="funky-font-2">Mountain bike</p>
                                    <div class="name"><a href="#">GT SENSOR COMP 27.5</a></div>
                                    <div class="price font-2">Price: <span class="price-new">$299.00</span> <span class="price-old">$599.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / Special Offers -->

            <!-- Latest News -->
            <section class="gst-row row-latest-news ovh">
                <div class="container theme-container">
                    <div class="gst-column col-lg-12 no-padding">
                        <div class="fancy-heading text-center">
                            <h3>Latest <span class="thm-clr">News</span></h3>
                            <h5 class="funky-font-2">News from our blog</h5>
                        </div>

                        <div class="row gst-post-list">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="single.html">
                                    <img src="assets/img/blog/blog-1.jpg" alt="" />
                                </a>
                                <div class="media clearfix">
                                    <div class="entry-meta media-left">
                                        <div class="entry-time meta-date">
                                            <time datetime="2015-12-09T21:10:20+00:00">
                                                <span class="entry-time-date dblock">26</span>
                                                Dec
                                            </time>
                                        </div>
                                        <div class="entry-reply">
                                            <a href="single.html#comments" class="comments-link">
                                                <i class="fa fa-comment dblock"></i>
                                                125
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <header class="entry-header">
                                            <span class="vcard author entry-author">
                                                <a class="url fn n" rel="author" href="single.html">
                                                    Scott Williams
                                                </a>
                                            </span>
                                            <span class="entry-categories">
                                                <a href="category.html">Bike Tours</a>
                                            </span>
                                            <h3 class="entry-title">
                                                <a class="blk-clr" href="single.html" rel="bookmark">Bike injuries are on the rise, but there's still reason to ride</a>
                                            </h3>

                                            <a href="single.html" class="read-more-link thm-clr">Read More <i class="fa fa-long-arrow-right"></i> </a>
                                        </header>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="single.html">
                                    <img src="assets/img/blog/blog-2.jpg" alt="" />
                                </a>
                                <div class="media clearfix">
                                    <div class="entry-meta media-left">
                                        <div class="entry-time meta-date">
                                            <time datetime="2015-12-09T21:10:20+00:00">
                                                <span class="entry-time-date dblock">26</span>
                                                Dec
                                            </time>
                                        </div>
                                        <div class="entry-reply">
                                            <a href="single.html#comments" class="comments-link">
                                                <i class="fa fa-comment dblock"></i>
                                                125
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <header class="entry-header">
                                            <span class="vcard author entry-author">
                                                <a class="url fn n" rel="author" href="single.html">
                                                    Scott Williams
                                                </a>
                                            </span>
                                            <span class="entry-categories">
                                                <a href="category.html">Bike Tours</a>
                                            </span>
                                            <h3 class="entry-title">
                                                <a class="blk-clr" href="single.html" rel="bookmark">Bike injuries are on the rise, but there's still reason to ride</a>
                                            </h3>

                                            <a href="single.html" class="read-more-link thm-clr">Read More <i class="fa fa-long-arrow-right"></i> </a>

                                        </header>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a href="single.html">
                                    <img src="assets/img/blog/blog-3.jpg" alt="" />
                                </a>
                                <div class="media clearfix">
                                    <div class="entry-meta media-left">
                                        <div class="entry-time meta-date">
                                            <time datetime="2015-12-09T21:10:20+00:00">
                                                <span class="entry-time-date dblock">26</span>
                                                Dec
                                            </time>
                                        </div>
                                        <div class="entry-reply">
                                            <a href="single.html#comments" class="comments-link">
                                                <i class="fa fa-comment dblock"></i>
                                                125
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <header class="entry-header">
                                            <span class="vcard author entry-author">
                                                <a class="url fn n" rel="author" href="single.html">
                                                    Scott Williams
                                                </a>
                                            </span>
                                            <span class="entry-categories">
                                                <a href="category.html">Bike Tours</a>
                                            </span>
                                            <h3 class="entry-title">
                                                <a class="blk-clr" href="single.html" rel="bookmark">Bike injuries are on the rise, but there's still reason to ride</a>
                                            </h3>

                                            <a href="single.html" class="read-more-link thm-clr">Read More <i class="fa fa-long-arrow-right"></i> </a>

                                        </header>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Latest News -->

            <!-- OPENING HOURS -->
            <section class="gst-row our-address">
                <div class="container theme-container">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 add-wrap">
                        <div class=" text-center">
                            <h2 class="fsz-35"> <span class="bold-font-3 wht-clr">GoShop</span> <span class="thm-clr funky-font">bikes</span> </h2>
                            <p>148 Parramatta Road Stanmore NSW 2048, New York City <br>
                                Call Sales & Workshop : (02) 9567 1999</p>
                            <div class="fancy-heading text-center">
                                <h2 class="title-2">OPENING HOURS</h2>                           
                            </div>
                            <p> Monday to Wednesday from 10.00AM - 17.00PM </p>
                            <p> Thursday to Sunday from 11.00AM - 19.00PM </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / OPENING HOURS -->

        </div>                                                                                                                       
        <div class="clear"></div>

        <!-- FOOTER -->
        <footer class="site-footer clearfix" itemscope itemtype="https://schema.org/WPFooter">
            <div class="site-main-footer container theme-container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 clearfix">
                        <section class="widget footer-widget widget_text clearfix">
                            <div class="textwidget">
                                <p class="fsz-35"> <span class="bold-font-3 wht-clr">GoShop</span> <span class="thm-clr funky-font">bikes</span> </p>
                                <p>ECommerce HTML Template</p>
                                <div class="author-info-social">
                                    <a class="goshop-share rcc-google" href="http://google.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                    <a class="goshop-share rcc-twitter" href="http://twitter.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a class="goshop-share rcc-facebook" href="http://facebook.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a class="goshop-share rcc-linkedin" href="http://linkedin.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <a class="goshop-share rcc-pinterest" href="http://pinterest.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-md-3 col-sm-6 clearfix">
                        <section class="widget footer-widget widget_nav_menu clearfix">
                            <h6 class="widget-title">My Account</h6>
                            <ul>
                                <li class="menu-item"><a href="#">Personal Information</a></li>
                                <li class="menu-item"><a href="#">Address</a></li>
                                <li class="menu-item"><a href="#">Discount</a></li>
                                <li class="menu-item"><a href="#">Order History</a></li>
                            </ul>
                        </section>
                    </div>

                    <div class="col-md-3 col-sm-6 clearfix">
                        <section id="nav_menu-3" class="widget footer-widget widget_nav_menu clearfix">
                            <h6 class="widget-title">Our Services</h6>
                            <ul>
                                <li class="menu-item"><a href="#">Shipping Return</a></li>
                                <li class="menu-item"><a href="#">International Shipping</a></li>
                                <li class="menu-item"><a href="#">Secure Shopping</a></li>
                                <li class="menu-item"><a href="#">Affiliates</a></li>
                                <li class="menu-item"><a href="#">F.A.Q</a></li>
                            </ul>
                        </section>
                    </div>

                    <div class="col-md-3 col-sm-6 clearfix">
                        <section id="text-6" class="widget footer-widget widget_text clearfix">
                            <h6 class="widget-title">Newsletter</h6>
                            <div class="textwidget">
                                Lorem ipsum dolor sit amet conseret adipiscing elit sed diam nonunem.
                                <form class="mc4wp-form">
                                    <p>
                                        <label>Email address: </label>
                                        <input type="email" name="EMAIL" placeholder="Your email address" required />
                                    </p>

                                    <p>
                                        <button class="submit"> <i class="fa fa-envelope-o"></i> </button>                                      
                                    </p>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="post-footer">
                    <div class="payment-systems text-center">
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-1.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-2.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-3.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-4.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-5.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-6.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-7.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-8.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-1.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-2.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-5.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-3.png" alt=""></a> </div>
                    </div>
                </div>
            </div>

            <div class="subfooter text-center">
                <div class="container theme-container">
                    <p>Copyright &copy; <a href="#" class="thm-clr"> jThemes Studio</a>.  All Right Reserved 2015</p>
                </div>
            </div>
        </footer>
        <!-- / FOOTER -->

        <!-- Subscribe Popup 1 --><!--
        <section class="subscribe-me">
            <a href="#close" class="sb-close-btn close popup-cls"><i class="fa-times fa"></i></a>      
            <div class="modal-content subscribe-1 wht-clr">   
                <div class="login-wrap text-center">                        
                    <h2 class="fsz-35 spcbtm-15"> <span class="bold-font-3 wht-clr">GoShop</span> <span class="thm-clr funky-font">bikes</span> </h2>
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
        </section> -->
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
                                <div class="form-group"><input type="text" id="user_pass" name="login_pwd" placeholder="Password" class="form-control"></div>
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

<!-- Mirrored from event-theme.com/themes/goshophtml/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:27:45 GMT -->
</html>