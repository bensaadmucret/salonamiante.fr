<?php
$ef_options = EF_Event_Options::get_theme_options();
$esc_url_protocols = array('http', 'https', 'feed');
?>
<footer id="site-footer">
    <div class="container">		
        <div class="bottom-footer">
            <p class='pull-left'>
                <?php
                if (isset($ef_options['ef_footer_content'])) {
                    echo stripslashes($ef_options['ef_footer_content']);
                }
                ?>
            </p>
            <div class="icons pull-right">
                <?php if (!empty($ef_options['ef_facebook'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_facebook'], $esc_url_protocols); ?>" target="_blank" title="Facebook"><i class='fa fa-facebook-square'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_twitter'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_twitter'], $esc_url_protocols); ?>" target="_blank" title="Twitter"><i class='fa fa-twitter-square'></i></a>
                <?php } ?>
                <?php if (!empty($ef_options['ef_instagram'])) { ?>
                    <a href="<?php echo esc_url($ef_options['ef_instagram'], $esc_url_protocols); ?>" target="_blank" title="Instagram"><i class='fa fa-instagram'></i></a>
                    <?php } ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>