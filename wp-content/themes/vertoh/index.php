<?php

get_header();

// Loop to allow EE to print necessary markup, specifically used by ESPRESSO_TICKET_SELECTOR shortcode to show "Select Ticket Quantity" alert
if(function_exists('espresso_version')){
    if(have_posts()){
        while(have_posts()){
            the_post();
        }
    }
}

vertoh_include_home_header();

if (is_active_sidebar('homepage'))
    dynamic_sidebar('homepage');

get_footer();