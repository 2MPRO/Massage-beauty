<header>
    <div class="head-logo">
        <a  href="">
            <img class ="head-logo__img" src="Public/imgs/img_web/logo.png" alt="">
        </a>
    </div>
    <nav class ="head-nav">
        <a class = "head-nav__item" href="?act=home">TRANG CHỦ</a>
        <a  class = "head-nav__item" href="">ĐẶT LỊCH</a>
        <a  class = "head-nav__item" href="">DỊCH VỤ</a>
        <a  class = "head-nav__item" href="?act=contact">LIÊN HỆ</a>

        <?php if(isset($_SESSION['login'])) 
        { ?>
            <a  class = "head-nav__item" href="?act=login"><?=  $_SESSION['login']['Ten'] ?></a>
     <?php } else{  ?>
        <a  class = "head-nav__item" href="?act=login">ĐĂNG NHẬP</a>
        <?php }?>
    </nav>
</header>