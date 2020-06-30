<section id="tile_explore" class="fullwidth map-slider">
    <div id="tile_explore_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <h2><?php echo stripslashes($args['title']); ?></h2>
        </header>
        <div class="section-content">
            <div id="maps-slider" class="carousel slide">
                <div class="carousel slide sliding-class">
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < count($args['poi_groups']); $i++) { ?>
                            <div class="<?php if ($i == 0) echo 'active '; ?>item">
                                <div class="maps">
                                    <h3 class='map-title'><?php echo $args['poi_groups'][$i]->name; ?></h3>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="carousel slide swap-cities-map">
                    <div class="carousel-inner">
                        <div class="active item">
                            <div id="gmap"></div>
                        </div>
                    </div>
                </div>
                <div class="carousel slide sliding-class swap-cities-list">
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < count($args['poi_groups']); $i++) { ?>
                            <div class="<?php if ($i == 0) echo 'active '; ?>item">
                                <div class="gradient-overlay"></div>
                                <div class="carousel-cities owl-carousel" role="tablist">
                                    <?php
                                    $pois = get_posts(
                                            array(
                                                'post_type' => 'poi',
                                                'posts_per_page' => -1,
                                                'poi-group' => $args['poi_groups'][$i]->slug,
                                                'orderby' => 'menu_order',
                                                'order' => 'ASC'
                                            )
                                    );
                                    for ($j = 0; $j < count($pois); $j++) {
                                        ?>
                                        <span class="city items active">
                                            <a href="#" role="tab" data-toggle="tab" data-lat="<?php echo get_post_meta($pois[$j]->ID, 'poi_latitude', true); ?>" data-lng="<?php echo get_post_meta($pois[$j]->ID, 'poi_longitude', true); ?>"><?php echo get_the_title($pois[$j]->ID); ?></a>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <a class="carousel-control left" href="#" role="button" onclick="slideCarousels(['sliding-class'], 'prev')">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control right" href="#" role="button" onclick="slideCarousels(['sliding-class'], 'next')">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>