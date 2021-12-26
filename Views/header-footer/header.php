<header>
    <div class="head-logo">
        <a  href="">
            <img class ="head-logo__img" src="Public/imgs/img_web/logo.png" alt="">
        </a>
    </div>
    <nav class ="head-nav">
        <a class = "head-nav__item" href="?act=home">TRANG CHỦ</a>
        <a  class = "head-nav__item" href="?act=booking">ĐẶT LỊCH</a>
        <a  class = "head-nav__item" href="">DỊCH VỤ</a>
        <a  class = "head-nav__item" href="?act=contact">LIÊN HỆ</a>

        <?php if(isset($_SESSION['login'])) 
        {?>
            <ul class = "head-nav__item" href="#">
                <i class="far fa-user-circle"></i> 
                <?php echo $_SESSION['login']['Ten']; ?>
                <ul class ="sub-nav"> 
                    <li class="sub-nav-item"><a class="sub-nav-item-link" href="">Tài khoản</a></li>
                    <li class="sub-nav-item"><a class="sub-nav-item-link"  href="">Trang quản lý</a></li>
                    <li class="sub-nav-item"><a class="sub-nav-item-link"  href="?act=logout">Đăng xuất</a></li> 
                </ul>
           </ul>
     <?php } else{?>
        <a  class = "head-nav__item" href="?act=login"><i class="far fa-user-circle"></i> ĐĂNG NHẬP</a>
        <?php }?>
    </nav>
</header>