<?php

register_post_type('exhibitor', array(
    'labels' => array(
        'name' => __('Exhibitors', 'vertoh'),
        'singular_name' => __('Exhibitor', 'vertoh'),
        'add_new' => __('Add New', 'vertoh'),
        'add_new_item' => __('Add New Exhibitor', 'vertoh'),
        'edit_item' => __('Edit Exhibitor', 'vertoh'),
        'new_item' => __('New Exhibitor', 'vertoh'),
        'all_items' => __('All Exhibitors', 'vertoh'),
        'view_item' => __('View Exhibitor', 'vertoh'),
        'search_items' => __('Search Exhibitors', 'vertoh'),
        'not_found' => __('No Exhibitors found', 'vertoh'),
        'not_found_in_trash' => __('No Exhibitors found in trash', 'vertoh'),
        'menu_name' => __('Exhibitors', 'vertoh')
    ),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array(
        'slug' => 'exhibitors'
    ),
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'page-attributes'
    )
));

/**
 * Message Filter
 *
 * Add filter to ensure the text Review, or review, 
 * is displayed when a user updates a custom post type.
 */

function vertoh_exhibitor_updated_messages($messages) {

    global $post, $post_ID;

    $messages['exhibitor'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => sprintf(__('Exhibitor updated. <a href="%s">View Exhibitor</a>', 'vertoh'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.', 'vertoh'),
        3 => __('Custom field deleted.', 'vertoh'),
        4 => __('Exhibitor updated.', 'vertoh'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('Exhibitor restored to revision from %s', 'vertoh'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Exhibitor published. <a href="%s">View Exhibitor</a>', 'vertoh'), esc_url(get_permalink($post_ID))),
        7 => __('Exhibitor saved.', 'vertoh'),
        8 => sprintf(__('Exhibitor submitted. <a target="_blank" href="%s">Preview Exhibitor</a>', 'vertoh'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Exhibitor scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Exhibitor</a>', 'vertoh'),
                // translators: Publish box date format, see http://php.net/date
                date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Exhibitor draft updated. <a target="_blank" href="%s">Preview Exhibitor</a>', 'vertoh'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );

    return $messages;
}

add_filter('post_updated_messages', 'vertoh_exhibitor_updated_messages');
