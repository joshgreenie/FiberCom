<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 8/8/2016
 * Time: 11:29 AM
 */


//     $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full );
$thumbnail = get_field('header_background_image');
global $post;
$a_id = $post->post_author;

$date = get_the_date();

?>

<div id="imageTitle"
     style='background-image:url(<?php echo $thumbnail ? "$thumbnail" : "/wp-content/uploads/2017/04/hero.jpg"; ?>);'>
    <div class="container">
        <div id="postTitle">
            <div id="postTitlewrap">
                <h1><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <h4>by <?php the_author_meta('user_nicename', $a_id); ?> | <?= $date; ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
