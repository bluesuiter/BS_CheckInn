<?php

/**
 * Dynamically loads the class attempting to be instantiated elsewhere in the
 * plugin.
 *
 * @package BsTheme\Inc
 */
spl_autoload_register('bsThemeAutoload');

/**
 * Dynamically loads the class attempting to be instantiated elsewhere in the
 * plugin by looking at the $class_name parameter being passed as an argument.
 *
 * The argument should be in the form: TutsPlus_Namespace_Demo\Namespace. The
 * function will then break the fully-qualified class name into its pieces and
 * will then build a file to the path based on the namespace.
 *
 * The namespaces in this plugin map to the paths in the directory structure.
 *
 * @param string $class_name The fully-qualified name of the class to load.
 */
function bsThemeAutoload($class_name)
{
    if ($class_name === null) {
        return false;
    }

    // If the specified $class_name does not include our namespace, duck out.
    if (false === strpos($class_name, 'BsTheme')) {
        return;
    }

    // Split the class name into an array to read the namespace and class.
    $fileParts = explode('\\', $class_name);

    // Do a reverse loop through $fileParts to build the path to the file.
    $namespace = '';
    for ($i = count($fileParts) - 1; $i > 0; $i--) {

        // Read the current component of the file part.
        $current = $fileParts[$i];
        $current = str_ireplace('_', '-', $current);

        // If we're at the first entry, then we're at the filename.
        if (count($fileParts) - 1 === $i) {

            /* If 'interface' is contained in the parts of the file name, then
             * define the $file_name differently so that it's properly loaded.
             * Otherwise, just set the $file_name equal to that of the class
             * filename structure.
             */

            $file_name = "$current.php";

            if ($fileParts[count($fileParts) - 1] !== null) {
                if (strpos(strtolower($fileParts[count($fileParts) - 1]), 'interface')) {

                    // Grab the name of the interface from its qualified name.
                    $interface_name = explode('_', $fileParts[count($fileParts) - 1]);
                    $interface_name = $interface_name[0];
                    $file_name = "interface-$interface_name.php";
                }
            }
        } else {
            $namespace = '/' . strtolower($current) . strtolower($namespace);
        }
    }

    // Now build a path to the file using mapping to the file location.
    $filepath = trailingslashit(dirname(dirname(__FILE__)) . $namespace);
    $filepath .= $file_name;
    require($filepath);

    // If the file exists in the specified path, then include it.
    if (file_exists($filepath)) {
        include_once $filepath;
    } else {
        wp_die(
            esc_html("The file attempting to be loaded at $filepath does not exist.")
        );
    }
}
