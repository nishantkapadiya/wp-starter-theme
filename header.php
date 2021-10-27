<?php
/**
* Default site header.
*/

if ( !defined( 'ABSPATH' ) || !function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes() ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" >
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <!-- <meta name="theme-color" content="#7b0a2e"/> -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />


	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
	<?php
	echo '<!-- start -->
	<div class="wrapper">
		<div class="main-container">
		<!-- device menu -->
			<div class="mbnav d-md-none">
                <div class="mbnav__backdrop"></div>
                <div class="mbnav__state" data-clickable="true">
                    <!-- menu header and hamburger -->
                    <div class="mbnav__top">
                        <div class="mbnav__logo">
                            <span>Navigation</span>
                        </div>
                        <a href="javascript:;" class="hamburger close">
                            <span class="hamburger__wrap">
                                <span class="hamburger__line"></span>
                                <span class="hamburger__line"></span>
                            </span>
                        </a>
                    </div>
                    <!--  main responsive menu -->
                    <div class="mbnav__inner">';
                    if ( has_nav_menu( 'main-menu' ) ) {
                        wp_nav_menu(array('theme_location' => 'main-menu','container' => 'ul'));
                    }
                    echo'</div>
                </div>
            </div>';
            $brand_logo = get_field( 'brand_logo','option' );
			echo'<header class="main-header py-30">
                <div class="container d-flex justify-content-between align-items-center">';
                if($brand_logo){
                    echo'<a href="'.home_url( '/' ).'" class="brand">
                        <img src="'.$brand_logo['url'].'" alt="'.get_bloginfo('name').'">
                    </a>';
                }
                if ( has_nav_menu( 'main-menu' ) ) {
                    echo'<div class="navigation">
                        <nav>';
                            wp_nav_menu(array('theme_location' => 'main-menu','container' => 'ul'));
                        echo'</nav>
                    </div>';
                }
                echo'<!-- hamburger -->
                <a href="javascript:;" class="hamburger">
                    <span class="hamburger__wrap">
                        <span class="hamburger__line"></span>
                        <span class="hamburger__line"></span>
                        <span class="hamburger__line"></span>
                    </span>
                </a>
                </div>
            </header>';
