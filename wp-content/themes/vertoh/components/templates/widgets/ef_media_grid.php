<section id="tile_media" class="fullwidth ">
    <div id="tile_media_anchor" class="hook"></div>
    <div class="container gallery-player">
        <header class="row section-header">
            <h2><?php echo stripslashes($args['title']); ?></h2>
            <p><?php echo stripslashes($args['subtitle']); ?></p>
        </header>
        <div class="section-content video-section">
            <div class="royalSlider rsDefault no-overlay">
                <?php
                if ($args['medias'] && count($args['medias']) > 0) {
                    $medias = explode(',', $args['medias']);
                    foreach ($medias as $media) {
                        if (ctype_digit($media)) {
                            $thumbnail = wp_get_attachment_image_src($media, 'vertoh-media-thumbnail');
                            $image =  wp_get_attachment_image_src($media, 'vertoh-media');
                            ?>
                            <a class="rsImg" data-rsTmb="<?php echo $thumbnail[0]; ?>" href="<?php echo $image[0]; ?>"></a>
                            <?php
                        } else {
                            ?>
                            <a class="rsImg" data-rsVideo="<?php echo $media; ?>" data-rsTmb="<?php echo vertoh_get_video_thumbnail($media, array('youtube' => 'default', 'vimeo' => 'thumbnail_small')); ?>" href="<?php echo vertoh_get_video_thumbnail($media, array('youtube' => '0', 'vimeo' => 'thumbnail_large')); ?>"></a>
                            <?php
                        }
                    }
                }
                ?>
            </div>		
        </div>
    </div>
</section>