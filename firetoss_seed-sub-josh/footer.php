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
        <div class="flex-4">
            <div class="footer-quarter">
                <?php
                /// vars
                $email = get_field('email', 'option');
                $phone = get_field('phone', 'option');
                $company_logo_footer = get_field('company_logo_footer', 'option');
                $company_logo_footerURL = $company_logo_footer['url'];
                ?>
                <h5>©2017 A Company Logo</h5>
                <p><a href="#">Privacy Policy</a></p>
                <?= $company_logo_footerURL ? "<img src='$company_logo_footerURL' alt='A Company Logo'>" : ""; ?>
            </div>
            <div class="footer-quarter">
                <h5>Contact Us</h5>
                <ul>
                    <li>Phone: <a href="#">888-888-888</a></li>
                    <li>Email: <a href="#">email@companylogo.com</a></li>
                </ul>
            </div>
            <div class="footer-quarter">
                <div class="social-media">
                    <h5>Social</h5>
                    <ul>
                        <?php
                        /// vars
                        $facebook_link = get_field('facebook_link', 'option');
                        $linkedin_link = get_field('linkedin_link', 'option');
                        $twitter_link = get_field('twitter_link', 'option');
                        $instagram_link = get_field('instagram_link', 'option');

                        $signature_text = get_field('signature_text', 'option');
                        $signature_link = get_field('signature_link', 'option');

                        $footer_image = get_field('footer_image', 'option');
                        $footer_image_link = get_field('footer_image_link', 'option');
                        ?>
                        <?php echo $facebook_link ? "<li class='fa'>
                                                        <a href='$facebook_link'>
                                                            <span class='fa-facebook'>
                                                            </span> 
                                                            <p>Facebook</p>
                                                        </a>
                                                      </li>" : ""; ?>
                        <?php echo $linkedin_link ? "<li class='fa'>
                                                        <a href='$linkedin_link'>
                                                            <span class='fa-linkedin'>
                                                            </span> 
                                                            <p>Linkedin</p>
                                                        </a>
                                                      </li>" : ""; ?>
                        <?php echo $twitter_link ? "<li class='fa'>
                                                        <a href='$twitter_link'>
                                                            <span class='fa-twitter'>
                                                            </span> 
                                                            <p>Twitter</p>
                                                        </a>
                                                      </li>" : ""; ?>
                        <?php echo $instagram_link ? "<li class='fa'>
                                                        <a href='$instagram_link'>
                                                            <span class='fa-instagram'>
                                                            </span> 
                                                            <p>Instagram</p>
                                                        </a>
                                                      </li>" : ""; ?>
                    </ul>
                </div>
            </div>
            <div class="footer-quarter">
                <h5>More Links</h5>
                <?php wp_nav_menu(array('theme_location' => 'footer', 'menu_id' => 'footer-menu')); ?>

            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <p class="alignright">
                <a href="https://firetoss.com/web-design-utah/" target="_blank">
                    Web design by </a>
                <a href="https://firetoss.com/web-design-utah/" target="_blank">
                    <img src="http://seed.devft.com/wp-content/themes/firetoss_seed-josh/img/firetoss-1.png" height="25"
                         alt="Firetoss Web Design and Development">
                </a>
            </p>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->
<script src="http://code.jquery.com/jquery-1.11.1.js"></script>

<?php wp_footer(); ?>

</body>
</html>
