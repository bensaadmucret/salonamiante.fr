<?php get_header() ?>

<?php
$ef_options = EF_Event_Options::get_theme_options();
if (have_posts()) :
    while (have_posts()) :
        the_post();
        vertoh_include_page_header();
        $single_session_fields = EF_Query_Manager::get_single_session_fields();
        extract($single_session_fields);
        $full_schedule_page = get_posts(array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'schedule.php'
        ));
        $full_schedule_url = '';
        $full_schedule_title = '';
        if ($full_schedule_page && count($full_schedule_page) > 0) {
            $full_schedule_url = get_permalink($full_schedule_page[0]->ID);
            $full_schedule_title = get_the_title($full_schedule_page[0]->ID);
        }
        ?>
        <section class="fullwidth breadcrumbs">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="<?php echo home_url(); ?>"><?php _e('Home', 'vertoh'); ?></a></li>
                    <?php if (!empty($full_schedule_url)) { ?>
                        <li><a href="<?php echo $full_schedule_url; ?>"><?php echo $full_schedule_title; ?></a></li>
                    <?php } ?>
                    <li class="active"><?php the_title() ?></li>
                </ol>
            </div>
        </section>
        <section class="content single-session">
            <div class="container">
                <header class="session-header">
                    <div class="session-tags">
                        <?php foreach ($tracks as $track) { ?>
                            <span data-track="<?php echo $track->term_id; ?>" class="label single-session-link btn btn-primaryd<?php if (empty($track->color)) echo " bg-gold"; ?>" <?php if (!empty($track->color)) echo "style='background-color: $track->color;'"; ?>><?php echo $track->name; ?></span>
                        <?php } ?>
                    </div>
                    <div class='clearfix'>
                        <h1 class='session-title'><?php the_title(); ?></h1>
                        <?php if (!empty($registration_code)) { ?>
                            <a class="section-button medium" href="#session_register"><?php _e('Register to  the session', 'vertoh'); ?></a>
                        <?php } ?>
                    </div>
                    <hr class="bg-gold" />
                    <div class="session-meta">
                        <span class="location">
                            <i class="fa fa-map-marker"></i>
                            <span><?php echo(!empty($locations) ? $locations[0]->name : ''); ?></span>
                        </span>
                        <span class="date">
                            <i class="fa fa-calendar-o"></i>
                            <?php echo(!empty($date) ? date_i18n(get_option('date_format'), $date) : ''); ?>
                        </span>
                        <span class="hour">
                            <i class="fa fa-clock-o"></i>
                            <?php echo $time; ?> - <?php echo $end_time; ?>
                        </span>
                        <span class="entry-share pull-right">
                            <!-- AddThis Button BEGIN -->
                            <p class="clearfix" tabindex="1000">
                                <a class="addthis_button no-overlay" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=<?php echo $ef_options['ef_add_this_pubid']; ?>">
                                    <img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="<?php _e('Bookmark and Share', 'vertoh'); ?>" style="border:0" class=''>
                                </a>
                            </p>
                            <!-- AddThis Button END -->
                        </span>
                    </div>
                </header>
                <div class="entry-content session-content">
                    <div class="speakers clearfix">
                        <?php
                        if (!empty($speakers_list)) {
                            foreach ($speakers_list as $speaker_id) {
                                 $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($speaker_id), 'vertoh-speaker');
                                ?>
                                <div class="img-text" style="background-image: url(<?php echo $thumbnail[0]; ?>);">
                                    <h6><?php echo get_the_title($speaker_id); ?></h6>
                                    <a href="<?php echo get_permalink($speaker_id); ?>"<?php if (get_post_meta($speaker_id, 'speaker_keynote', true) == 1) echo ' class="featured"'; ?>></a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <br>
                    <?php the_content(); ?>

                    <?php if (!empty($registration_code)) { ?>
                        <h2 id="session_register"><?php echo $registration_title; ?></h2>
                        <div style="margin: 2em 0">
                            <?php echo $registration_code; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <h4 class='content-heading'><?php _e('How to register?', 'vertoh'); ?></h4>
                                <p><?php echo get_post_meta(get_the_ID(), 'session_registration_text', true); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="fullwidth back-to-top pages-navigation">
            <div class="container">
                <?php vertoh_previous_post_link_plus(array('order_by' => 'custom', 'meta_key' => 'session_date', 'format' => '%link', 'link' => '<i class="fa fa-chevron-left"></i>' . __('PREV', 'vertoh'))); ?>
                <?php vertoh_next_post_link_plus(array('order_by' => 'custom', 'meta_key' => 'session_date', 'format' => '%link', 'link' => __('NEXT', 'vertoh') . '<i class="fa fa-chevron-right"></i>')); ?>
                <?php if ($full_schedule_page && count($full_schedule_page) > 0) { ?>
                    <ul class="pagination grid-icon">
                        <li><a href="<?php echo get_permalink($full_schedule_page[0]->ID); ?>"><i class='fa fa-th'></i></a></li>
                    </ul>
                <?php } ?>
                <a href='#top' class="back-to-top-icon fa-stack ">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-chevron-up fa-stack-1x"></i>
                </a>
            </div>
        </section>
        <?php
    endwhile;
endif;

get_footer();
