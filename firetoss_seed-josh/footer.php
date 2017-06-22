<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Firetoss_Theme
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="upper-wrap">
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url()); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/FiberCommunity.svg"
                         alt="<?php bloginfo('name'); ?>">
                </a>
            </div>
            <div class="footer-menu">
                <?php wp_nav_menu(array('theme_location' => 'footer', 'menu_id' => 'footer-menu')); ?>
            </div>
        </div>
    </div>
    <div class="site-info">
        <div class="container">
            <p class="alignleft">©2017 FiberCommunity. All Rights Reserved</p>
            <p class="alignright">
                <a href="<?= $signature_link; ?>" target="_blank">
                    <?= $signature_text; ?>
                </a>
                <a href="<?= $footer_image_link; ?>" target="_blank">
                    <img src="/wp-content/themes/firetoss_seed-josh/img/firetoss-1.png"
                         alt="Firetoss Web Design and Development">
                </a>
            </p>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php wp_footer(); ?>

</body>
</html>
