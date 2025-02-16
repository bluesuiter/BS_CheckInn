<?php
require_once(__DIR__ . '/inc/bs-theme/bootstrap.php');

function my_theme_enqueue_styles()
{
    wp_dequeue_script('twentythirteen-style');
    wp_deregister_script('twentythirteen-style');

    $styleToAdd = [
        'bootstrap.min' => ['file' => 'bootstrap.min.css', 'version' => 'v4.4.1'],
        'font-awesome' => ['file' => 'font-awesome.min.css', 'version' => 'v4.7.0'],
        'elegant-icons' => ['file' => 'elegant-icons.css', 'version' => ''],
        'flaticon' => ['file' => 'flaticon.css', 'version' => ''],
        'owl.carousel' => ['file' => 'owl.carousel.min.css', 'version' => 'v2.3.4'],
        'nice-select' => ['file' => 'nice-select.css', 'version' => ''],
        'jquery-ui.min' => ['file' => 'jquery-ui.min.css', 'version' => 'v1.14.1'],
        'magnific-popup' => ['file' => 'magnific-popup.css', 'version' => ''],
        'slicknav.min' => ['file' => 'slicknav.min.css', 'version' => 'v1.0.10'],
    ];

    foreach ($styleToAdd as $key => $row) {
        wp_enqueue_style(
            $key,
            get_stylesheet_directory_uri() . '/assets/css/' . $row['file'],
            array(),
            $row['version'] ?? wp_get_theme()->get('Version')
        );
    }

    /* child theme style */
    wp_enqueue_style(
        'btg-theme',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );

    $scriptsToAdd = [
        'bootstrap.min' => ['file' => 'bootstrap.min.js', 'version' => 'v4.4.1'],
        'magnific-popup' => ['file' => 'jquery.magnific-popup.min.js', 'version' => 'v4.7.0'],
        'nice-select' => ['file' => 'jquery.nice-select.min.js', 'version' => ''],
        'jquery-ui.min' => ['file' => 'jquery-ui.min.js', 'version' => 'v1.14.1'],
        'jquery.slicknav' => ['file' => 'jquery.slicknav.js', 'version' => 'v1.0.10'],
        'owl.carousel' => ['file' => 'owl.carousel.min.js', 'version' => 'v2.3.4'],
        'main' => ['file' => 'main.js', 'version' => ''],
    ];

    foreach ($scriptsToAdd as $key => $row) {
        wp_enqueue_script($key, get_stylesheet_directory_uri() . '/assets/js/' . $row['file'], array('jquery'), $row['version'], true);
    }
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

/**
 * add_BS_CheckInn_support
 */
function add_BS_CheckInn_support()
{
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('footer_menu', __('Footer Menu', 'BS_CheckInn'));
}

add_action('after_setup_theme', 'add_BS_CheckInn_support');

/**
 * add_BS_CheckInn_widgets
 */
function tg_widgets_init()
{
    register_sidebar(
        array(
            'name'          => __('Footer', 'triptaganga'),
            'id'            => 'footer-1',
            'description'   => __('Appears in the footer section of the site.', 'triptaganga'),
            'before_widget' => '<div class="col ft-newslatter"><aside id="%1$s" class="col %2$s">',
            'after_widget'  => '</aside></div>',
            'before_title'  => '<h6 class="widget-title">',
            'after_title'   => '</h6>',
            'before_sidebar' => '',
            'after_sidebar'  => '',
        )
    );
}
add_action('widgets_init', 'tg_widgets_init');

/**
 * get theme logo
 */
function getThemeLogoUrl()
{
    $custom_logo_id = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
    return $image[0];
}
add_shortcode('theme_logo', 'getThemeLogoUrl');
