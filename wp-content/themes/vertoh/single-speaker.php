<?php get_header() ?>

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        vertoh_include_page_header();

        $full_speakers_url = EF_Speakers_Helper::get_speakers_url();
        $full_schedule_url = EF_Session_Helper::get_schedule_url();

        $speaker_id = get_the_ID();

        add_filter('posts_fields', array('EF_Speakers_Helper', 'ef_speaker_sessions_posts_fields'));
        add_filter('posts_orderby', array('EF_Speakers_Helper', 'ef_speaker_sessions_posts_orderby'));

        $sessions_loop = EF_Session_Helper::get_sessions_loop();

        remove_filter('posts_fields', array('EF_Speakers_Helper', 'ef_speaker_sessions_posts_fields'));
        remove_filter('posts_orderby', array('EF_Speakers_Helper', 'ef_speaker_sessions_posts_orderby'));
        ?>
        <div class="has-sticky stickem-container">
            <section class="fullwidth breadcrumbs no-border">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo home_url(); ?>"><?php _e('Home', 'vertoh'); ?></a></li>
                        <?php if (!empty($full_speakers_url)) { ?>
                            <li><a href="<?php echo $full_speakers_url; ?>"><?php _e('All Speakers'); ?></a></li>
                        <?php } ?>
                        <li class="active"><?php the_title(); ?></li>
                    </ol>
                </div>
            </section>
            <section class="content speaker margin-20">
                <div class="container ">
                    <div class="stickem-container">

                        <div class="row speaker-info">
                            <div class="col-md-12 content featured-image">
                                <?php the_post_thumbnail('vertoh-speaker', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'exhibitor-image lazyOwl')); ?>
                                <?php if (get_post_meta($speaker_id, 'speaker_keynote', true)) { ?>
                                    <a href="#" class="label bg-gold"><?php _e('Featured', 'vertoh'); ?></a>
                                <?php } ?>
                                <h1 class='exhibitor-title'><?php the_title(); ?></h1>
                                <p><?php echo get_post_meta($speaker_id, 'speaker_title', true); ?></p>
                                <hr class='bg-gold' />
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="entry-content">
                            <div class="clearfix small-section-title">
                                <h3 class='pull-left'><?php _e('My Sessions', 'vertoh'); ?></h3>
                                <?php if (!empty($full_schedule_url)) { ?>
                                    <a href="<?php echo $full_schedule_url; ?>" class='button pull-right'><?php _e('View full schedule', 'vertoh'); ?>
                                        <span class="sessions-icon fa-stack">
                                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                                            <i class="fa fa-angle-right fa-stack-1x"></i>
                                        </span>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <?php
                                if ($sessions_loop->have_posts()):
                                    while ($sessions_loop->have_posts()):
                                        $sessions_loop->the_post();
                                        $session_speakers = get_post_meta(get_the_ID(), 'session_speakers_list', true);
                                        if ($session_speakers && is_array($session_speakers) && in_array($speaker_id, $session_speakers)) {
                                            $date = get_post_meta(get_the_ID(), 'session_date', true);
                                            $locations = wp_get_post_terms(get_the_ID(), 'session-location', array('fields' => 'all'));
                                            $time = get_post_meta(get_the_ID(), 'session_time', true);
                                            $end_time = get_post_meta(get_the_ID(), 'session_end_time', true);
                                            if (!empty($time)) {
                                                $time_parts = explode(':', $time);
                                                if (count($time_parts) == 2)
                                                    $time = date(get_option("time_format"), mktime($time_parts[0], $time_parts[1], 0));
                                            }
                                            if (!empty($end_time)) {
                                                $time_parts = explode(':', $end_time);
                                                if (count($time_parts) == 2)
                                                    $end_time = date(get_option("time_format"), mktime($time_parts[0], $time_parts[1], 0));
                                            }
                                            $tracks = wp_get_post_terms(get_the_ID(), 'session-track', array('fields' => 'ids', 'count' => 1));
                                            if ($tracks && count($tracks) > 0)
                                                $color = EF_Taxonomy_Helper::ef_get_term_meta('session-track-metas', $tracks[0], 'session_track_color');
                                            else
                                                $color = '';
                                            ?>
                                            <div class="col-sm-6 session-box">
                                                <div class="session item">
                                                    <span class="session-date"><strong><?php echo(!empty($date) ? date_i18n(get_option('date_format'), $date) : ''); ?></strong></span>
                                                    <h3 class="session-title"<?php if (!empty($color)) echo(" style='color:$color;'"); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <div class="session-info">
                                                        <span class="date"><i class="fa fa-clock-o"></i><?php echo $time; ?> - <?php echo $end_time; ?></span>
                                                        <span class="date"><i class="fa fa-map-marker"></i><?php echo(!empty($locations) ? $locations[0]->name : ''); ?></span>
                                                    </div>
                                                    <?php
                                                    if ($tracks && count($tracks) > 0) {
                                                        foreach ($tracks as $track) {
                                                            $color = EF_Taxonomy_Helper::ef_get_term_meta('session-track-metas', $track, 'session_track_color');
                                                            $term = get_term_by('id', $track, 'session-track');
                                                            ?>
                                                            <a href="#" class="label<?php if (empty($color)) echo " bg-gold"; ?>"<?php if (!empty($color)) echo " style=\"background-color: $color;\""; ?>><?php echo $term->name; ?></a>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>" class="sessions-icon fa-stack fa-lg pull-right">
                                                        <i class="fa fa-circle fa-stack-2x"></i>
                                                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                        <i class="fa fa-plus fa-stack-1x"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                        <?php if (!empty($full_schedule_url)) { ?>
                            <a href="<?php echo $full_schedule_url; ?>" class='button visible-xs'>
                                <?php _e('View full schedule', 'vertoh'); ?>
                                <span class="sessions-icon fa-stack">
                                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                                    <i class="fa fa-angle-right fa-stack-1x"></i>
                                </span>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
        <section class="fullwidth back-to-top pages-navigation">
            <div class="container">
                <?php echo get_previous_post_link('%link', '<i class="fa fa-chevron-left"></i>' . __('PREV', 'vertoh')); ?>
                <?php echo get_next_post_link('%link', __('NEXT', 'vertoh') . '<i class="fa fa-chevron-right"></i>'); ?>
                <?php if (!empty($full_speakers_url)) { ?>
                    <ul class="pagination grid-icon">
                        <li><a href="<?php echo $full_speakers_url; ?>"><i class='fa fa-th'></i></a></li>
                    </ul>
                <?php } ?>
                <a href='#top' class="back-to-top-icon fa-stack">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-chevron-up fa-stack-1x"></i>
                </a>
            </div>
        </section>
        <?php
    endwhile;
endif;

get_footer();
