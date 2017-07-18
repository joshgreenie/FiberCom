<?php
/**
 * Basic content block - alter to fit
 */

// vars

$icon = get_sub_field('icon');
$iconURL = $icon['url'];
$iconALT = $icon['alt'];
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$content = get_sub_field('content');
$content_image = get_sub_field('content_image');
$content_imageURL = $content_image['url'];
$content_imageALT = $content_image['alt'];
$content_image_position = get_sub_field('content_image_position');
$content_image_background_color = get_sub_field('content_image_background_color');

$background_position = get_sub_field('background_position');
$background_positionSTYLE = "background-position: $background_position;background-size:contain;";

$background_image = get_sub_field('background_image');
$background_imageURL = $background_image['url'];
$background_imageStyle = "background-image:url($background_imageURL);";

$background_color = get_sub_field('background_color');
$bg_style = "background-color:$background_color;";

$text_color = get_sub_field('text_color');
$text_style = "style='color:$text_color;'";
?>

<div class="content-fix">
<div class="content-flex" style="<?= $background_color ? "$bg_style" : ""; ?><?= $text_color ? "$text_style" : ""; ?>">
    <div class="container">
        <div class="content-wrapper image-<?=$content_image_position;?> <?php if (!$content_image): echo ' no-Image '; endif; ?>">
            <?php if ($content_image): ?>
                <div class="content-image" style="background-color:<?= $content_image_background_color ?>;">
                    <img src="<?= $content_imageURL ?>" alt="<?= $content_imageALT ?>">
                </div>
            <?php endif; ?>
            <div class="content-wrap">
                <?= $icon ? "<img class='content-icon' src='$iconURL' alt='$iconALT'>" : ""; ?>
                <?= $title ? "<h1 class='content-title'>$title</h1>" : ""; ?>
                <?= $subtitle ? "<h3 class='content-subtitle'>$subtitle</h3>" : ""; ?>
                <?= $content ?>
            </div>
            <?php if ($content_image_background_color): ?>
                    <span class="border-bottom" style="background-color:<?=$content_image_background_color?>"></span>
                    <span class="border-dot" style="background-color:<?=$content_image_background_color?>"></span>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
