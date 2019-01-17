<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package restaurant
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" style="<?php footer_style(); ?>">
		<div class="site-info">
            <div class="join-now" style="<?php restaurant_page_footer_background(); ?>">
                <div class="container">
                    <aside id="secondary" class="widget-area">
                        <?php 
                        if ( is_active_sidebar( 'footer-widget' ) ) {
                            dynamic_sidebar( 'footer-widget' );
                        }

                        if ( is_active_sidebar( 'subscribe-widget' ) ) {
                            dynamic_sidebar( 'subscribe-widget' );
                        }
                        ?>
                    </aside><!-- #secondary -->
                </div>
            </div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>

