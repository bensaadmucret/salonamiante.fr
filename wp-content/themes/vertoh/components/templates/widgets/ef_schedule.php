<section id="tile_schedule" class="fullwidth">
    <div id="tile_schedule_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <h2><?php echo $args['title']; ?></h2>
            <p><?php echo $args['subtitle']; ?></p>
        </header>
        <div class="section-content">
            <div id="carousel-sessions" class="carousel-sessions carousel slide" >
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    $chunks = array_chunk($args['schedule'], 3);
                    foreach ($chunks as $chunk) {
                        ?>
                        <div class="item <?php if ($i++ == 0) echo 'active'; ?>">
                            <?php
                            foreach ($chunk as $session) {
                                $locations = wp_get_post_terms($session->ID, 'session-location');
                                if ($locations && count($locations) > 0) {
                                    $location = $locations[0];
                                } else {
                                    $location = '';
                                }
                                $tracks = wp_get_post_terms($session->ID, 'session-track', array('fields' => 'ids', 'count' => 1));
                                if ($tracks && count($tracks) > 0) {
                                    $track = $tracks[0];
                                    $color = EF_Taxonomy_Helper::ef_get_term_meta('session-track-metas', $track, 'session_track_color');
                                } else {
                                    $track = '';
                                    $color = '';
                                }
                                $session_date = get_post_meta($session->ID, 'session_date', true);
                                $date = '';
                                if (!empty($session_date)) {
                                    $date = date_i18n(get_option('date_format'), $session_date);
                                }
                                $time = get_post_meta($session->ID, 'session_time', true);
                                $end_time = get_post_meta($session->ID, 'session_end_time', true);
                                if (!empty($time)) {
                                    $time_parts = explode(':', $time);
                                    if (count($time_parts) == 2) {
                                        $time = date(get_option('time_format'), mktime($time_parts[0], $time_parts[1], 0));
                                    }
                                }
                                if (!empty($end_time)) {
                                    $time_parts = explode(':', $end_time);
                                    if (count($time_parts) == 2) {
                                        $end_time = date(get_option('time_format'), mktime($time_parts[0], $time_parts[1], 0));
                                    }
                                }
                                $speakers_list = get_post_meta($session->ID, 'session_speakers_list', true);
                                if ($speakers_list && count($speakers_list) > 0) {
                                    $speakers_list = array_slice($speakers_list, 0, 8);
                                }
                                ?>
                                <div class="session item col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <?php if (!empty($date)) { ?>
                                        <span class="session-date"><?php echo $date; ?></span>
                                    <?php } ?>
                                    <h3 class="session-title" <?php if (isset($color)) echo " style='color:$color;'"; ?>><a href="<?php echo get_permalink($session->ID); ?>"><?php echo get_the_title($session->ID); ?></a></h3>

                                    <div class="sessions-images<?php if ($speakers_list && count($speakers_list) > 2) echo ' many-images'; ?>">
                                        <?php
                                        if ($speakers_list && count($speakers_list) > 0) {
                                            foreach ($speakers_list as $speaker_id) {
                                                ?>
                                                <a href="<?php echo get_permalink($speaker_id); ?>"<?php if (get_post_meta($speaker_id, 'speaker_keynote', true) == 1) echo ' class=featured'; ?>>
                                                    <?php echo get_the_post_thumbnail($speaker_id, 'vertoh-speaker', array('class' => 'scalable-image session-image', 'alt' => get_the_title($speaker_id))); ?>
                                                </a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="session-info">
                                        <?php if (!empty($date)) { ?>
                                            <span class="date"><i class="fa fa-clock-o"></i><?php echo $time; ?> - <?php echo $end_time; ?></span>
                                        <?php } ?>
                                        <span class="date"><i class="fa fa-map-marker"></i>
                                            <?php
                                            if (isset($location->name))
                                                echo $location->name;
                                            else
                                                echo $location;
                                            ?></span>
                                    </div>

                                    <?php
                                    if ($tracks && count($tracks) > 0) {
                                        foreach ($tracks as $track) {
                                            $color = EF_Taxonomy_Helper::ef_get_term_meta('session-track-metas', $track, 'session_track_color');
                                            $term = get_term_by('id', $track, 'session-track');
                                            ?>
                                            <span class="label<?php if (empty($color)) echo " bg-gold"; ?>"<?php if (!empty($color)) echo " style=\"background-color: $color;\""; ?>><?php echo $term->name; ?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <a href='<?php echo get_permalink($session->ID); ?>' class="sessions-icon fa-stack fa-lg pull-right">
                                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                                        <i class="fa fa-plus fa-stack-1x"></i>
                                    </a>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <ol class="carousel-indicators">
                    <?php
                    for ($i = 0; $i < ceil(count($args['schedule']) / 3); $i++) {
                        ?>
                        <li data-target="#carousel-sessions" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
                        <?php
                    }
                    ?>
                </ol>
            </div>
            <?php if ($args['full_schedule_page'] && count($args['full_schedule_page']) > 0) { ?>
                <footer class="section-footer">
                    <a href="<?php echo get_permalink($args['full_schedule_page'][0]->ID); ?>" class="section-button"><?php echo stripslashes($args['viewfulltext']); ?></a>
                </footer>
            <?php } ?>
        </div>
    </div>
</section>