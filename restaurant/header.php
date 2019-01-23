<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package restaurant
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'restaurant' ); ?></a>

	<header id="masthead" class="site-header">
    	<div class="container_header">
            <div class="container">
                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                    endif;
                    ?>
                </div>

                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'container'      => 'nav',
                    'menu_class'     => 'primary-menu menu',
                ) );
                ?>

                <button class="btn-menu"><?php esc_html_e( 'RESERVATION', 'restaurant' ); ?></button>

                <button id="pull"><a href="#menu" id="toggle"><span></span></a></button>
            </div>
            
        </div>

        <div class="banner" style="<?php restaurant_page_header_background(); ?>">
            <div class="container">
                <?php restaurant_title_blog(); ?>
            </div>
        </div>
	</header>

	<div id="content" class="site-content">
