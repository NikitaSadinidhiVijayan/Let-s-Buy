<?php

require_once("./libs/core/init.php");
require_once("./libs/login_lib.php");
require_once("./libs/functions.php");
global $cat;
global $cat_name
?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from event-theme.com/themes/goshophtml/default/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:30:30 GMT -->
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Product Detail Page</title>

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
    <body class="single single-product woocommerce woocommerce-page">

        <!-- HEADER -->
        <header id="masthead" class="clearfix" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
            <div class="site-subheader site-header">
                <div class="container theme-container">
                    <!-- Language & Currency Switcher -->
            

                    <!-- Mini Cart -->
                    <ul class="pull-right list-unstyled list-inline">
                        <li class="nav-dropdown">
                            <a href="#">My Account</a>
                            <ul class="nav-dropdown-inner list-unstyled accnt-list">
                                <li> <a href="my-account.html">My Account</a></li>                                                
                                <li> <a href="account-info.html"> Account Information </a></li>                                                
                                <li> <a href="cng-pw.html">Change Password</a></li>
                                <li> <a href="address-book.html">Address Books</a></li>
                                <li> <a href="buyer_view.php">Order History</a></li>	<!--Niki added buyer view-->
                                <li> <a href="review-rating.html">Reviews and Ratings</a></li>

                            </ul>
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
					<!--Logo code -->
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="top-header pull-left">
                                <div class="logo-area">
                                    <a href="index-2.html" class="thm-logo fsz-35">
                                        <!--<img src="files/main-logo.png" alt="Goshop HTML Theme">  Niki Changed nav bar-->
                                        <b class="bold-font-3 wht-clr"> International  </b> <span class="thm-clr funky-font"> Trade </span>
                                    </a>
                                </div>                              
                            </div>
                        </div>
                        <!-- Navigation -->
							 <!-- Niki Changed nav bar-->
                        <div class="col-md-9 col-sm-9 static-div">
                            <div class="navigation pull-left">
                                <nav>                                                               
                                    <div class="" id="primary-navigation">                                        
                                        <ul class="nav navbar-nav primary-navbar">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Home</a>
                                                <ul class="dropdown-menu">  
                                                    <li><a href="index.php">Home</a></li>
                                                    <li><a href="index-3.html">User</a></li>
                                                    <!-- Niki need to add code for user switch based on buyer and seller-->    
                                                    
                                                </ul>
                                            </li> 
                                            
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
                                           
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Blog</a>
                                                <ul class="dropdown-menu">  
                                                    <li><a href="blog.html"> Blog </a></li>                                            
                                                    <li><a href="blog-leftside.html"> Blog Lef Sidebar</a></li>
                                                    <li><a href="blog-single.html"> Blog Single </a></li>                                                   
                                                </ul>
                                            </li>
                                            <li><a href="contact-us.html">Contact</a></li>
                                            <li class="dropdown mega-dropdown active">
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
            <div class="site-pagetitle jumbotron">
                <div class="container theme-container text-center">
                    <h3>International Trade Product</h3>

                    <!-- Breadcrumbs -->
                    <div class="breadcrumbs">
                        <div class="breadcrumbs text-center">
                            <i class="fa fa-home"></i>
                            <span><a href="index-2.html">Home</a></span>
                            <i class="fa fa-arrow-circle-right"></i>
                            <span class="current">Shop</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="theme-container container">
                <main id="main-content" class="main-content">                  
                    <div itemscope itemtype="http://schema.org/Product" class="product has-post-thumbnail product-type-variable">
						<!-- PHP Code -->
							<?php 
								if(isset($_GET['deal_url_id']))
									{
									$var_deal_url_id = $_GET['deal_url_id'];
									// Quering for Particular ID
									$sql = "SELECT * FROM create_deal WHERE deal_id='$var_deal_url_id'";
									$res=mysqli_query($con,$sql);
									while($row = mysqli_fetch_assoc($res))
									 {
										$cat = $row['deal_category'];
										// Image Section
										echo"<div class='row'>";
										echo"<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>";
										echo"<div id='gallery-2' class=''>";
										echo"<a class='rsImg' data-rsbigimg='images/".$row["deal_image"]."' href='images/".$row["deal_image"]."' ></a>";
										echo"</div>";
										echo"</div>";
										echo"<div class='spc-15 hidden-lg clear'></div>";
										// Details Section
										echo"<div class='col-lg-8 col-sm-8 col-md-8 col-xs-8'>";
										echo"<div class='summary entry-summary'>";
										echo"<div class='woocommerce-product-rating' itemprop='aggregateRating' itemscope itemtype='http://schema.org/AggregateRating'>";

                                        echo"<div class='posted_in'>";
                                            echo"<h3 class='funky-font-2 fsz-20'>".$cat_name."</h3>";
                                        echo"</div>";
                                    echo"</div>";

                                    echo"<div class='product_title_wrapper'>";
                                        echo"<div itemprop='name' class='product_title entry-title'>";
                                            echo"".$row["title"]."";
                                            echo"<p class='font-3 fsz-18 no-mrgn price'> <b class='amount blk-clr'>$".$row["amount_discount_1"]."</b> <del>$".$row["unit_price"]."</del> </p>";       
                                        echo"</div>";
                                    echo"</div>";
									
									echo"<div class='rating'>";
                                             echo"<span class='star active'></span>";
                                             echo"<span class='star active'></span>";
                                             echo"<span class='star active'></span>";                                          
                                             echo"<span class='star active'></span>";
                                             echo"<span class='star half'></span>";
                                        echo"</div>";
									
                                    echo"<div itemprop='description' class='fsz-15'>";
                                        echo"<p>".$row["description"]."</p>"; 
										echo"<p class='progress-bar progress-bar-info'></p>";
                                    echo"</div>";
									
									
									echo"<div style='width: 35%;' class='progress-bar progress-bar-info'>";
									echo"</div>";
									
                                    /*<ul class="stock-detail list-items fsz-12">
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
                                    </form> */
                                echo"</div>";
                            
										echo"</div>";
										}
									}
									
                            ?>
							<!-- PHP Code ENDS -->
							
							<!--<PHP CODE FOR CATEOGRY> -->
								<?php
								$sql1="SELECT * FROM category where cat_id=$cat";
								$res1=mysqli_query($con,$sql1);
								while($row1 = mysqli_fetch_assoc($res1))
									{
						              $cat_name = $row1["category"]."</a>";  
										echo $cat_name;
									}
								?>
							<!-- PHP CATEOGRY Code ENDS -->
							
                        <div class="clearfix"></div>

                        <div class="woocommerce-tabs wc-tabs-wrapper row">
                            <ul class="tabs wc-tabs">
                                <li class="description_tab">
                                    <a href="#tab-description">Description</a>
                                </li>
                                <li class="additional_information_tab">
                                    <a href="#tab-additional_information">Additional Information</a>
                                </li>
                                <li class="reviews_tab">
                                    <a href="#tab-reviews">Reviews (3)</a>
                                </li>
                            </ul>

                            <div class="entry-content wc-tab col-lg-4 col-sm-6 col-xs-12" id="tab-description">
                                <h2 class="title-3">Description</h2>
                                <hr class="heading-seperator" />
                                <div class="scroll-div">
                                    <div class="nano-content">
                                        <p> It’s a cute reversitile hand bag / shoulder bag that comes with straps inside it if you choose to 
                                            wear on the shoulders and from what photo show I can put my apple ipad on side comfortably in it ~ very cool 
                                            idea , plus theirs 5 storing compartments and 2 smaller ones for a total of 6 and it has nice flowers printed 
                                            designs on white shiny section on bag and straight. </p>
                                        <p>stitched lines on black shiny section , and 2 strips of gold on each end going up and down over the hill on each side identical on handbag.</p>
                                        <p> It’s a cute reversitile hand bag / shoulder bag that comes with straps inside it if you choose to 
                                            wear on the shoulders and from what photo show I can put my apple ipad on side comfortably in it ~ very cool 
                                            idea , plus theirs 5 storing compartments and 2 smaller ones for a total of 6 and it has nice flowers printed 
                                            designs on white shiny section on bag and straight. </p>
                                        <p>stitched lines on black shiny section , and 2 strips of gold on each end going up and down over the hill on each side identical on handbag.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="entry-content wc-tab col-lg-4 col-sm-6 col-xs-12" id="tab-reviews">
                                <h2 class="title-3">Product Review</h2>
                                <hr class="heading-seperator" />
                                <div class="scroll-div">
                                    <div class="nano-content">
                                        <div id="reviews">
                                            <div id="comments">
                                                <ol class="commentlist">
                                                    <li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment even thread-even depth-1">
                                                        <div class="comment_container diblock">
                                                            <img alt="" src="assets/img/extra/review-1.jpg" itemprop="image" class="avatar" height="60" width="60" />
                                                            <div class="comment-text">
                                                                <strong class="name">JOHN LENNON</strong>
                                                                <div class="rating"> 
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>                                           
                                                                    <span class="star active"></span>
                                                                    <span class="star half"></span>
                                                                </div>
                                                                <p class="meta">
                                                                    <time itemprop="datePublished" datetime="2013-06-07T13:03:29+00:00"> 2 June, 2016</time>:
                                                                </p>
                                                                <div itemprop="description" class="description">
                                                                    <p>cute reversitile hand bag  shoulder bag that comes with straps inside it if you choose to wear</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li><!-- #comment-## -->

                                                    <li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment even thread-even depth-1">
                                                        <div class="comment_container diblock">
                                                            <img alt="" src="assets/img/extra/review-1.jpg" itemprop="image" class="avatar" height="60" width="60" />
                                                            <div class="comment-text">
                                                                <strong class="name">JOHN LENNON</strong>
                                                                <div class="rating"> 
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>                                           
                                                                    <span class="star active"></span>
                                                                    <span class="star half"></span>
                                                                </div>
                                                                <p class="meta">
                                                                    <time itemprop="datePublished" datetime="2013-06-07T13:03:29+00:00"> 2 June, 2016</time>:
                                                                </p>
                                                                <div itemprop="description" class="description">
                                                                    <p>cute reversitile hand bag  shoulder bag that comes with straps inside it if you choose to wear</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li><!-- #comment-## -->

                                                    <li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment even thread-even depth-1">
                                                        <div class="comment_container diblock">
                                                            <img alt="" src="assets/img/extra/review-1.jpg" itemprop="image" class="avatar" height="60" width="60" />
                                                            <div class="comment-text">
                                                                <strong class="name">JOHN LENNON</strong>
                                                                <div class="rating"> 
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>                                           
                                                                    <span class="star active"></span>
                                                                    <span class="star half"></span>
                                                                </div>
                                                                <p class="meta">
                                                                    <time itemprop="datePublished" datetime="2013-06-07T13:03:29+00:00"> 2 June, 2016</time>:
                                                                </p>
                                                                <div itemprop="description" class="description">
                                                                    <p>cute reversitile hand bag  shoulder bag that comes with straps inside it if you choose to wear</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li><!-- #comment-## -->
                                                </ol>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="entry-content wc-tab col-lg-4 col-sm-6 col-xs-12" id="tab-additional_information">
                                <h2 class="title-3">Additional Information</h2>
                                <hr class="heading-seperator" />
                                <div class="scroll-div">
                                    <div class="nano-content">
                                        <h2 class="title-3 fsz-14 no-mrgn spcbt-30"> ASIN: <span class="thm-clr"> B00IL3TMFW </span> </h2>
                                        <p>Product Dimensions: 11 x 5.5 x 8.7 inches; 1.8 pounds.</p>
                                        <p>Shipping Weight: 1.8 pounds <br>
                                            (View shipping rates and policies)</p>
                                        <p>Item model number: NB-B00IL3TMFW</p>
                                        <p>Average Customer Review:    29 customer reviews</p>
                                        <p>Would you like to give feedback on images?</p>   
                                        <p>Item model number: NB-B00IL3TMFW</p>
                                        <p>Average Customer Review:    29 customer reviews</p>
                                        <p>Would you like to give feedback on images?</p>   
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>                    
                </main>
            </div>

            <div class=" light-bg gst-row">
                <div class="fancy-heading text-center">
                    <h3> RELATED PRODUCTS </h3>
                    <h5 class="funky-font-2"> Customers who viewed this item also viewed </h5>                
                </div>

                <!-- Portfolio items -->
                <div class="related-product nav-2 text-center">
                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-1.png" alt="" />                                                 
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> CICLYSMO JACKET </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-2.png" alt="" />                                                  
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> LYCRA BITZ MEN CLOTHING </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-3.png" alt="" />
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> CICLYSMO JACKET </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-4.png" alt="" />
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> LYCRA BITZ MEN CLOTHING </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-5.png" alt="" />
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> CICLYSMO JACKET </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-6.png" alt="" />
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> LYCRA BITZ MEN CLOTHING </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>

        <!-- Subscribe News -->
        <section class="gst-row gst-color-white row-newsletter ovh">
            <div class="gst-wrapper">
                <div class="gst-column col-lg-12 no-padding text-center">
                    <div class="fancy-heading text-center">
                        <h3 class="wht-clr">Subscribe Newsletter</h3>
                        <h5 class="funky-font-2 wht-clr">Sign up for <span class="thm-clr">Special Promotion</span></h5>
                    </div>

                    <p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut<br /> laoreet dolore magna aliquam erat volutpat.</p>

                    <div class="gst-empty-space clearfix"></div>

                    <form>
                        <div class="col-md-2"> <h4> <strong class="fsz-20"> <span class="thm-clr">Subscribe</span> to us </strong> </h4> </div>
                        <div class="gst-empty-space visible-sm clearfix"></div>
                        <div class="col-md-4 col-sm-4">
                            <input type="text" class="dblock" placeholder="Enter your name" />
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <input type="text" class="dblock" placeholder="Enter your email address" />
                        </div>

                        <div class="col-md-2 col-sm-4">
                            <input type="submit" class="dblock fancy-button" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- / Subscribe News -->

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

                <div class="modal-content login-1 wht-clr">   
                    <div class="login-wrap text-center">                        
                        <h2 class="fsz-35 spcbtm-15"> <span class="bold-font-3 wht-clr">GoShop</span> <span class="thm-clr funky-font">fashion</span> </h2>
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

        <!-- Page JS -->      
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>

<!-- Mirrored from event-theme.com/themes/goshophtml/default/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:30:32 GMT -->
</html>