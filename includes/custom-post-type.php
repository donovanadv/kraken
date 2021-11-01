<?php

/**
 * Register Custom Post Types and Taxonomies
 */
function kraken_post_types() {
    register_post_type('event', array(
        'labels' => array(
            'name' => 'Events',
            'singular_name' => 'Event',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'new_item' => 'New Event',
            'view_item' => 'View Event',
            'search_items' => 'Search Events',
            'not_found' => 'No events found',
            'not_found_in_trash' => 'No events found in trash',
            'all_items' => 'All Events',
            'archives' => 'Event Archives',
            'insert_into_item' => 'Insert into event',
            'uploaded_to_this_item' => 'Uploaded to this event'
        ),
        'public'              => true,
        // 'hierarchical'	 => true,
        // 'rewrite'		 => array('with_front' => false),
        // 'has_archive'	 => false,
        // 'supports'		 => array('title', 'editor','thumbnail')
        // 'show_in_rest'	 => true
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'query_var'           => true,
        'capability_type'     => 'post',
        'show_ui' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title' )
    ));
}
// add_action('init', 'kraken_post_types');
