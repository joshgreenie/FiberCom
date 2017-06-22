<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 4/5/2017
 * Time: 10:35 AM
 */


$home_hero      = get_sub_field('home_hero');
$header      = get_sub_field('header');
$sub_header   = get_sub_field('sub_header');
$description   = get_sub_field('description');
$background_image   = get_sub_field('hero_content_background_image');
$background_imageURL   = $background_image['url'];
$background_color   = get_sub_field('hero_content_background_color');
$background_gradient   = get_sub_field('hero_content_background_gradient');
$background_end_color   = get_sub_field('hero_content_background_end_color');

$background_position = get_sub_field('hero_content_background_position');
$background_positionSTYLE = "background-position:$background_position;";
$background_size = get_sub_field('hero_content_background_size');
$background_sizeSTYLE = "background-size:$background_size;";

?>
<div class="hero-header section
<?= $home_hero ? "hero-home" : "";?>" style="
<?=$background_position?"$background_positionSTYLE":"";?>
<?=$background_size?"$background_sizeSTYLE":"";?>
<?= $background_image ? "background-image:url($background_imageURL);" : "";?>
<?= $background_color ? "background-color:$background_color;" : "";?>
">
    <div class="container">
        <?php if($header):?>
        <div class="header-content">
            <?php
                echo $header ? "<h1>$header</h1>" : "";
                echo $sub_header ? "<h3>$sub_header</h3>" : "";
                ?>
        </div>
        <?php endif; ?>
        <?php if($home_hero):
            echo "<div class='description'>$description</div>";
        endif; ?>
    </div>
</div>





<img class="my-image" <?php ft_responsive_image($background_image,'thumb-1450','1450px');?> >

