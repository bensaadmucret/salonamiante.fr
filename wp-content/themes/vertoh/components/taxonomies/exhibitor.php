<?php

register_taxonomy('exhibitor-category', 'exhibitor', array(
    'hierarchical' => true,
    'labels' => array(
        'name' => __('Exhibitor Category', 'vertoh'),
        'singular_name' => __('Exhibitor Category', 'vertoh'),
        'search_items' => __('Search Exhibitor Categories', 'vertoh'),
        'all_items' => __('All Exhibitor Categories', 'vertoh'),
        'parent_item' => __('Parent Exhibitor Category', 'vertoh'),
        'parent_item_colon' => __('Parent Exhibitor Category:', 'vertoh'),
        'edit_item' => __('Edit Exhibitor Category', 'vertoh'),
        'update_item' => __('Update Exhibitor Category', 'vertoh'),
        'add_new_item' => __('Add New Exhibitor Category', 'vertoh'),
        'new_item_name' => __('New Exhibitor Category', 'vertoh'),
        'menu_name' => __('Categories', 'vertoh')
    ),
    'query_var' => true,
    'rewrite' => true
));
new RW_Taxonomy_Meta(array(
    'id' => 'exhibitor-category-metas',
    'taxonomies' => array('exhibitor-category'),
    'title' => '',
    'fields' =>
    array(
        array(
            'name' => __('Color', 'vertoh'),
            'id' => 'exhibitor_category_color',
            'type' => 'color'
        )
    )
        ));
