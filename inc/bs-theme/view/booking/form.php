<div class="booking-form">
    <h3>Booking Your Hotel</h3>
    <form action="#">
        <div class="check-date">
            <label for="date-in">Check In:</label>
            <input type="text" class="date-input hasDatepicker" id="date-in">
            <i class="icon_calendar"></i>
        </div>
        <div class="check-date">
            <label for="date-out">Check Out:</label>
            <input type="text" class="date-input hasDatepicker" id="date-out">
            <i class="icon_calendar"></i>
        </div>
        <div class="select-option">
            <label for="guest">Guests:</label>
            <select id="guest" style="display: none;">
                <option value="">2 Adults</option>
                <option value="">3 Adults</option>
            </select>
            <div class="nice-select" tabindex="0"><span class="current">2 Adults</span>
                <ul class="list">
                    <li data-value="" class="option selected">2 Adults</li>
                    <li data-value="" class="option">3 Adults</li>
                </ul>
            </div>
        </div>
        <div class="select-option">
            <label for="room">Room:</label>
            <select id="room" style="display: none;">
                <option value="">1 Room</option>
                <option value="">2 Room</option>
            </select>
            <div class="nice-select" tabindex="0"><span class="current">1 Room</span>
                <ul class="list">
                    <li data-value="" class="option selected">1 Room</li>
                    <li data-value="" class="option">2 Room</li>
                </ul>
            </div>
        </div>
        <button type="submit">Check Availability</button>
    </form>
</div>