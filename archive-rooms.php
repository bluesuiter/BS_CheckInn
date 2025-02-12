<?php

/**
 * The template for displaying Rooms Archive page
 *
 * @package WordPress
 * @subpackage BS_CheckInn
 * @since BS CheckInn 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content container" role="main">
        <div class="row">
            <?php
            if (have_posts()) :
                // Start the loop.
                while (have_posts()) :
                    the_post();
                    $roomId = $post->ID;
                    $roomMeta = get_post_meta($roomId, 'room_meta', true);
                    $roomMeta = json_decode($roomMeta, true);
                    $roomTitle = get_the_title($roomId);
                    $roomImg = get_the_post_thumbnail_url($roomId, 'full');
            ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img class="img-fluid" src="<?php echo $roomImg ?>" loading="lazy" alt="<?php echo $roomTitle ?>">
                            <div class="ri-text">
                                <h4><?php echo $roomTitle ?></h4>
                                <h3><?php echo getArrayValue($roomMeta, 'price'); ?><span>/Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td><?php echo getArrayValue($roomMeta, 'size'); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td><?php echo getArrayValue($roomMeta, 'capacity'); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td><?php echo getArrayValue($roomMeta, 'bed'); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td><?php echo getArrayValue($roomMeta, 'services'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="<?php echo get_permalink($roomId) ?>" title="<?php echo $roomTitle ?>" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>