<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Firetoss_Theme
 *
 * Template Name: Page w/ Sidebar
 */

get_header(); ?>



	<div id="flex" class="content-area with-sidebar">
<!--        <div class="container">-->
		<!-- put the grid containers in your individual flex containers -->
		<?php
		while ( have_posts() ) : the_post();

			//https://generatewp.com/wp_query/

			get_template_part( 'template-parts/content', 'flex' );

		endwhile; // End of the loop.

        $main_color = get_field('main_color', 'option'); ?>
        <?php
        $pagelist = get_pages('sort_column=menu_order&sort_order=asc');
        $pages = array();
        foreach ($pagelist as $page) {
            $pages[] += $page->ID;
        }
        $current = array_search(get_the_ID(), $pages);
        $prevID = $pages[$current-1];
        $nextID = $pages[$current+1];
        ?>
        <div class="container">
        <div class="navigation page-navigation">
            <?php if (!empty($prevID)) { ?>
                <p class="nav-prev"><a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>" class="nav-prev">Previous Page</a></p>
            <?php }
            if (!empty($nextID)) { ?>
            <p class="nav-next"><a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>" class="nav-next">Next Page</a></p>
        </div>
        </div>
    <?php } ?>
            <div class="sidebar-wrapper" style="background: <?=$main_color?>;">
                <?php get_sidebar(); ?>
            </div>
<!--        </div>-->
	</div>
<?php
//get_sidebar();
get_footer();
