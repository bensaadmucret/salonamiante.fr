<section id="tile_facebookrsvp" class="regular social">
    <div id="tile_facebookrsvp_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <i class='fa fa-facebook'></i><h2><?php echo stripslashes($args['title']); ?></h2>
            <a href="<?php echo stripslashes($args['link']); ?>" class='pull-right' target="_blank">
                <?php echo stripslashes($args['linktitle']); ?>
                <span class="readmore-icon fa-stack fa-sm">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-chevron-right fa-stack-1x"></i>
                </span>
            </a>
        </header>
        <div class="section-content row">
            <div class='col-sm-4 col-xs-12'>
                <div class="social-box">
                    <span class="number"><?php echo $args['rsvpattending']['summary']['count']; ?></span>
                    <div>
                        <i class="fa fa-thumbs-up"></i>
                        <span><?php _e('Yes', 'vertoh'); ?></span>
                    </div>
                </div>
            </div>

            <div class='col-sm-4 col-xs-12'>
                <div class="social-box">
                    <span class="number"><?php echo $args['rsvpmaybe']['summary']['count']; ?></span>
                    <div>
                        <i class="fa fa-question"></i>
                        <span><?php _e('Maybe', 'vertoh'); ?></span>
                    </div>
                </div>
            </div>

            <div class='col-sm-4 col-xs-12'>
                <div class="social-box">
                    <span class="number"><?php echo $args['rsvpdeclined']['summary']['count']; ?></span>
                    <div>
                        <i class="fa fa-thumbs-down"></i>
                        <span><?php _e('No', 'vertoh'); ?></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>