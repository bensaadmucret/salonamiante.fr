<?php
$ef_options = EF_Event_Options::get_theme_options();
$esc_url_protocols = array('http', 'https', 'feed');
?>
<footer id="site-footer">
    <div class="container">
        <div class="row widgets">
            <?php dynamic_sidebar('footer'); ?>
        </div>
        <div class="bottom-footer">
            <p class='pull-left'>
                <?php
                if (!empty($ef_options['ef_footer_content'])) {
                    echo stripslashes($ef_options['ef_footer_content']);
                } else {
                    echo('Powered by <a href="http://www.showthemes.com/conference-exibhition-wordpress-theme-vertoh" target="_blank">Vertoh Event WordPress Theme</a> by <a href="http://www.showthemes.com" target="_blank">Showthemes</a>');
                }
                ?>
            </p>
            <div class="icons pull-right">
                <?php if (!empty($ef_options['ef_linkedin'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_linkedin'], $esc_url_protocols); ?>" target="_blank" title="Linkedin"><i class='fa fa-linkedin-square'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_twitter'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_twitter'], $esc_url_protocols); ?>" target="_blank" title="Twitter"><i class='fa fa-twitter-square'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_facebook'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_facebook'], $esc_url_protocols); ?>" target="_blank" title="Facebook"><i class='fa fa-facebook-square'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_instagram'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_instagram'], $esc_url_protocols); ?>" target="_blank" title="Instagram"><i class='fa fa-instagram'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_youtube'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_youtube'], $esc_url_protocols); ?>" target="_blank" title="Youtube"><i class='fa fa-youtube'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_pinterest'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_pinterest'], $esc_url_protocols); ?>" target="_blank" title="Pinterest"><i class='fa fa-pinterest-square'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_google_plus'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_google_plus'], $esc_url_protocols); ?>" target="_blank" title="Google+"><i class='fa fa-google-plus-square'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_email']) && is_email($ef_options['ef_email'])) { ?>
                    <a href="mailto:<?php echo $ef_options['ef_email']; ?>" title="Email"><i class='fa fa-envelope-square'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_vimeo'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_vimeo'], $esc_url_protocols); ?>" target="_blank" title="Vimeo"><i class='fa fa-vimeo-square'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_flickr'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_flickr'], $esc_url_protocols); ?>" target="_blank" title="Flickr"><i class='fa fa-flickr'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_skype'])) { ?>
                    <a href="skype:<?php echo $ef_options; ?>" title="Skype"><i class='fa fa-skype'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_rss'])) { ?>
                    <a href="<?php echo get_bloginfo('rss_url'); ?>" target="_blank" title="RSS"><i class='fa fa-rss-square'></i></a>
                    <?php } ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>