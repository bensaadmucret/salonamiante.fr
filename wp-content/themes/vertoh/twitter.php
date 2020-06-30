<?php
// Template Name: Twitter Full Page
get_header('social');

?>
<section class="content">
    <div class="container">
        <div id="twitter_update_list">
            
        </div>
        <div class="text" id="twitter_share_button">
            <a href="<?php echo home_url(); ?>" class='button pull-left'>
                <span class="sessions-icon fa-stack">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-chevron-left fa-stack-1x"></i>
                </span><?php _e('Back to home', 'vertoh'); ?>
            </a>
            <a href="https://twitter.com/intent/tweet?button_hashtag=<?php echo get_option('ef_twitter_widget_twitterhash'); ?>" class="twitter-hashtag-button pull-right"><?php _e('Tweet', 'vertoh'); ?> #<?php echo get_option('ef_twitter_widget_twitterhash'); ?></a>
            <script>!function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + '://platform.twitter.com/widgets.js';
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, 'script', 'twitter-wjs');
                </script>
        </div>
    </div>
</section>
<?php
get_footer('social');
