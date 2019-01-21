<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package restaurant
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function restaurant_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;

}
add_filter( 'body_class', 'restaurant_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function restaurant_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'restaurant_pingback_header' );

function restaurant_wc_excapce() {
    /**
     * Insert the short_description product for products in the loop.
     */
    global $product;
    $desc = $product->get_short_description();
    echo  '<div class="short-description">'. esc_html( $desc, 'restaurant' ) . '</div>' ;
}

if ( ! function_exists( 'restaurant_product_link_open' ) ) {
    /**
     * Insert the opening anchor tag for products in the loop.
     */
    function restaurant_product_link_open() {
        global $product;

        $link = apply_filters( 'restaurant_loop_product_link', get_the_permalink(), $product );

        echo '<a href="' . esc_url( $link ) . '" class="restaurant_product_link_open woocommerce-loop-product__link">';
    }
}

if ( ! function_exists( 'restaurant_product_link_close' ) ) {
    /**
     * Insert the close anchor tag for products in the loop.
     */
    function restaurant_product_link_close() {
        echo '</a>';
    }
}

if ( ! function_exists( 'restaurant_product_info_open' ) ) {
    /**
     * Insert the opening restaurant_product_info for products in the loop.
     */
    function restaurant_product_info_open() {
        echo '<div class="restaurant-product-info">';
    }
}

if ( ! function_exists( 'restaurant_product_info_close' ) ) {
    /**
     * Insert the close restaurant_product_info_close for products in the loop.
     */
    function restaurant_product_info_close() {
        echo '</div>';
    }
}

if ( ! function_exists( 'container_open' ) ) {
    function container_open() {
        echo '<div class="container">';
    }
}

if ( ! function_exists( 'container_close' ) ) {
    /**
     * Insert the close container_close for products in the loop.
     */
    function container_close() {
        echo '</div>';
    }
}

if ( ! function_exists( 'restaurant_view_detail' ) ) {
    function restaurant_view_detail() {
        echo '<div class="view-detail"> <span class="text-view">' . esc_html( 'View detail', 'restaurant' ) . '</span></div>';
    }
}


