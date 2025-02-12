<?php

/* Include the autoloader so we can dynamically include the rest of the classes. */
require_once trailingslashit(dirname(__FILE__)) . 'inc/autoloader.php';
require_once trailingslashit(dirname(__FILE__)) . 'helper/helper-functions.php';

add_action('init', 'bsThemeInit');

if (!defined('bs_theme_uri')) {
    define('bs_theme_uri', (plugin_dir_url(__FILE__)));
}

if (!defined('bs_theme_view')) {
    define('bs_theme_view', trailingslashit(dirname(__FILE__)) . "view/");
}

if (!defined('bs_theme_assets')) {
    define('bs_theme_assets', (get_stylesheet_directory_uri()) . "/inc/bs-theme/assets/");
}

if (!defined('bs_theme_plugin_version')) {
    define('bs_theme_plugin_version', '1.0.0');
}

/**
 * Starts the plugin by initializing the meta box, its display, and then
 * sets the plugin in motion.
 */
function bsThemeInit()
{
    return new \BsTheme\Controller\Core();
}
