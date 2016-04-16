<?php

// Get login information
//require_once("_lib_login.php");
//$login = new Login($_GET['login_id'], $_GET['login_pwd']);

// Set passing login info var
//$get_var = "";
$member_type = "";

if (isset($_SESSION["uid"])) {
    $member_type = strtolower($_SESSION["utype"]);
}


/*
 * Kevin: 03/09/2016
 * Deprecated code used before DB
 *
if (isset($_GET['login_id']) && isset($_GET['login_pwd'])) {
    $get_var = "?login_id=".$login->id."&login_pwd=".$login->pwd."&member_type=".$login->member_type;
    $member_type = $login->member_type;
}
else {
    $get_var = "";
}
*/


// Get current page name
$page_name = basename($_SERVER['PHP_SELF']);

// Set menu and page name pair
$menu_items_seller = array(
    'Home'=>"index.php",
    'Seller'=>"seller_view.php",
    'Create Deals'=>"deals.php",
    'My Profile'=>"profile.php",
    'Logout'=>"logout.php"
);

$menu_items_buyer = array(
    'Home'=>"index.php",
    'My Profile'=>"profile.php",
    'Logout'=>"logout.php"
);

$menu_items_logout = array(
    'Home'=>"index.php",
    'About'=>"about.php",
    'Sign-up'=>"register.php",
    'Login'=>"login.php"
);

// Generate menu code
$menu_display = "";

if ($member_type == "seller") { // When seller
    foreach($menu_items_seller as $key => $value) {
        if ($page_name == $value) {
            //$menu_display = $menu_display."<li class=\"active\"><a href=\"".$value.$get_var."\">".$key."</a></li>";
            $menu_display = $menu_display."<li class=\"active\"><a href=\"".$value."\">".$key."</a></li>";
        }
        else {
            //$menu_display = $menu_display."<li><a href=\"".$value.$get_var."\">".$key."</a></li>";
            $menu_display = $menu_display."<li><a href=\"".$value."\">".$key."</a></li>";
        }
    }
} else if ($member_type == "buyer") { // When buyer
    foreach($menu_items_buyer as $key => $value) {
        if ($page_name == $value) {
            //$menu_display = $menu_display."<li class=\"active\"><a href=\"".$value.$get_var."\">".$key."</a></li>";
            $menu_display = $menu_display."<li class=\"active\"><a href=\"".$value."\">".$key."</a></li>";
        }
        else {
            //$menu_display = $menu_display."<li><a href=\"".$value.$get_var."\">".$key."</a></li>";
            $menu_display = $menu_display."<li><a href=\"".$value."\">".$key."</a></li>";
        }
    }
} else { // Not logged in yet
    foreach($menu_items_logout as $key => $value) {
        if ($page_name == $value) {
            //$menu_display = $menu_display."<li class=\"active\"><a href=\"".$value.$get_var."\">".$key."</a></li>";
            $menu_display = $menu_display."<li class=\"active\"><a href=\"".$value."\">".$key."</a></li>";
        }
        else {
            //$menu_display = $menu_display."<li><a href=\"".$value.$get_var."\">".$key."</a></li>";
            $menu_display = $menu_display."<li><a href=\"".$value."\">".$key."</a></li>";
        }
    }
}

?>

<div class="navbar">
    <div class="navbar-inner">
        <div class="container">

            <!-- Navigation button, visible on small resolution -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-menu"></i>
            </button>
            <!-- Main navigation -->
            <div class="nav-collapse collapse pull-right">
                <ul class="nav" id="top-navigation">
                    <?php echo $menu_display; ?>
                </ul>
            </div>
            <!-- End main navigation -->
        </div>
    </div>
</div>
