<div class="register">
    <h1 class="register-head">WELCOM TO 2MPRO</h1>
    <form class= "register-form" method="POST" action="?act=register_action">
            <h1 class="home-title">ĐĂNG KÝ</h1>
            <?php if(isset($_COOKIE['msg'])){?>
                <p><?= $_COOKIE['msg'] ?> </p>
             <?php }?>
            <fieldset class = "book-field">
                <input class="book-item-input" type="text" required  name="SDT" id="" placeholder="Số điện thoại" value="">
            </fieldset>
            <fieldset class = "book-field">
                <input class="book-item-input" type="text" required  name="MatKhau" id="" placeholder="Mật khẩu" value="">
            </fieldset>
            <fieldset>
                <input class="btn-input"  type="submit" value="ĐĂNG KÝ">
            </fieldset>
    </form>
</div>