<?php
/**
 * Basic content block - alter to fit
 */

// vars

$title      = get_sub_field('title');
$subtitle   = get_sub_field('subtitle');
$content    = get_sub_field('content');

$background_position = get_sub_field('background_position');
$background_positionSTYLE = "background-position: $background_position;background-size:contain;";

$background_image = get_sub_field('background_image');
$background_imageURL = $background_image['url'];
$background_imageStyle = "background-image:url($background_imageURL);";

$background_color = get_sub_field('background_color');
$bg_style = "background-color:$background_color;";

$text_color = get_sub_field('text_color');
$text_style = "style='color:$text_color;'";




$reduce_vertical_padding = get_sub_field('reduce_vertical_padding');
$background_image = get_sub_field('background_settings_background_image');
$background_imageURL = $background_image['url'];
$background_color = get_sub_field('background_settings_background_color');
$background_gradient = get_sub_field('background_settings_background_gradient');
$background_end_color = get_sub_field('background_settings_background_end_color');
$background_position = get_sub_field('background_settings_background_position');
$background_positionSTYLE = "background-position:$background_position;";
$background_size = get_sub_field('background_settings_background_size');
$background_sizeSTYLE = "background-size:$background_size;";

?>

<div class="content-flex section <?=$reduce_vertical_padding?"reduce-padding":"";?> " style="
<?=$text_color?"$text_style":"";?>
<?php if($background_gradient) { ?>
    background: no-repeat <?=$background_image ? "url($background_imageURL), " :"";?> rgb(0,0,0); /* Old browsers */
    background: no-repeat <?=$background_image ? "url($background_imageURL), " :"";?> -moz-linear-gradient(left, <?=$background_color;?> 0%, <?=$background_end_color;?> 100%); /* FF3.6-15 */
    background: no-repeat <?=$background_image ? "url($background_imageURL), " :"";?> -webkit-linear-gradient(left, <?=$background_color;?> 0%,<?=$background_end_color;?> 100%); /* Chrome10-25,Safari5.1-6 */
    background: no-repeat <?=$background_image ? "url($background_imageURL), " :"";?> linear-gradient(to right, <?=$background_color;?>) 0%,<?=$background_end_color;?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=$background_color;?>', endColorstr='<?=$background_end_color;?>',GradientType=0 ); /* IE6-9 */
<?php } else {?>
    <?= $background_color ? "background-color:$background_color;" : "";?>
    <?= $background_image ? "background-image:url($background_imageURL);" : "";?>
<?php } ?>
<?=$background_position?"$background_positionSTYLE":"";?>
<?=$background_size?"$background_sizeSTYLE":"";?>
    background-repeat: no-repeat;
        " >

    <div class="container">
        <?=$title?"<h1 class='content-title'>$title</h1>":"";?>
        <?=$subtitle?"<h3 class='content-subtitle'>$subtitle</h3>":"";?>
        <?=$content?>
    </div>
</div>

