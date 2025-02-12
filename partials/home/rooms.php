<?php $rooms = get_posts(['post_type' => 'rooms']);
if (!empty($rooms)) {
?>
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    <?php foreach ($rooms as $room) {
                        $roomMeta = get_post_meta($room->ID, 'room_meta', true);
                        $roomMeta = json_decode($roomMeta, true);
                        $roomImg = get_the_post_thumbnail_url($room->ID, 'full');
                        $roomServices = getArrayValue($roomMeta, 'services');
                    ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="hp-room-item set-bg lazyload" data-setbg="<?php echo $roomImg ?>" style="background-image: url('<?php echo $roomImg ?>');">
                                <div class="hr-text">
                                    <h3><?php echo get_the_title($room->ID) ?></h3>
                                    <h2>
                                        <td><?php echo getArrayValue($roomMeta, 'price'); ?></td><span>/Pernight</span>
                                    </h2>
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
                                                <td><?php echo (strlen($roomServices) > 35 ? substr($roomServices, 0, 35) . '...' : $roomServices); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="<?php echo get_permalink($room->ID) ?>" title="<?php echo get_the_title($room->ID); ?>" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>