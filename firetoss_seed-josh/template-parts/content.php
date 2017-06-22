<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Firetoss_Theme
 */

$featured_content = get_field('post_header_content');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--	<header class="entry-header">-->
		<?php
//		if ( is_single() ) :
//			the_title( '<h1 class="entry-title">', '</h1>' );
//		else :
//			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
//		endif;
//
//		if ( 'post' === get_post_type() ) :
            ?>
<!--		<div class="entry-meta">-->
<!--			--><?php //firetoss_seed_posted_on(); ?>
<!--		</div><!-- .entry-meta -->
<!--		--><?php
//		endif;
		?>
<!--	</header><!-- .entry-header -->

	<div class="entry-header">
        <div class="featured-image">
            <?php the_post_thumbnail( 'full' ); ?>
        </div>
        <?php if($featured_content):?>
        <div class="featured-text">
            <?=$featured_content;?>
        </div>
        <?php endif; ?>
    </div>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'firetoss_seed' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
//
//			wp_link_pages( array(
//				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'firetoss_seed' ),
//				'after'  => '</div>',
//			) );


        $external_url = get_field('external_url');
        echo $external_url ? "<a class='case-study-link button arrow' href='$external_url'>View website</a>" : "";
		?>
	</div><!-- .entry-content -->

<!--	<footer class="entry-footer">-->
<!--		--><?php //firetoss_seed_entry_footer(); ?>
<!--	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

