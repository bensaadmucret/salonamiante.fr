<section id="tile_connect" class="fullwidth gold social-links">
    <div id="tile_connect_anchor" class="hook"></div>
    <div class="container">
        <h2><?php echo $args['title']; ?></h2>
        <div class="icons clearfix">
            <?php if (!empty($args['ef_options']['ef_linkedin'])) { ?>
                <a href="<?php echo esc_url($args['ef_options']['ef_linkedin'], $args['esc_url_protocols']); ?>" target="_blank" title="LinkedIn"><i class='fa fa-linkedin-square'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_twitter'])) { ?>
                <a href="<?php echo esc_url($args['ef_options']['ef_twitter'], $args['esc_url_protocols']); ?>" target="_blank" title="Twitter"><i class='fa fa-twitter-square'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_facebook'])) { ?>
                <a href="<?php echo esc_url($args['ef_options']['ef_facebook'], $args['esc_url_protocols']); ?>" target="_blank" title="Facebook"><i class='fa fa-facebook-square'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_instagram'])) { ?>
                <a href="<?php echo esc_url($args['ef_options']['ef_instagram'], $args['esc_url_protocols']); ?>" target="_blank" title="Instagram"><i class='fa fa-instagram'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_youtube'])) { ?>
                <a href="<?php echo esc_url($args['ef_options']['ef_youtube'], $args['esc_url_protocols']); ?>" target="_blank" title="Youtube"><i class='fa fa-youtube-square'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_pinterest'])) { ?>
                <a href="<?php echo esc_url($args['ef_options']['ef_pinterest'], $args['esc_url_protocols']); ?>" target="_blank" title="Pinterest"><i class='fa fa-pinterest-square'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_google_plus'])) { ?>
                <a href="<?php echo esc_url($args['ef_options']['ef_google_plus'], $args['esc_url_protocols']); ?>" target="_blank" title="Google+"><i class='fa fa-google-plus-square'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_email']) && is_email($args['ef_options']['ef_email'])) { ?>
                <a href="mailto:<?php echo $args['ef_options']['ef_email']; ?>" title="Email"><i class='fa fa-envelope-square'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_vimeo'])) { ?>
                <a href="<?php echo esc_url($args['ef_options']['ef_vimeo'], $args['esc_url_protocols']); ?>" target="_blank" title="Vimeo"><i class='fa fa-vimeo-square'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_flickr'])) { ?>
                <a href="<?php echo esc_url($args['ef_options']['ef_flickr'], $args['esc_url_protocols']); ?>" target="_blank" title="Flickr"><i class='fa fa-flickr'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_skype'])) { ?>
                <a href="skype:<?php echo $args['ef_options']['ef_skype']; ?>" title="Skype"><i class='fa fa-skype'></i></a>
            <?php } ?>
            <?php if (!empty($args['ef_options']['ef_rss']) && $args['ef_options']['ef_rss'] == true) { ?>
                <a href="<?php echo get_bloginfo('rss_url'); ?>" target="_blank" title="Rss"><i class='fa fa-rss'></i></a>
                <?php } ?>
        </div>
    </div>
</section>