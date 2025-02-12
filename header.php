<?php

/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage BS_CheckInn
 * @since BS CheckInn 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    get_template_part('partials/header/header-menu');
    wp_body_open();

    if (is_front_page()):
        echo do_shortcode('[bsgallery id=1]');
    else:
        get_template_part('partials/header/page-title');
    endif; ?>

    <div id="page" class="hfeed site">

        <div id="main" class="site-main">