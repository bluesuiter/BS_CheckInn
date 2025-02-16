<div class="room_box">
    <style scoped>
        .room_box {
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }

        .room_field {
            display: contents;
        }
    </style>
    <p class="meta-options room_field">
        <label for="room_size">Size</label>
        <input id="room_size" type="text" value="<?php echo getArrayValue($meta_data, 'size') ?>" name="room[size]">
    </p>
    <p class="meta-options room_field">
        <label for="room_bed">Bed</label>
        <input id="room_bed" type="text" value="<?php echo getArrayValue($meta_data, 'bed') ?>" name="room[bed]">
    </p>
    <p class="meta-options room_field">
        <label for="room_capacity">Capacity</label>
        <input id="room_capacity" type="text" value="<?php echo getArrayValue($meta_data, 'capacity') ?>" name="room[capacity]">
    </p>
    <p class="meta-options room_field">
        <label for="room_price">Price (per-night)</label>
        <input id="room_price" type="text" placeholder="234" value="<?php echo getArrayValue($meta_data, 'price') ?>" name="room[price]">
    </p>
    <p class="meta-options room_field">
        <label for="room_services">Services</label>
        <input id="room_services" type="text" placeholder="Wifi, Television, Bathroom" value="<?php echo getArrayValue($meta_data, 'services') ?>" name="room[services]">
    </p>
</div>