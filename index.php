<?php
session_start();
    $act = isset($_GET['act']) ? $_GET['act'] : "home";
    switch ($act) {
        case 'home':
            require_once('./Controllers/HomeController.php');
            $objCate = new homeController();
            $objCate->show();
            break;
    }
?>