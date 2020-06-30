<?php

global $ef_panel_manager;
$theme_options = $ef_panel_manager->get_panel('theme_options');

/*
 * Generate Theme Options Tabs
 */

$tab_general_site_options = new EF_Options_Tab();
$tab_homepage_options = new EF_Options_Tab();
$tab_misc = new EF_Options_Tab();
$tab_social_connecting = new EF_Options_Tab();
$tab_blog_options = new EF_Options_Tab();
$tab_media_options = new EF_Options_Tab();
$tab_newsletter = new EF_Options_Tab();
/*
 * General Site Options Fields
 */
$color_palette = new EF_Select_Field(
        'ef_color_palette', 'Color Palette', '', // empty Description
        array('options' => array(
        'basic' => 'Basic',
        'blue' => 'Blue',
        'brick' => 'Brick',
        'bubblegum' => 'Bubblegum',
        'coldgreen' => 'Cold Green',
        'jade' => 'Jade',
        'male' => 'Male',
        'mint' => 'Mint',
        'orange' => 'Orange',
        'peach' => 'Peach',
        'petrolio' => 'Petrolio',
        'pumpkin' => 'Pumpkin',
        'sangria' => 'Sangria',
        'sea' => 'Sea',
        'silver' => 'Silver'
    ))
);
$logo = new EF_Image_Field('ef_logo', __('Logo', 'vertoh') . '  (' . apply_filters('ef_widget_recommended_size_text', '', 'ef_options', 'ef_logo') . ')');
$footer_content = new EF_Text_Field('ef_footer_content', __('Footer Copyright Content', 'vertoh'));

/*
 * Homepage Options Fields
 */
$bar_type = new EF_Select_Field(
        'ef_bar_type', __('Top Bar', 'vertoh'), '', // empty Description
        array('options' => array(
        'transparent' => __('Transparent', 'vertoh'),
        'fat' => __('White', 'vertoh'),
		'fat expandedHeaderCntr' => __('Expanded Header', 'vertoh')
    ))
);
$header_type = new EF_Select_Field(
        'ef_header_type', __('Header Type', 'vertoh'), '', // empty Description
        array('options' => array(
        'slider' => __('Images Slider', 'vertoh'),
        'video' => __('Video', 'vertoh'),
        'small' => __('Small', 'vertoh'),
        'solid' => __('Solid Color', 'vertoh')
    ))
);
$header_menu_icon_color = new EF_Color_Field('ef_header_menu_icon_color', __('Header Menu Icon Color', 'vertoh'));
$event_title = new EF_Text_Field('ef_herotitle', __('Event Title', 'vertoh'));
$event_tagline = new EF_Text_Field('ef_herotagline', __('Event Tagline', 'vertoh'));
$event_city_country = new EF_Text_Field('ef_eventcitycountry', __('Event City & Country', 'vertoh'));
$event_location = new EF_Text_Field('ef_eventlocation', __('Event Venue', 'vertoh'));
$event_date = new EF_Text_Field('ef_eventdate', __('Event date, location and starting time', 'vertoh'));
$header_down_link = new EF_Text_Field('ef_header_down_link', __('Header Image Down Arrow Anchor Link', 'vertoh'));
$event_title_color = new EF_Color_Field('ef_title_color', __('Event Title Color', 'vertoh'));
$event_tagline_color = new EF_Color_Field('ef_subtitle_color', __('Event Tagline Color', 'vertoh'));
$header_logo = new EF_Image_Field('ef_header_logo', __('Header Big Logo', 'vertoh') . '  (' . apply_filters('ef_widget_recommended_size_text', '', 'ef_options', 'ef_header_logo') . ')');
$header_gallery = new EF_Gallery_Field('ef_header_gallery', __('Header Gallery', 'vertoh') . '  (' .  apply_filters('ef_widget_recommended_size_text', '', 'ef_options', 'ef_header_gallery') . ')', '', array('style' => 'style="width:100%;"'));
$header_video = new EF_Text_Field('ef_header_video', __('Header Video Url', 'vertoh'));
$header_video_background_image = new EF_Image_Field('ef_header_video_background_image', __('Header Video Background Image', 'vertoh') . '  (' . apply_filters('ef_widget_recommended_size_text', '', 'ef_options', 'ef_header_video_background_image') . ')');
$header_background_color = new EF_Color_Field('ef_header_background_color', __('Header Background Color', 'vertoh'));

// Social and Connecting
$social_facebook = new EF_Text_Field('ef_facebook', __('Facebook URL', 'vertoh'));
$social_twitter = new EF_Text_Field('ef_twitter', __('Twitter URL', 'vertoh'));
$social_rss = new EF_Checkbox_Field('ef_rss', __('Show RSS?', 'vertoh'));
$social_email = new EF_Text_Field('ef_email', __('Email Address', 'vertoh'));
$social_google_plus = new EF_Text_Field('ef_google_plus', __('Google+ URL', 'vertoh'));
$social_flickr = new EF_Text_Field('ef_flickr', __('Flickr URL', 'vertoh'));
$social_instagram = new EF_Text_Field('ef_instagram', __('Instagram URL', 'vertoh'));
$social_pinterest = new EF_Text_Field('ef_pinterest', __('Pinterest URL', 'vertoh'));
$social_linkedin = new EF_Text_Field('ef_linkedin', __('LinkedIn URL', 'vertoh'));
$social_add_this = new EF_Text_Field('ef_add_this_pubid', __('AddThis PubID', 'vertoh'));
$social_youtube = new EF_Text_Field('ef_youtube', __('Youtube URL', 'vertoh'));
$social_skype = new EF_Text_Field('ef_skype', __('Skype User', 'vertoh'));
$social_vimeo = new EF_Text_Field('ef_vimeo', __('Vimeo URL', 'vertoh'));

// Misc Fields
$misc_importer = new EF_Importer_Field('misc-importer', __('Demo Data', 'vertoh'), __('Import test data. Success message will follow.', 'vertoh'));

/*
 * Blog Options Fields
 */
$blog_layout = new EF_Select_Field(
        'ef_blog_layout', __('Layout', 'vertoh'), '', array('options' => array(
        'blog-full-width' => __('Full Width', 'vertoh'),
        'blog-right-sidebar' => __('Rigth Sidebar', 'vertoh')
    ))
);

/*
 * Media Options Fields
 */
$media_gallery = new EF_Gallery_Field('ef_media_gallery', apply_filters('ef_widget_recommended_size_text', '', 'ef_options', 'ef_media_gallery'), '', array('video' => true, 'style' => 'style="width:100%;"'));

/*
 * Newsletter Fields
 */
$newsletter_status = new EF_Select_Field('ef_newsletter_status', __('Status', 'vertoh'), __('<div class="update-nag">Please note: This section is only visible if the Newsletter widget is activated.</div>', 'vertoh'), array('options' => array(
        '1' => __('Visible', 'vertoh'),
        '0' => __('Not visible', 'vertoh'))
        ));
$newsletter_background_color = new EF_Color_Field('ef_newsletter_background_color', __('Background Color', 'vertoh'));
$newsletter_color = new EF_Color_Field('ef_newsletter_color', __('Text Color', 'vertoh'));
$newsletter_title = new EF_Text_Field('ef_newsletter_title', __('Title', 'vertoh'));
$newsletter_text = new EF_Textarea_Field('ef_newsletter_text', __('Text', 'vertoh'));
$newsletter_button_text = new EF_Text_Field('ef_newsletter_button_text', __('Button Text', 'vertoh'));
$newsletter_url = new EF_Text_Field('ef_newsletter_url', __('Mailchimp Action Url', 'vertoh'));

// Add fields to General Site Options
$tab_general_site_options->add_field('ef_color_palette', $color_palette);
$tab_general_site_options->add_field('ef_logo', $logo);
$tab_general_site_options->add_field('ef_footer_content', $footer_content);

// Add fields to Homepage Options
$tab_homepage_options->add_field('ef_bar_type', $bar_type);
$tab_homepage_options->add_field('ef_header_type', $header_type);
$tab_homepage_options->add_field('ef_header_menu_icon_color', $header_menu_icon_color);
$tab_homepage_options->add_field('ef_herotitle', $event_title);
$tab_homepage_options->add_field('ef_herotagline', $event_tagline);
$tab_homepage_options->add_field('ef_eventcitycountry', $event_city_country);
$tab_homepage_options->add_field('ef_eventlocation', $event_location);
$tab_homepage_options->add_field('ef_eventdate', $event_date);
$tab_homepage_options->add_field('ef_header_down_link', $header_down_link);
$tab_homepage_options->add_field('ef_title_color', $event_title_color);
$tab_homepage_options->add_field('ef_subtitle_color', $event_tagline_color);

$tab_homepage_options->add_field('ef_header_logo', $header_logo);
$tab_homepage_options->add_field('ef_header_gallery', $header_gallery);
$tab_homepage_options->add_field('ef_header_video', $header_video);
$tab_homepage_options->add_field('ef_header_video_background_image', $header_video_background_image);
$tab_homepage_options->add_field('ef_header_background_color', $header_background_color);


// Add fields to Misc tab
$tab_misc->add_field('misc_importer', $misc_importer);

// Add fields to Social and Connecting tab
$tab_social_connecting->add_field('ef_linkedin', $social_linkedin);
$tab_social_connecting->add_field('ef_twitter', $social_twitter);
$tab_social_connecting->add_field('ef_facebook', $social_facebook);
$tab_social_connecting->add_field('ef_instagram', $social_instagram);
$tab_social_connecting->add_field('ef_youtube', $social_youtube);
$tab_social_connecting->add_field('ef_pinterest', $social_pinterest);
$tab_social_connecting->add_field('ef_google_plus', $social_google_plus);
$tab_social_connecting->add_field('ef_email', $social_email);
$tab_social_connecting->add_field('ef_vimeo', $social_vimeo);
$tab_social_connecting->add_field('ef_flickr', $social_flickr);
$tab_social_connecting->add_field('ef_skype', $social_skype);
$tab_social_connecting->add_field('ef_rss', $social_rss);
$tab_social_connecting->add_field('ef_add_this_pubid', $social_add_this);

// Add fields to General Site Options
$tab_blog_options->add_field('ef_blog_layout', $blog_layout);

// Add fields to Media Options
$tab_media_options->add_field('ef_media_gallery', $media_gallery);

// Add fields to Newsletter Options
$tab_newsletter->add_field('ef_newsletter_status', $newsletter_status);
$tab_newsletter->add_field('ef_newsletter_background_color', $newsletter_background_color);
$tab_newsletter->add_field('ef_newsletter_color', $newsletter_color);
$tab_newsletter->add_field('ef_newsletter_title', $newsletter_title);
$tab_newsletter->add_field('ef_newsletter_text', $newsletter_text);
$tab_newsletter->add_field('ef_newsletter_button_text', $newsletter_button_text);
$tab_newsletter->add_field('ef_newsletter_url', $newsletter_url);

/*
 * Add All Main Tabs
 */
$theme_options->add_tab(__('General Site Options', 'vertoh'), $tab_general_site_options);
$theme_options->add_tab(__('Homepage Options', 'vertoh'), $tab_homepage_options);
$theme_options->add_tab(__('Media Gallery', 'vertoh'), $tab_media_options);
$theme_options->add_tab(__('Blog Options', 'vertoh'), $tab_blog_options);
$theme_options->add_tab(__('Social Networks', 'vertoh'), $tab_social_connecting);
$theme_options->add_tab(__('Newsletter', 'vertoh'), $tab_newsletter);
$theme_options->add_tab(__('Misc', 'vertoh'), $tab_misc);
