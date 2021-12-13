<?php
session_start();
    $act = isset($_GET['act']) ? $_GET['act'] : "home";
    switch ($act) {
        case 'home':
            require_once('./Controllers/HomeController.php');
            $objCate = new homeController();
            $objCate->show();
            break;
        case 'contact':
            require_once('./Controllers/contactController.php');
            $objCate = new ContactController();
            $objCate->show();
            break;
        case 'login' :
            require_once('./Controllers/LoginController.php');
            $objCate = new LoginController();
            $objCate->show();
            break;
        case 'booking':
            require_once('./Controllers/bookingController.php');
            $objCate = new BookingController();
            $objCate->show();
            break;
        default : 
        require_once('./Controllers/HomeController.php');
            $objCate = new homeController();
            $objCate->show();
    }
?>