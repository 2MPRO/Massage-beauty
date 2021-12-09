<?php
session_start();
    $mod = isset($_GET['act']) ? $_GET['act'] : "home";
    switch ($mod) {
        case 'home':
            require_once('./Controllers/HomeController.php');
            $objCate = new homeController();
            $objCate->show();
            break;
    }
?>