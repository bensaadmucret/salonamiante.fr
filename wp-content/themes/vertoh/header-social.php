<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/html5shiv.js"></script>
        <![endif]-->
        <!--[if IE]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.css"/><![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(array('custom', "twitter-wall")); ?>>
        <header class="page-heading">
            <div class="container">
                <div class="text">
                    <a href="<?php echo home_url(); ?>" class='button'>
                        <span class="sessions-icon fa-stack">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-chevron-left fa-stack-1x"></i>
                        </span><?php _e('Back to home', 'vertoh'); ?></a>
                </div>
                <?php if (get_page_template_slug() == 'twitter.php') { ?>
                    <i class="fa fa-twitter pull-right page-icon"></i>
                <?php } else if (get_page_template_slug() == 'instagram.php') { ?>
                    <i class="fa fa-instagram pull-right page-icon"></i>
                <?php } ?>
            </div>
        </header>