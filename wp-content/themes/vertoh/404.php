<?php
get_header();
vertoh_include_page_header();
?>
<section class="content ">
    <div class="container ">
        <header class="section-header">
            <h2><?php _e('404 Not Found', 'vertoh'); ?></h2>
            <small><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'vertoh'); ?></small>
        </header>
        <div>
            <?php get_search_form(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
