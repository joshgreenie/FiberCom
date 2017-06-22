<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Firetoss_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function firetoss_seed_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'firetoss_seed_body_classes' );

function ft_responsive_image($image_id,$image_size,$max_width){

    // check the image ID is not blank
    if($image_id != '') {

        // set the default src image size
        $image_src = wp_get_attachment_image_url( $image_id, $image_size );

        // set the srcset with various image sizes
        $image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

        // generate the markup for the responsive image
        echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

    }
}

