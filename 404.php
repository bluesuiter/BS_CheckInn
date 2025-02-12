<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage BS_CheckInn
 * @since BS CheckInn 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

        <header class="page-header">
            <h1 class="page-title text-danger font-weight-bold"><?php _e('Not Found', 'twentythirteen'); ?></h1>
        </header>

        <div class="page-wrapper">
            <div class="page-content text-center">
                <h2><?php _e('This is somewhat embarrassing, isn&rsquo;t it?', 'twentythirteen'); ?></h2>
                <p class="mb-3"><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen'); ?></p>

                <?php get_search_form(); ?>
                <a href="<?php echo site_url() ?>" class="btn btn-secondary text-light mt-3" title="<?php echo bloginfo('name') ?>">Home Page</a>
            </div><!-- .page-content -->
        </div><!-- .page-wrapper -->

    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>