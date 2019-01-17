<?php
/**
 * Template part for displaying posts
 *
 * @package restaurant
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php        
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

        restaurant_post_thumbnail();

        ?>
        
	</header>

	

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
            the_content( sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'restaurant' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'restaurant' ),
                'after'  => '</div>',
            ) );
        } else {
            the_excerpt();
            ?>
            <a class="read-more" href="<?php the_permalink(); ?>">
                <?php esc_html_e( 'CONTINUE READING', 'restaurant' ); ?>
            </a>
            <?php
        }
		?>
	</div>

    <?php if ( 'post' === get_post_type() ) :
        ?>
        <div class="entry-meta">
            <?php
            /**
            *restaurant_posted_on', 10
            *restaurant_posted_by', 20
            *restaurant_posted_comment', 30
            *restaurant_posted_social', 40
            */
            ?>
            <?php do_action( 'restaurant_posted' ); ?>
        </div>

        <?php if ( is_singular( 'post' ) ) {
            get_template_part( 'author-bio' );
        } ?>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
