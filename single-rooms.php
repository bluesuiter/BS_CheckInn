<?php

/**
 * The template for displaying Rooms Archive page
 *
 * @package WordPress
 * @subpackage BS_CheckInn
 * @since BS CheckInn 1.0
 */

get_header(); ?>


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

<?php
    endwhile;
endif;
?>



<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <img src="<?php echo $roomImg ?>" alt="<?php echo $roomTitle ?>">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3><?php echo $roomTitle ?></h3>
                            <div class="rdt-right">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <a href="#">Booking Now</a>
                            </div>
                        </div>
                        <h2><?php echo getArrayValue($roomMeta, 'price'); ?><span>/Pernight</span></h2>
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
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="rd-reviews">
                    <h4>Reviews</h4>
                    <div class="review-item">
                        <div class="ri-pic">
                            <img src="img/room/avatar/avatar-1.jpg" alt="">
                        </div>
                        <div class="ri-text">
                            <span>27 Aug 2019</span>
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5>Brandon Kelley</h5>
                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                magnam.</p>
                        </div>
                    </div>
                    <div class="review-item">
                        <div class="ri-pic">
                            <img src="img/room/avatar/avatar-2.jpg" alt="">
                        </div>
                        <div class="ri-text">
                            <span>27 Aug 2019</span>
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5>Brandon Kelley</h5>
                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                magnam.</p>
                        </div>
                    </div>
                </div>
                <div class="review-add">
                    <h4>Add Review</h4>
                    <form action="#" class="ra-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Name*">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Email*">
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <h5>You Rating:</h5>
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                </div>
                                <textarea placeholder="Your Review"></textarea>
                                <button type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Your Reservation</h3>
                    <form action="#">
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="text" class="date-input" id="date-in">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="text" class="date-input" id="date-out">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="guest">Guests:</label>
                            <select id="guest" style="display: none;">
                                <option value="">3 Adults</option>
                            </select>
                            <div class="nice-select" tabindex="0"><span class="current">3 Adults</span>
                                <ul class="list">
                                    <li data-value="" class="option selected">3 Adults</li>
                                </ul>
                            </div>
                        </div>
                        <div class="select-option">
                            <label for="room">Room:</label>
                            <select id="room" style="display: none;">
                                <option value="">1 Room</option>
                            </select>
                            <div class="nice-select" tabindex="0"><span class="current">1 Room</span>
                                <ul class="list">
                                    <li data-value="" class="option selected">1 Room</li>
                                </ul>
                            </div>
                        </div>
                        <button type="submit">Check Availability</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>