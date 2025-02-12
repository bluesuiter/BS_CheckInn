<?php

if (!function_exists('bsLoadView')) {
    function bsLoadView($view, $fields = array())
    {
        if (!empty($fields)) {
            foreach ($fields as $key => $field) {
                $$key = $field;
            }
        }

        $view = bs_theme_view . $view . '.php';
        if (!file_exists($view)) {
            echo 'View not found!';
            return false;
        }
        require_once($view);
    }
}

if (!function_exists('verifyNonce')) {
    /**
     * verifyNonce
     */
    function verifyNonce($actionName, $actionField)
    {
        $message = 'Nothing to save.';
        $nonce = getArrayValue($_POST, $actionField);

        if (!wp_verify_nonce($nonce, $actionName) && !check_admin_referer($actionName, $actionField)) {
            return wp_send_json_error($message);
        }
    }
}


if (!function_exists('getArrayValue')) {
    /**
     * check if key exists in array and return value
     */
    function getArrayValue($arr, $key)
    {
        if (is_array($arr)) {
            if (isset($arr[$key]) && !empty($arr[$key])) {
                return $arr[$key];
            }
        } else if (is_object($arr)) {
            if (isset($arr->$key) && !empty($arr->$key)) {
                return $arr->$key;
            }
        }
        return false;
    }
}

if (!function_exists('renderField')) {
    /**
     * renderField
     * Displays different types of fields based on the provided type.
     * @param string $type Field type
     * @param string $label Field label
     * @param string $name Field name
     * @param string $value Field value
     * @param array $attributes Additional attributes for the field
     */
    function renderField($type, $label, $name, $value = '', $attributes = [])
    {
        $output = '<label for="' . $name . '">' . $label . '</label>';
        switch ($type) {
            case 'email':
                $output .= '<input type="email" name="' . $name . '" value="' . $value . '" ' . implode(' ', $attributes) . '>';
                break;
            case 'url':
                $output .= '<input type="url" name="' . $name . '" value="' . $value . '" ' . implode(' ', $attributes) . '>';
                break;
            case 'number':
                $output .= '<input type="number" name="' . $name . '" value="' . $value . '" ' . implode(' ', $attributes) . '>';
                break;
            case 'tel':
                $output .= '<input type="tel" name="' . $name . '" value="' . $value . '" ' . implode(' ', $attributes) . '>';
                break;
            case 'textarea':
                $output .= '<textarea name="' . $name . '" ' . implode(' ', $attributes) . '>' . $value . '</textarea>';
                break;
            default:
                $output .= '<input type="text" name="' . $name . '" value="' . $value . '" ' . implode(' ', $attributes) . '>';
                break;
        }

        echo $output;
    }
}

/**
 * enqueue codemirror
 */
add_action('admin_enqueue_scripts', function ($hook) {
    $cm_settings['codeEditor'] = array(
        'ce_css' => wp_enqueue_code_editor(array('type' => 'text/css')),
        'ce_script' => wp_enqueue_code_editor(array('type' => 'javascript'))
    );

    wp_localize_script('jquery', 'cm_settings', $cm_settings);

    wp_enqueue_script('wp-theme-plugin-editor');
    wp_enqueue_style('wp-codemirror');
});
