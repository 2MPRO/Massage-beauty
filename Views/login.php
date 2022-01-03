<div class="login">
    <h1 class="login-head">WELCOM TO 2MPRO</h1>
    <form class= "login-form" method="POST" action="?act=login_action">
            <h1 class="home-title">ĐĂNG NHẬP</h1>
            <?php if(isset($_COOKIE['msg'])){?>
            <p><?= $_COOKIE['msg'] ?> </p> <?php }?>
            <fieldset class = "book-field">
                <input class="book-item-input" type="text" required  name="SDT" id="" placeholder="Số điện thoại" value="">
            </fieldset>
            <fieldset class = "book-field">
                <input class="book-item-input" type="password" required  name="MatKhau" id="" placeholder="Mật khẩu" value="">
            </fieldset>
            <fieldset class="login-option">
                <a href="?act=register">Đăng ký</a>
                <a href="">Quên mật khẩu</a>
            </fieldset>
            <fieldset>
                <input class="btn-input"  type="submit" value="ĐĂNG NHẬP">
            </fieldset>
    </form>
</div>