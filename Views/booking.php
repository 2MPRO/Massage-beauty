<div class="booking">
    <form class= "booking-form" method="POST" action="?act=bookingaction">
        <h1 class="book-home-title">ĐĂNG KÝ LỊCH HẸN</h1>
        <fieldset class = "booking-field">
            <input type="hidden" name="MaND" value="<?= $_SESSION['login']['MaND']?>">
            <input class="booking-item-input" type="text"  name="NguoiDung" id="" placeholder="" value="<?= $_SESSION['login']['Ho'] ." ".$_SESSION['login']['Ten']?>">
        </fieldset>
        <fieldset class = "booking-field">
            <input class="booking-item-input" type="tel"  name="SDT" id="" placeholder="Số Điện Thoại" value="<?= $_SESSION['login']['SDT'] ?>">
        </fieldset>
        <fieldset class = "booking-field">
            <input class="booking-item-input" type="email"  name="" id="" placeholder="Email" value="<?= $_SESSION['login']['Email'] ?>">
        </fieldset>
        <fieldset class = "booking-field">
            <input class="booking-item-input" type="tel"  name="DiaChi" id="" placeholder="Địa chỉ" value="<?= $_SESSION['login']['DiaChi'] ?>">
        </fieldset>
        <fieldset class = "booking-field">
            <input type="hidden" id="date-picker-hidden" name="datepicker"  >
            <input class ="booking-item-input" type="date" placeholder="Chọn ngày"   id="date-picker" required>  
        </fieldset>

        <fieldset class = "booking-field">
            <input type="hidden"   id="time-picker-hidden" name="timepicker">
            <input  class ="booking-item-input" type="time" placeholder="Chọn khung giờ"  id="time-picker" value="" timeformat = "24h" required>
        </fieldset>
        <fieldset class="book_button">
            <input class="book_btn-input"  type="submit" value="Đặt lịch">
        </fieldset>
    </form>
</div>