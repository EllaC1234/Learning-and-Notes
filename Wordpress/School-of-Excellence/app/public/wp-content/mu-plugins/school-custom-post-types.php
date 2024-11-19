<?php

function school_custom_post_types(){
    $teacherArgs = array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
                    'name' => 'Teacher',
                    'singular_name' => 'Teacher',
                    'add_new_item' => 'Add New Teacher',
                    'edit_item' => 'Edit Teacher',
                    'view_item' => 'View Teacher',
                    'all_items' => 'All Teachers'
                ),
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => array('title', 'editor', 'thumbnail')
    );

    $courseArgs = array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
                    'name' => 'Courses',
                    'singular_name' => 'Course',
                    'add_new_item' => 'Add New Course',
                    'edit_item' => 'Edit Course',
                    'view_item' => 'View Course',
                    'all_items'=> 'All Courses'
                ),
        'menu_icon' => 'dashicons-awards',
        'rewrite'=> array(
                    'slug' => 'courses' // Overwrites slug
                ),
        'has_archive' => true, // Enables an archive page
        'supports' => array('title', 'editor')
    );

    $eventArgs = array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
                    'name' => 'Events',
                    'singular_name' => 'Event',
                    'add_new_item' => 'Add New Event',
                    'edit_item' => 'Edit Event',
                    'view_item' => 'View Event',
                    'all_items' => 'All Events'
                ),
        'menu_icon' => 'dashicons-calendar-alt',
        'rewrite'=> array(
                     'slug'=> 'events'
                 ),
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'excerpt' )
    );

    $lectureArgs = array(
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => true,
        'labels' => array(
                'name' => 'Lectures',
                'singular_name' => 'Lecture',
                'add_new_item' => 'Add New Lecture',
                'edit_item' => 'Edit Lecture',
                'view_item' => 'View Lecture',
                'all_items' => 'All Lectures'
                ),
        'menu_icon' => 'dashicons-welcome-write-blog',
        'supports' => array( 'title', 'editor' ),
        'capability_type' => 'lecture',
        'map_meta_cap' => true
    );
    
    register_post_type('teacher', $teacherArgs);
    register_post_type('course', $courseArgs);
    register_post_type('event', $eventArgs);
    register_post_type('lecture', $lectureArgs);  
}

add_action('init', 'school_custom_post_types');