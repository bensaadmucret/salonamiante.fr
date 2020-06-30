<section id="tile_speakers" class="fullwidth">
    <div id="tile_speakers_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <h2><?php echo stripslashes($args['title']); ?></h2>
            <p><?php echo stripslashes($args['subtitle']); ?></p>
        </header>
        <div class="section-content">
            <div id="carousel-speakers" class="carousel-speakers carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    if ($args['speakers'] && count($args['speakers'] > 0)) {
                        $chunks = array_chunk($args['speakers'], 4);
                        foreach ($chunks as $chunk) {
                            ?>
                            <div class="item <?php if ($i++ == 0) echo 'active'; ?>">
                                <?php
                                foreach ($chunk as $speaker) {
                                    ?>
                                    <div class="speaker col-lg-3 col-md-3 col-sm-3 col-xs-12 item<?php if (get_post_meta($speaker->ID, 'speaker_keynote', true) == 1) echo ' featured'; ?>">
                                        <a href="<?php echo get_permalink($speaker->ID); ?>">
                                            <?php
                                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($speaker->ID), 'vertoh-speaker');
                                            ?>
                                            <img class="speaker-image lazyOwl" src="<?php echo $thumbnail[0]; ?>" alt="<?php echo get_the_title($speaker->ID); ?>" />
                                        </a>
                                        <h3 class="speaker-name"><?php echo get_the_title($speaker->ID); ?></h3>
                                        <p class="speaker-about"><?php echo get_post_meta($speaker->ID, 'speaker_title', true); ?></p>

                                        <a href="<?php echo get_permalink($speaker->ID); ?>" class="read-more-link">
                                            <?php echo stripslashes($args['viewprofiletext']); ?>
                                            <span class="readmore-icon fa-stack fa-sm">
                                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                <i class="fa fa-plus fa-stack-1x"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <ol class="carousel-indicators">
                    <?php
                    for ($i = 0; $i < ceil(count($args['speakers']) / 4); $i++) {
                        ?>
                        <li data-target="#carousel-speakers" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
                        <?php
                    }
                    ?>
                </ol>
            </div>
            <?php if ($args['full_speakers_page'] && count($args['full_speakers_page']) > 0) { ?>
                <footer class="section-footer">
                    <a href="<?php echo get_permalink($args['full_speakers_page'][0]->ID); ?>" class="section-button"><?php echo stripslashes($args['viewalltext']); ?></a>
                </footer>
            <?php } ?>
        </div>
    </div>
</section>