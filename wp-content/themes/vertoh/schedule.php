<?php
/*
 * Template Name: Schedule
 *
 * @package WordPress
 * @subpackage Vertoh
 */
?>
<?php
add_action('wp_head', 'veetoh_schedule_print_styles');

function veetoh_schedule_print_styles() {
    $button_hover_color = get_post_meta(get_the_ID(), 'schedule_calltoaction_buttonhovercolor', true);
    if (!empty($button_hover_color)) {
        ?>
        <style type="text/css">
            .fullwidth.parallax .section-button:hover {background-color: <?php echo $button_hover_color; ?>;}
        </style>
        <?php
    }
}

get_header();
?>

<?php
$session_dates = EF_Session_Helper::ef_get_session_dates();
$session_tracks = get_terms('session-track');
$session_locations = get_terms('session-location');
?>

<?php
while (have_posts()) :
    the_post();
    vertoh_include_page_header();
    ?>
    <section class="fullwidth breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo home_url(); ?>"><?php _e('Home', 'vertoh'); ?></a></li>
                <li class="active"><?php the_title(); ?></li>
            </ol>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="leading">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <section class="schedule sticked">
    </section>

    <section class="fullwidth back-to-top margin-bottom">
        <div class="container center">
            <a href='#top' class="sessions-icon fa-stack jump-link">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-chevron-up fa-stack-1x"></i>
            </a>
        </div>
    </section>

    <?php
    if (get_post_meta(get_the_ID(), 'schedule_calltoaction_status', true) == 1) {
        $text_color = get_post_meta(get_the_ID(), 'schedule_calltoaction_textcolor', true);
        if (empty($text_color))
            $text_color = '#000000';
        ?>
        <section class="fullwidth parallax no-margin" style='background-image: url("<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'schedule_calltoaction_image', true)); ?>")'>
            <div class="container">
                <h2 style="color: <?php echo $text_color; ?>;"><?php echo get_post_meta(get_the_ID(), 'schedule_calltoaction_title', true); ?></h2>
                <p style="color: <?php echo $text_color; ?>;"><?php echo get_post_meta(get_the_ID(), 'schedule_calltoaction_subtitle', true); ?></p>
                <a href="<?php echo get_post_meta(get_the_ID(), 'schedule_calltoaction_buttonurl', true); ?>" class="section-button" style="color: <?php echo $text_color; ?>;"><?php echo get_post_meta(get_the_ID(), 'schedule_calltoaction_buttontext', true); ?></a>
            </div>
        </section>
    <?php } ?>
    <ul id="schedule_filters" style="display:none;">
        <?php if (!empty($session_tracks)) { ?>
            <li class="std-dropdown">
                <a href="javascript:void(0)"><?php _e('Filter by track', 'vertoh'); ?></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-track="0"><?php _e('All', 'vertoh'); ?></a></li>
                    <?php foreach ($session_tracks as $session_track) { ?>
                        <li><a href="#" data-track="<?php echo $session_track->term_id; ?>"><?php echo $session_track->name; ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
        <?php if (!empty($session_locations)) { ?>
            <li class="std-dropdown">
                <a href="javascript:void(0)"><?php _e('Filter by location', 'vertoh'); ?></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-location="0"><?php _e('All', 'vertoh'); ?></a></li>
                    <?php foreach ($session_locations as $session_location) { ?>
                        <li><a href="#" data-location="<?php echo $session_location->term_id; ?>"><?php echo $session_location->name; ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
        <?php if (!empty($session_locations)) { ?>
            <li class="std-dropdown">
                <a href="javascript:void(0)"><?php _e('Filter by days', 'vertoh'); ?></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-timestamp="0"><?php _e('All', 'vertoh'); ?></a></li>
                    <?php foreach ($session_dates as $session_date) { ?>
                        <li><a href="#" data-timestamp="<?php echo $session_date->meta_value; ?>"><?php echo date_i18n(get_option('date_format'), $session_date->meta_value); ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
    <?php
endwhile;
get_footer();
