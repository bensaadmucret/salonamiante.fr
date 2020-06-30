<?php
// Template Name: Instagram Full Page
get_header('social');
?>
<section class="content">
    <div class="container">
        <div id="instagram_update_list" class="row">
        </div>
        <div class="text">
            <a href="<?php echo home_url(); ?>" class='button'>
                <span class="sessions-icon fa-stack">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-chevron-left fa-stack-1x"></i>
                </span><?php _e('Back to home', 'vertoh'); ?>
            </a>
        </div>

    </div>
</section>
<?php
get_footer('social');
