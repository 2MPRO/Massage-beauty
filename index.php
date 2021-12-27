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
        case 'login_action' :
            require_once('./Controllers/LoginController.php');
            $objCate = new LoginController();
            $objCate->login_action();
            break;
        case 'logout' :
                require_once('./Controllers/LoginController.php');
                $objCate = new LoginController();
                $objCate->logout();
                break;
        case 'booking':
            require_once('./Controllers/bookingController.php');
            $objCate = new BookingController();
            $objCate->show();
            break;
        case 'service':
                require_once('./Controllers/serviceController.php');
                $objCate = new serviceController();
                $objCate->show();
                break;
        default : 
        require_once('./Controllers/HomeController.php');
            $objCate = new homeController();
            $objCate->show();
    }
?>