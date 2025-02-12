<?php

/**
 * Template Name: Home Template
 *
 * This is the template is for the home page.
 *
 * @package WordPress
 * @subpackage BS_CheckInn
 * @since BS CheckInn 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<?php
		// Start the loop.
		while (have_posts()) :
			the_post();
		?>
			<section class="aboutus-section spad">
				<div class="container">
					<div class="row">
						<article id="post-<?php the_ID(); ?>">
							<div class="w-100">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post -->
					</div>
				</div>
			</section>

			<?php get_template_part('partials/home/services'); ?>
			<?php get_template_part('partials/home/rooms'); ?>
		<?php endwhile; ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>