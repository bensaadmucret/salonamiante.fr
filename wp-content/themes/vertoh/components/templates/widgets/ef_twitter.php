<section id="tile_twitter" class="regular twitter">
    <div id="tile_twitter_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <i class='fa fa-twitter'></i><h2><?php echo stripslashes($args['title']); ?></h2>
            <?php if ($args['full_twitter_page'] && count($args['full_twitter_page']) > 0) { ?>
                <a href="<?php echo get_permalink($args['full_twitter_page'][0]->ID); ?>" class='pull-right'>
                    <?php echo stripslashes($args['linktext']); ?>
                    <span class="readmore-icon fa-stack fa-sm">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fa fa-chevron-right fa-stack-1x"></i>
                    </span>
                </a>
            <?php } ?>
        </header>
        <div class="section-content">
            <div class="carousel-tweets row">
                <?php
                if (!empty($args['tweets']) && property_exists($args['tweets'], 'statuses') && count($args['tweets']->statuses) > 0) {
                    for ($i = 0; $i < count($args['tweets']->statuses); $i++) {
                        ?>
                        <div class="twitter col-sm-4 col-md-3<?php echo ($i == count($args['tweets']) - 1) ? ' hidden-sm' : ''; ?>">
                            <a href="http://twitter.com/<?php echo $args['tweets']->statuses[$i]->user->screen_name; ?>" target="_blank">
                                <img class="twitter-image no-overlay" src="<?php echo $args['tweets']->statuses[$i]->user->profile_image_url; ?>" alt="<?php echo $args['tweets']->statuses[$i]->user->name; ?>" />
                            </a>
                            <a class="twitter-title" href="http://twitter.com/<?php echo $args['tweets']->statuses[$i]->user->screen_name; ?>/status/<?php echo $args['tweets']->statuses[$i]->id_str; ?>" target="_blank"><?php echo getRelativeTime($args['tweets']->statuses[$i]->created_at); ?></a>
                            <span class="twitter-user"><a href="http://twitter.com/<?php echo $args['tweets']->statuses[$i]->user->screen_name; ?>" target="_blank"><?php echo $args['tweets']->statuses[$i]->user->name; ?></a></span>
                            <p class="twitter-content"><?php echo vertoh_parse_tweet_text($args['tweets']->statuses[$i]->text); ?></p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <footer class="section-footer">
                <iframe id="twitter-widget-0" src="https://platform.twitter.com/widgets/tweet_button.1384994725.html#_=1385458781193&amp;button_hashtag=<?php echo $args['twitterhash']; ?>&amp;count=none&amp;id=twitter-widget-0&amp;lang=en&amp;size=m&amp;type=hashtag" class="twitter-hashtag-button twitter-tweet-button twitter-hashtag-button twitter-count-none" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: <?php echo(!empty($args['buttonwidth']) ? $args['buttonwidth'] : '120'); ?>px; height: 20px; margin:0; padding:0; border:none;"></iframe>
            </footer>
        </div>
    </div>
</section>