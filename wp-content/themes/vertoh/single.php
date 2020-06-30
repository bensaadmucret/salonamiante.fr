<?php
get_header();
vertoh_include_page_header();

global $wp_query;
while (have_posts()) :
    the_post();
    ?>
    <section class="fullwidth breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo home_url(); ?>"><?php _e('Home', 'vertoh'); ?></a></li>
                <li class="active"><?php echo the_category(', '); ?></li>
            </ol>
        </div>
    </section>
    <?php
    vertoh_include_page_layout();
endwhile;

get_footer();