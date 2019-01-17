<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package restaurant
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function restaurant_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'restaurant_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function restaurant_woocommerce_scripts() {
	wp_enqueue_style( 'restaurant-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'restaurant-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'restaurant_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function restaurant_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'restaurant_woocommerce_active_body_class' );

/**
 * Woocomerce 
 */

// add short_description to woocommerce shop page.
add_action( 'woocommerce_after_shop_loop_item_title', 'restaurant_wc_excapce', 15 );

// remove woocommerce_result_count.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// remove woocommerce_catalog_ordering.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// remove woocommerce_breadcrumb.
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


// remove woocommerce_template_loop_product_link_open.
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

// remove woocommerce_template_loop_product_link_close.
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// add restaurant_product_link_open.
add_action( 'woocommerce_before_shop_loop_item_title', 'restaurant_product_link_open', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'restaurant_product_link_open', 5 );

// add restaurant_product_link_close.
add_action( 'woocommerce_before_shop_loop_item_title', 'restaurant_product_link_close', 15 );
add_action( 'woocommerce_shop_loop_item_title', 'restaurant_product_link_close', 15 );

//add restaurant_product_info_open for Product info.
add_action( 'woocommerce_shop_loop_item_title', 'restaurant_product_info_open', 5 );

//add restaurant_product_info_close for Product info.
add_action( 'woocommerce_after_shop_loop_item', 'restaurant_product_info_close', 15 );

add_action( 'woocommerce_before_main_content', 'container_open', 5 );
add_action( 'woocommerce_sidebar' ,'container_close', 10 );

add_action( 'woocommerce_after_subcategory', 'restaurant_product_info_close', 50 );

// add woocommerce_before_shop_loop_item_title.
add_action( 'woocommerce_before_shop_loop_item_title', 'restaurant_view_detail', 11 );