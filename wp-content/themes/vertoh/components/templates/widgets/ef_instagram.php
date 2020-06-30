<section id="tile_instagram" class="regular instagram">
    <div id="tile_instagram_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <i class='fa fa-instagram'></i><h2><?php echo stripslashes($args['title']); ?></h2>
            <?php if ($args['full_instagram_page'] && count($args['full_instagram_page']) > 0) { ?>
                <a href="<?php echo get_permalink($args['full_instagram_page'][0]->ID); ?>" class='pull-right'>
                    <?php echo stripslashes($args['linktext']); ?>
                    <span class="readmore-icon fa-stack fa-sm">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fa fa-chevron-right fa-stack-1x"></i>
                    </span>
                </a>
            <?php } ?>
        </header>
        <div class="section-content">
            <div class="carousel-instagram">
                <?php
                if ($args['photos'] && $args['photos']->data && count($args['photos']->data) > 0) {
                    $i = 0;
                    foreach ($args['photos']->data as $media) {
                        ?>
                        <div class="instagram col-md-3 col-sm-4 col-xs-6<?php echo ($i++ == count($args['photos']) - 1) ? ' hidden-sm' : ''; ?>">
                            <a href="<?php echo $media->link; ?>" target="_blank" class='instagram-image'>
                                <span class='instagram-user'><?php echo $media->user->username; ?></span>
                                <img class="" src="<?php echo $media->images->low_resolution->url; ?>" alt="<?php echo !empty($media->caption->text) ? $media->caption->text : ''; ?>">
                            </a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>