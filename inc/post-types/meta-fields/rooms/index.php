<?php

/**
 * Register meta boxes.
 */
function bst_register_meta_boxes()
{
    add_meta_box('rooms_meta_field', __('Rooms Info', 'bst'), 'bst_display_callback', ['rooms']);
}
add_action('add_meta_boxes', 'bst_register_meta_boxes');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function bst_display_callback($post)
{
    $meta_data = get_post_meta($post->ID, 'room_meta', true);
    $meta_data = json_decode($meta_data);
    require_once(__DIR__ . '/view.php');
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function bst_save_room_meta($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE || getArrayValue($_POST, 'post_type') !== 'rooms') return;
    if ($parent_id = wp_is_post_revision($post_id)) {
        $post_id = $parent_id;
    }

    $fields = [
        'size',
        'bed',
        'capacity',
        'price',
        'services',
    ];

    $meta_data = [];
    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST['room'])) {
            $meta_data[$field] = sanitize_text_field($_POST['room'][$field]);
        }
    }

    update_post_meta($post_id, 'room_meta', json_encode($meta_data));
}

add_action('save_post', 'bst_save_room_meta');
