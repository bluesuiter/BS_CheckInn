<?php

namespace BsTheme\Controller;

use BsTheme\Controller\Admin\ThemeOptions;


class Core
{

    public $themeOptions;
    public $booking;

    public function __construct()
    {
        $this->themeOptions = new ThemeOptions();
        $this->booking = new Booking();

        $this->addActions();
    }

    public function adminMenuPage()
    {
        $this->themeOptions->addAdminMenu();
    }

    /**
     * Add necessary actions to WordPress admin menu and hooks.
     */
    public function addActions()
    {
        // Add admin menu page
        add_action('admin_menu', [$this, 'adminMenuPage']);

        // Register ajax action to save theme options
        add_action('wp_ajax_bsg_save_theme_options', [$this->themeOptions, 'saveThemeOptions']);
        add_action('wp_ajax_nopriv_bsg_save_theme_options', [$this->themeOptions, 'saveThemeOptions']);

        // Add shortcode for theme options
        add_shortcode('theme_option', [$this->themeOptions, 'handleShortcode']);

        // Add customized styles/scripts
        add_action('wp_enqueue_scripts', [$this, 'addCustomCssScript']);

        // Register ajax action to save theme options
        add_action('wp_ajax_bsg_save_booking', [$this->booking, 'store']);
        add_action('wp_ajax_nopriv_bsg_save_booking', [$this->booking, 'store']);
    }

    /**
     * Add inline css/script options
     */
    function addCustomCssScript()
    {
        // Register and enqueue custom CSS
        wp_register_style('bst-template-css', false);
        wp_enqueue_style('bst-template-css');
        wp_add_inline_style('bst-template-css', get_option('inline_css'));

        // Register and enqueue custom JavaScript
        wp_register_script('bst-template-script', '', array("jquery"), '', true);
        wp_enqueue_script('bst-template-script');
        wp_add_inline_script('bst-template-script', get_option('inline_script'), array('jquery'), 100, true);
    }
}
