<?php
get_header();

while (have_posts()) :
    the_post();
    vertoh_include_page_header();
    ?>
    <section class="fullwidth breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo home_url(); ?>"><?php _e('Home', 'vertoh'); ?></a></li>
                <li class="active"><?php the_title() ?></li>
            </ol>
        </div>
    </section>
    <section class="content ">
        <div class="container ">
            <header class="section-header">
                <h2><?php the_title() ?></h2>
            </header>
            <?php the_content(); ?>
        </div>
    </section>
    <?php
endwhile;
get_footer();
