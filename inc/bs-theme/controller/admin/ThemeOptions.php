<?php

namespace BsTheme\Controller\Admin;

class ThemeOptions
{
    public function addAdminMenu()
    {
        add_menu_page(
            __('Theme Options', 'textdomain'),
            'Theme Options',
            'manage_options',
            'theme_options',
            [$this, 'index'],
            'dashicons-admin-settings',
            6
        );
    }

    /**
     * return theme options in tab format
     */
    public function index()
    {
        wp_enqueue_style('jquery-ui-tabs', bs_theme_assets . 'css/jquery-ui.min.css', array(), time(), 'all');
        wp_enqueue_script('jquery-ui', bs_theme_assets . 'js/jquery-ui.min.js', array('jquery'), '1.14.1', true);

        $options = [
            'contact_info' => [
                'support_email' => ['type' => 'email', 'label' => 'Support E-Mail'],
                'feedback_email' => ['type' => 'email', 'label' => 'Feedback E-Mail'],
                'booking_email' => ['type' => 'email', 'label' => 'Booking E-Mail'],
                'contact_phone' => ['type' => 'tel', 'label' => 'Contact phone'],
                'address1' => ['type' => 'text', 'label' => 'Address 1'],
                'address2' => ['type' => 'text', 'label' => 'Address 2'],
                'state' => ['type' => 'text', 'label' => 'State'],
                'pincode' => ['type' => 'text', 'label' => 'Pincode', 'pattern' => '^[1-9][0-9]{6}$'],
            ],

            'social_media' => [
                'facebook' => ['type' => 'url', 'label' => 'Facebook'],
                'x' => ['type' => 'url', 'label' => 'X'],
                'instagram' => ['type' => 'url', 'label' => 'Instagram'],
                'youtube' => ['type' => 'url', 'label' => 'YouTube'],
                'snapchat' => ['type' => 'url', 'label' => 'SnapChat'],
            ],

            'footer' => [
                'site_info' => ['type' => 'textarea', 'label' => 'Site Info (Footer)', 'attr' => ['rows="3"']],
            ],

            'additional_css' => [
                'inline_css' => ['type' => 'textarea', 'label' => '', 'attr' => ['id="inline_css"', 'rows="15"']],
            ],

            'additional_script' => [
                'inline_script' => ['type' => 'textarea', 'label' => '', 'attr' => ['id="inline_script"', 'rows="15"']],
            ]
        ];

        return bsLoadView('admin/theme-options', compact('options'));
    }

    /**
     * Save theme options AJAX handler
     */
    public function saveThemeOptions()
    {
        $data = $_POST['data'] ?? [];
        parse_str($data, $options);

        foreach ($options as $key => $value) {
            if (!empty($value) && $value !== 'null') {
                update_option($key, $value);
            } else {
                delete_option($key);
            }
        }

        echo 'success';
        wp_die(); // this is required to terminate immediately and return a proper response
    }

    /**
     * Shortcode Handler
     * @param array $atts Shortcode attributes
     */
    public function handleShortcode(array $att)
    {
        if (!empty($att['name'])) {
            return get_option($att['name'], true);
        }
    }
}
