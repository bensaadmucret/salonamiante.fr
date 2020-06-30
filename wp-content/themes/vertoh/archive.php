<?php
get_header();
vertoh_include_page_header();

global $wp_query;
?>
<section class="fullwidth breadcrumbs">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo home_url(); ?>"><?php _e('Home', 'vertoh'); ?></a></li>
            <li class="active">
                <?php
                if (is_day()) {
                    printf(__('Daily Archives: <span>%s</span>', 'vertoh'), get_the_date());
                } elseif (is_month()) {
                    printf(__('Monthly Archives: <span>%s</span>', 'vertoh'), get_the_date(_x('F Y', 'monthly archives date format', 'vertoh')));
                } elseif (is_year()) {
                    printf(__('Yearly Archives: <span>%s</span>', 'vertoh'), get_the_date(_x('Y', 'yearly archives date format', 'vertoh')));
                } elseif (is_author()) {
                    printf(__('All posts by: %s', 'vertoh'), get_the_author());
                } elseif (is_tag()) {
                    printf(__('Tag Archives: %s', 'vertoh'), single_tag_title('', false));
                } else {
                    _e('Archives', 'vertoh');
                }
                ?>
            </li>
        </ol>
    </div>
</section>
<?php
vertoh_include_page_layout();

echo vertoh_pagination($paged, $wp_query->max_num_pages);

get_footer();