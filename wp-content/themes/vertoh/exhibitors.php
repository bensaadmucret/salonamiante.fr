<?php
/*
 * Template Name: Exhibitors
 *
 * @package WordPress
 * @subpackage Vertoh
 */
?>
<?php
add_action('wp_head', 'veetoh_exhibitors_print_styles');

function veetoh_exhibitors_print_styles() {
    $button_hover_color = get_post_meta(get_the_ID(), 'exhibitors_calltoaction_buttonhovercolor', true);
    if (!empty($button_hover_color)) {
        ?>
        <style type="text/css">
            .fullwidth.parallax .section-button:hover {background-color: <?php echo $button_hover_color; ?>;}
        </style>
        <?php
    }
}

get_header();

while (have_posts()) :
    the_post();
    vertoh_include_page_header();

    $is_text_search = false;
    $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
    $categories = get_terms('exhibitor-category');
    $exhibitor_query_args = array(
        'post_type' => 'exhibitor',
        'paged' => $paged,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );

    if (!empty($_REQUEST['letter'])) {
        add_filter('posts_where', 'vertoh_exhibitor_letter_posts_where');
    }
    if (!empty($_REQUEST['text'])) {
        add_filter('posts_where', 'vertoh_exhibitor_text_posts_where');
        $is_text_search = true;
    }
    if (!empty($_REQUEST['category'])) {
        $exhibitor_query_args['exhibitor-category'] = $_REQUEST['category'];
    }

    $exhibitor_query = new WP_Query($exhibitor_query_args);

    remove_filter('posts_where', 'vertoh_exhibitor_letter_posts_where');
    remove_filter('posts_where', 'vertoh_exhibitor_text_posts_where');
    ?>
    <div class="has-sticky stickem-container">
        <section class="fullwidth breadcrumbs">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="<?php echo home_url(); ?>"><?php _e('Home', 'vertoh'); ?></a></li>
                    <li class="active"><?php the_title(); ?></li>
                </ol>
            </div>
        </section>
        <section class="fullwidth top-margin page-nav-links small-section">
            <div class="container">
                <div class="">
                    <div class="sticky-content">
                        <ul class="page-content-nav">
                            <li class="dropdown" id='search-letter'>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php _e('Alphabetically', 'vertoh'); ?> <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class='grid clearfix'>
                                        <a href="#" data-search="a">A</a>
                                        <a href="#" data-search="b">B</a>
                                        <a href="#" data-search="c">C</a>
                                        <a href="#" data-search="d">D</a>
                                        <a href="#" data-search="e">E</a>
                                        <a href="#" data-search="f">F</a>
                                        <a href="#" data-search="g">G</a>
                                        <a href="#" data-search="h">H</a>
                                        <a href="#" data-search="i">I</a>
                                        <a href="#" data-search="j">J</a>
                                        <a href="#" data-search="k">K</a>
                                        <a href="#" data-search="l">L</a>
                                        <a href="#" data-search="m">M</a>
                                        <a href="#" data-search="n">N</a>
                                        <a href="#" data-search="o">O</a>
                                        <a href="#" data-search="p">P</a>
                                        <a href="#" data-search="q">Q</a>
                                        <a href="#" data-search="r">R</a>
                                        <a href="#" data-search="s">S</a>
                                        <a href="#" data-search="t">T</a>
                                        <a href="#" data-search="u">U</a>
                                        <a href="#" data-search="v">V</a>
                                        <a href="#" data-search="w">W</a>
                                        <a href="#" data-search="x">X</a>
                                        <a href="#" data-search="y">Y</a>
                                        <a href="#" data-search="z">Z</a>
                                        <a href="#" data-search=""><?php _e('ALL', 'vertoh'); ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown" id='search-category'>
                                <a href="#" class="dropdown-data-toggle" data-toggle="dropdown"><?php _e('Categories', 'vertoh'); ?> <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" data-search=''><?php _e('ALL', 'vertoh'); ?></a></li>
                                    <?php
                                    if ($categories && count($categories) > 0) {
                                        foreach ($categories as $category) {
                                            ?>
                                            <li><a href="#" data-search='<?php echo $category->slug; ?>'><?php echo $category->name; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                        <div class="input-group search-form">
                            <input placeholder="<?php _e('Enter your search', 'vertoh'); ?>" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container ">
                <div class="stickem-container">
                    <?php if ($is_text_search) { ?>
                        <div class="followWrap search-query">
                            <div class='day-floating'>
                                <div class="container">
                                    <span><?php printf(__('Search Results for "%s" Query', 'vertoh'), $_REQUEST['text']); ?></span>
                                    <strong class="pull-right"><a href="#" id="exhibitor_clear_search"><?php _e('CLEAR SEARCH', 'vertoh'); ?> <i class='fa fa-plus'></i></a></strong>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row exhibitors-wrapper">
                        <?php
                        if ($exhibitor_query->have_posts()):
                            while ($exhibitor_query->have_posts()) :
                                $exhibitor_query->the_post();
                                $exhibitor_categories = wp_get_post_terms(get_the_ID(), 'exhibitor-category');
                                ?>
                                <div class="exhibitor col-sm-3">
                                    <a class='logo-wrapper' href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('vertoh_exhibitor'); ?>
                                    </a>
                                    <h3 class="exhibitor-name"><?php the_title(); ?></h3>
                                    <p class="exhibitor-about"><?php echo get_post_meta(get_the_ID(), 'exhibitor_subtitle', true); ?></p>
                                    <?php
                                    foreach ($exhibitor_categories as $exhibitor_category) {
                                        $color = EF_Taxonomy_Helper::ef_get_term_meta('exhibitor-category-metas', $exhibitor_category->term_id, 'exhibitor_category_color');
                                        ?>
                                        <span class="label"<?php if (!empty($color)) echo " style=\"background-color: $color;\""; ?>><?php echo $exhibitor_category->name; ?></span>
                                    <?php } ?>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_query();
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
                <div class="end-div"></div>
            </div>
        </section>
    </div>

    <?php vertoh_pagination($paged, $exhibitor_query->max_num_pages); ?>

    <?php
    if (get_post_meta(get_the_ID(), 'exhibitors_calltoaction_status', true) == 1) {
        $text_color = get_post_meta(get_the_ID(), 'exhibitors_calltoaction_textcolor', true);
        if (empty($text_color))
            $text_color = '#000000';
        ?>
        <section class="fullwidth parallax no-margin" style='background-image: url("<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'exhibitors_calltoaction_image', true)); ?>")'>
            <div class="container">
                <h2 style="color: <?php echo $text_color; ?>;">
                    <?php echo get_post_meta(get_the_ID(), 'exhibitors_calltoaction_title', true); ?>
                </h2>
                <p style="color: <?php echo $text_color; ?>;"><?php echo get_post_meta(get_the_ID(), 'exhibitors_calltoaction_subtitle', true); ?></p>
                <a href="<?php echo get_post_meta(get_the_ID(), 'exhibitors_calltoaction_buttonurl', true); ?>" class="section-button" style="color: <?php echo $text_color; ?>;"><?php echo get_post_meta(get_the_ID(), 'exhibitors_calltoaction_buttontext', true); ?></a>
            </div>
        </section>
    <?php } ?>

    <?php
endwhile;
get_footer();
