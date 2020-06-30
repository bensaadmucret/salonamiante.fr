<?php
get_header();
vertoh_include_page_header();

global $wp_query;
?>
<section class="fullwidth breadcrumbs">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo home_url(); ?>"><?php _e('Home', 'vertoh'); ?></a></li>
            <li class="active"><?php printf( __('Search Results for: %s', 'vertoh'), get_search_query()); ?></li>
        </ol>
    </div>
</section>
<?php
vertoh_include_page_layout();

echo vertoh_pagination($paged, $wp_query->max_num_pages);

get_footer();