<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 4/5/2017
 * Time: 10:56 AM
 */


//vars
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$post_type = get_sub_field('post_type');

$background_image = get_sub_field('posts_content_background_image');
$background_imageURL = $background_image['url'];
$background_color = get_sub_field('posts_content_background_color');
$background_gradient = get_sub_field('posts_content_background_gradient');
$background_end_color = get_sub_field('posts_content_background_end_color');


$background_position = get_sub_field('posts_content_background_position');
$background_positionSTYLE = "background-position:$background_position;";
$background_size = get_sub_field('posts_content_background_size');
$background_sizeSTYLE = "background-size:$background_size;";

?>
<div id="latest" class="section" style="
<?=$text_color?"$text_style":"";?>
<?= $background_image ? "background-image:url($background_imageURL);" : ""; ?>
<?php if($background_gradient) { ?>
    background: <?=$background_image ? "url($background_imageURL), " :"";?> rgb(0,0,0); /* Old browsers */
    background: <?=$background_image ? "url($background_imageURL), " :"";?> -moz-linear-gradient(left, <?=$background_color;?> 0%, <?=$background_end_color;?> 100%); /* FF3.6-15 */
    background: <?=$background_image ? "url($background_imageURL), " :"";?> -webkit-linear-gradient(left, <?=$background_color;?> 0%,<?=$background_end_color;?> 100%); /* Chrome10-25,Safari5.1-6 */
    background: <?=$background_image ? "url($background_imageURL), " :"";?> linear-gradient(to right, <?=$background_color;?>) 0%,<?=$background_end_color;?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=$background_color;?>', endColorstr='<?=$background_end_color;?>',GradientType=0 ); /* IE6-9 */
<?php } else {?>
    <?= $background_color ? "background-color:$background_color;" : "";?>
<?php } ?>
<?=$background_position?"$background_positionSTYLE":"";?>
<?=$background_size?"$background_sizeSTYLE":"";?>
        ">
    <div class="container">
        <div class="latest-wrapper <?= $narrow_shelf ? "col-max-section" : ""; ?>">
            <div class="underline blog-post-header">
                <?= $title ? "<h2>$title</h2>" : ""; ?>
                <?= $subtitle ? "<h4>$subtitle</h4>" : ""; ?>
            </div>

            <?php
//            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => $post_type,
                'post_status' => array('publish'),
                'orderby' => 'date',
                'post_per_page' => -1,
                'order' => 'desc',
//                'paged' => $paged,
            );

            // The Query
            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) :
                $count = $wp_query->post_count; ?>
                <div class="case-wrapper">
                <?php while ($wp_query->have_posts()) : $wp_query->the_post();
                    $thumbnail = get_the_post_thumbnail_url();
                    $date = get_the_date();
                    $author = get_the_author_posts_link();

                    ?>
                    <div class="post-looped">
                        <div class="post-dots">
                        <?php if ($thumbnail): ?>
                            <div class="post-thumbnail">
                            <img src="<?= $thumbnail; ?>" alt="<?php the_title(); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="post-content">
<!--                            <h3 class="post-title"><a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a></h3>-->
                            <?php
                            $content = get_the_content();
                            echo '<p>'. mb_strimwidth($content, 0, 175, '...').'</p>';
                            ?>
                            <a class="button" href="<?php the_permalink(); ?>">Read Full Case Study</a>
                        </div>
                        </div>
                    </div>
                    <?php

                endwhile; ?>
                </div>
            <?php endif;

            wp_pagenavi();
            wp_reset_query();

            if($post_type == 'case_study'&& !is_page('Case Studies')): ?>
            <a id="view-more" class="text-link" href="#">See All Case Studies<i class="icon-Chevron"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>


