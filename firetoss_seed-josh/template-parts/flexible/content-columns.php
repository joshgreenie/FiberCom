<?php

$column_count = get_sub_field('columns_column_count');


$header = get_sub_field('content_header');
$sub_header = get_sub_field('content_sub_header');
$background_image = get_sub_field('content_background_image');
$background_imageURL = $background_image['url'];
$background_color = get_sub_field('content_background_color');
$background_gradient = get_sub_field('content_background_gradient');
$background_end_color = get_sub_field('content_background_end_color');

$background_position = get_sub_field('content_background_position');
$background_positionSTYLE = "background-position:$background_position;";
$background_size = get_sub_field('content_background_size');
$background_sizeSTYLE = "background-size:$background_size;";

?>
<div class="column-content section" style="
<?= $background_image ? "background-image:url($background_imageURL);" : ""; ?>
<?php if($background_gradient) { ?>
    background:no-repeat <?=$background_image ? "url($background_imageURL), " :"";?> rgb(0,0,0); /* Old browsers */
    background:no-repeat <?=$background_image ? "url($background_imageURL), " :"";?> -moz-linear-gradient(left, <?=$background_color;?> 0%, <?=$background_end_color;?> 100%); /* FF3.6-15 */
    background:no-repeat <?=$background_image ? "url($background_imageURL), " :"";?> -webkit-linear-gradient(left, <?=$background_color;?> 0%,<?=$background_end_color;?> 100%); /* Chrome10-25,Safari5.1-6 */
    background:no-repeat <?=$background_image ? "url($background_imageURL), " :"";?> linear-gradient(to right, <?=$background_color;?>) 0%,<?=$background_end_color;?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=$background_color;?>', endColorstr='<?=$background_end_color;?>',GradientType=0 ); /* IE6-9 */
<?php } else {?>
    <?= $background_color ? "background-color:$background_color;" : "";?>
<?php } ?>
<?=$background_size?"$background_sizeSTYLE":"";?>
<?=$background_position?"$background_positionSTYLE":"";?>

        background-repeat: no-repeat;  ">
    <div class="container">
        <?php if ($header): ?>
            <div class="header-content">
                <?php
                echo $header ? "<h2>$header</h2>" : "";
                echo $sub_header ? "<h3>$sub_header</h3>" : "";
                ?>
            </div>
        <?php endif; ?>

        <?php if (have_rows('columns_columns')): ?>

            <div class="column-wrapper count-<?= $column_count ? "$column_count" : "" ?>">
                <?php while (have_rows('columns_columns')) : the_row();
                    $content = get_sub_field('content', false, false);
                    ?>
                    <div class="column">
                        <?= $content; ?>
                    </div>
                <?php endwhile ?>
            </div>
        <?php endif; ?>
    </div>
</div>