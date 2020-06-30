<?php
$full_exhibitors_page = get_posts(
        array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'exhibitors.php'
        )
);

get_header();

if (have_posts()) :
    while (have_posts()) :
        the_post();
        vertoh_include_page_header();
        ?>
        <div class="has-sticky stickem-container">
            <section class="fullwidth breadcrumbs">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo home_url(); ?>"><?php _e('Home', 'vertoh'); ?></a></li>
                        <?php if ($full_exhibitors_page && count($full_exhibitors_page) > 0) { ?>
                            <li><a href="<?php echo get_permalink($full_exhibitors_page[0]->ID); ?>"><?php _e('All Exhibitors'); ?></a></li>
                        <?php } ?>
                        <li class="active"><?php the_title(); ?></li>
                    </ol>
                </div>
            </section>
            <section class="content margin-20">
                <div class="container ">
                    <div class="stickem-container">
                        <div class="row exhibitor-info">
                            <div class="col-md-4 col-sm-6 featured-image">
                                <div class='logo-wrapper'>
                                    <?php the_post_thumbnail('vertoh_exhibitor', array('alt' => get_the_title(), 'class' => 'exhibitor-image lazyOwl')); ?>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 content">
                                <h1 class='exhibitor-title'><?php the_title(); ?></h1>
                                <p><?php echo get_post_meta(get_the_ID(), 'exhibitor_subtitle', true); ?></p>
                                <hr class='bg-gold' />
                                <?php echo get_post_meta(get_the_ID(), 'exhibitor_topdetail', true); ?>
                            </div>
                        </div>
                        <div class="row exhibitor-details">
                            <div class="col-sm-3 col-xs-6">
                                <?php
                                $title1 = get_post_meta(get_the_ID(), 'exhibitor_title1', true);
                                if (!empty($title1)) {
                                    ?>
                                    <h6><?php echo stripslashes($title1); ?></h6>
                                    <?php
                                }
                                ?>
                                <?php echo get_post_meta(get_the_ID(), 'exhibitor_detail1', true); ?>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <?php
                                $title2 = get_post_meta(get_the_ID(), 'exhibitor_title2', true);
                                if (!empty($title1)) {
                                    ?>
                                    <h6><?php echo stripslashes($title2); ?></h6>
                                    <?php
                                }
                                ?>
                                <?php echo get_post_meta(get_the_ID(), 'exhibitor_detail2', true); ?>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <?php
                                $title3 = get_post_meta(get_the_ID(), 'exhibitor_title3', true);
                                if (!empty($title3)) {
                                    ?>
                                    <h6><?php echo stripslashes($title3); ?></h6>
                                    <?php
                                }
                                ?>
                                <?php echo get_post_meta(get_the_ID(), 'exhibitor_detail3', true); ?>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <?php
                                $title4 = get_post_meta(get_the_ID(), 'exhibitor_title4', true);
                                if (!empty($title4)) {
                                    ?>
                                    <h6><?php echo stripslashes($title4); ?></h6>
                                    <?php
                                }
                                ?>
                                <?php echo get_post_meta(get_the_ID(), 'exhibitor_detail4', true); ?>
                            </div>
                        </div>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php
    endwhile;
endif;

get_footer();
