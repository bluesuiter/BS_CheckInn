<?php

/*Custom Post type start*/

function createPostType(array $supports, $plural, $singular)
{
    $labels = array(
        'name' => _x($plural, 'plural'),
        'singular_name' => _x($singular, 'singular'),
        'menu_name' => _x($plural, 'admin menu'),
        'name_admin_bar' => _x($plural, 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New ' . $singular),
        'new_item' => __('New ' . $singular),
        'edit_item' => __('Edit ' . $singular),
        'view_item' => __('View ' . $singular),
        'all_items' => __('All ' . $singular),
        'search_items' => __('Search '),
        'not_found' => __('No ' . $plural . ' found.'),
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => strtolower($plural)),
        'has_archive' => true,
        'hierarchical' => false,
    );

    register_post_type($plural, $args);
}


function customPostType()
{
    $roomSupports = array(
        'title', // post title
        'editor', // post content
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'comments', // comments
    );

    createPostType($roomSupports, 'Rooms', 'Room');
    require(__DIR__ . '/meta-fields/rooms/index.php');
}

add_action('init', 'customPostType');
/*Custom Post type end*/