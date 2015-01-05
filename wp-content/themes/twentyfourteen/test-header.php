<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/prettify.css" type="text/css" />
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/prettify.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<!-- Added jQuery script to include the 'prettyprint' class on <code> tags and to start up Prettify using the prettyPrint() function. -->
        <?php
            // Include jQuery from Google APIs.
            if (!is_admin()) {
                wp_deregister_script('jquery');
                wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '1.7.1');
                wp_enqueue_script('jquery');
            }
        ?>
	<?php wp_head(); ?>
	<script type="text/javascript">
        jQuery(document).ready(function() {
            var a = false;

            // Select all code tags in the document
            jQuery('code').each(function() {

                // Find the code tag's parent.
                var parent = jQuery(this).parent();

                // If the code tag's parent is a pre tag and doesn't have the class
                // prettyprint, then we add the prettyprint class and then wrap the tags
                // in a div that has the class codeblock. 
                if (parent.is("pre") && !parent.hasClass("prettyprint")) {
                    parent.addClass("prettyprint").wrap('<div class="codeblock"></div>');
                    a = true;
                }
                else if (!parent.is("pre")) {
                    // If the parent of the code tag is something other than pre then we just
                    // add the prettprint class and custom single_line_code class so we can add
                    // further styles if we want to.
                    jQuery(this).addClass("prettyprint").addClass("single_line_code");
                    a = true;
                }
            });

            // If we modified any of the tags then trigger prettyPrint() rendering.
            if (a) prettyPrint();
        });
    </script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<div class="search-toggle">
				<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
			</div>

			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></button>
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>
		</div>

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
