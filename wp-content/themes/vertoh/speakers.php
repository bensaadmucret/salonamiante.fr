<?php
/*
 * Template Name: Speakers
 *
 * @package WordPress
 * @subpackage Vertoh
 */
?>
<?php
add_action('wp_head', 'veetoh_speakers_print_styles');

function veetoh_speakers_print_styles() {
    $button_hover_color = get_post_meta(get_the_ID(), 'speakers_calltoaction_buttonhovercolor', true);
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
            <p class='leading center'>
                <?php the_content(); ?>
            </p>
            <?php
            for ($i = 0; $i < 3; $i++) {
                $speakers_full_order = get_post_meta(get_the_ID(), 'speakers_full_order_' . ($i + 1), true);
                ?>
                <header class="section-header">
                    <h2><?php echo get_post_meta(get_the_ID(), 'speakers_full_title_' . ($i + 1), true); ?></h2>
                </header>
                <div class="row row-centered grid">
                    <?php
                    if (!empty($speakers_full_order)) {
                        $speakers_full_order = explode(',', $speakers_full_order);
                        foreach ($speakers_full_order as $speaker_id) {
                            $speaker = get_post($speaker_id);
                            if ($speaker && $speaker->post_status == 'publish') {
                                ?>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-centered col-fixed">
                                    <div class="item">
                                        <div class="content">
                                            <div class="speaker<?php if (get_post_meta($speaker_id, 'speaker_keynote', true) == 1) echo ' featured'; ?>">
                                                <a href="<?php echo get_permalink($speaker_id); ?>" alt="<?php echo get_the_title($speaker_id); ?>">
                                                    <?php echo get_the_post_thumbnail($speaker_id, 'vertoh-speaker', array('alt' => get_the_title($speaker_id), 'class' => 'speaker-image lazyOwl')); ?>
                                                </a>
                                                <h3 class="speaker-name"><a href="<?php echo get_permalink($speaker_id); ?>"><?php echo get_the_title($speaker_id); ?></a></h3>
                                                <a href="<?php echo get_permalink($speaker_id); ?>" class="read-more-link">
                                                    <?php _e('Read more', 'vertoh'); ?>
                                                    <span class="readmore-icon fa-stack fa-sm">
                                                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                        <i class="fa fa-plus fa-stack-1x"></i>
                                                    </span>
                                                </a>
                                                <p class="speaker-about"><?php echo get_post_meta($speaker->ID, 'speaker_title', true); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="fullwidth back-to-top margin-bottom">
        <div class="container center">
            <a data-scroll data-options='{ "easing": "easeOutCubic" }'  href='#top' class="sessions-icon fa-stack">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-chevron-up fa-stack-1x"></i>
            </a>
        </div>
    </section>
    <?php
    if (get_post_meta(get_the_ID(), 'speakers_calltoaction_status', true) == 1) {
        $text_color = get_post_meta(get_the_ID(), 'speakers_calltoaction_textcolor', true);
        if (empty($text_color))
            $text_color = '#000000';
        ?>
        <section class="fullwidth parallax no-margin" style='background-image: url("<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'speakers_calltoaction_image', true)); ?>")'>
            <div class="container">
                <h2 style="color: <?php echo $text_color; ?>;"><?php echo get_post_meta(get_the_ID(), 'speakers_calltoaction_title', true); ?></h2>
                <p style="color: <?php echo $text_color; ?>;"><?php echo get_post_meta(get_the_ID(), 'speakers_calltoaction_subtitle', true); ?></p>
                <a href="<?php echo get_post_meta(get_the_ID(), 'speakers_calltoaction_buttonurl', true); ?>" class="section-button" style="color: <?php echo $text_color; ?>;"><?php echo get_post_meta(get_the_ID(), 'speakers_calltoaction_buttontext', true); ?></a>
            </div>
        </section>
    <?php } ?>
<?php endwhile; ?>

<?php get_footer() ?>