<?php
session_start();
    $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
    $act = isset($_GET['act']) ? $_GET['act'] : "admin";
    switch ($mod) {
        case 'login':
            require_once('Controllers/LoginController.php');
            $controller_obj = new LoginController();
            $controller_obj->admin();
            break;
    }
?>