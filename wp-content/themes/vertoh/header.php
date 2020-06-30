<?php
$ef_options = EF_Event_Options::get_theme_options();
$bar_class = 'white';
$page_header_type = 'image';
$home_header_type = 'slider';
if (is_home()) {
    if (!empty($ef_options['ef_bar_type']))
        $bar_class = $ef_options['ef_bar_type'];
    if (!empty($ef_options['ef_header_type']))
        $home_header_type = $ef_options['ef_header_type'];
}
$menu_expanded_bar_class = $ef_options['ef_bar_type'] ? $ef_options['ef_bar_type'] : $bar_class; 
$custom_logo_url = vertoh_set_theme_logo();
if (is_singular('post', 'page') || in_array(get_page_template_slug(), array('speakers.php', 'exhibitors.php', 'schedule.php'))) {
    $no_header_scroll_class = '';
} else {
    $no_header_scroll_class = 'v2 no-scroll';
}
$header_menu_icon_color = '';
if (is_home()) {
    if (!empty($ef_options['ef_header_menu_icon_color']))
        $header_menu_icon_color = $ef_options['ef_header_menu_icon_color'];
}
?>
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
    <body id='top' <?php body_class(array('home', "type-$home_header_type")); ?>>
        <nav class="nav-wrapper">
            <i class="close-menu c-dark fa fa-plus"></i>
            <hr class="bg-gold" />
             <?php 
			if(!strpos(strtolower($menu_expanded_bar_class), "expandedheadercntr")) {
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_class' => 'main-navigation',
					'menu_id' => '',
					'container' => ''
				));
			} 
            ?>
        </nav>
		<?php  if(strpos(strtolower($menu_expanded_bar_class), "expandedheadercntr")) { ?>       
			<!-- Expanded Header Start       -->
			<header id="site-header" class="header <?php echo is_home() ? $bar_class : 'expandedHeaderCntr'; ?> header-sticked <?php echo $no_header_scroll_class; ?>">  
			<div class="expandedHeader">
				<div class="container clearfix cntrs">
					<a class="expandedLogo pull-left" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo(!empty($custom_logo_url)) ? $custom_logo_url : get_template_directory_uri().'/images/logo.png'; ?>" alt="" /></a>
					<div class="expandedNavigation">
						<nav class="navbar" role="navigation">
							<div class="container">
								<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								</button>
								</div>
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<?php
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'menu_class' => 'nav navbar-nav pull-right',
									'menu_id' => '',
									'container'       => 'ul'
								));
								?>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
			</header>
			<!-- Expanded Header End --> 
		<?php } else { ?>
        <header id="site-header" class="header <?php echo $bar_class; ?> header-sticked <?php echo $no_header_scroll_class; ?>">
            <div class="container">
                <i class="fa fa-bars menu-handler"<?php echo!empty($header_menu_icon_color) ? ' style="color:' . $header_menu_icon_color . ';"' : ''; ?>></i>
                <h1 class="site-logo center">
                    <a <?php echo(!empty($custom_logo_url) ? " style=\"background-image:url('$custom_logo_url');\"" : ''); ?> href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a>
                </h1>
                <?php
                $widget_ef_registration = get_option('widget_ef_registration');
                if (is_active_widget(false, false, 'ef_registration') && is_array($widget_ef_registration)) {
                    foreach ($widget_ef_registration as $key => $reg_widget) {
                        if (empty($reg_widget)) {
                            unset($widget_ef_registration[$key]);
                            update_option('widget_ef_registration', $widget_ef_registration);
                        }
                        if (isset($reg_widget['registrationshowcalltoaction']) && $reg_widget['registrationshowcalltoaction'] == 1) {
                            $registration_calltoaction_url = !empty($reg_widget['registrationcalltoactionurl']) ? $reg_widget['registrationcalltoactionurl'] : home_url('#tile_registration_anchor');
                            ?>
                            <a href="<?php echo $registration_calltoaction_url; ?>"><i class="fa fa-ticket pull-right right-icon"></i></a>
                                <?php
                                break;
                            }
                        }
                    }
                    ?>
            </div>
        </header>
		<?php } ?>