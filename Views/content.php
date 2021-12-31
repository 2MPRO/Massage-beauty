<?php
     $act  = isset($_GET['act']) ? $_GET['act'] :"home";
     switch ($act){
        case "home":
            require_once("home.php");
            break;
        case "contact":
            require_once("contact.php");
            break;
        case "booking":
            require_once("booking.php");
            break;
        case "login":
            require_once("login.php");
            break;
        case "register":
            require_once("register.php");
            break;
        case "service":
            require_once("service.php");
            break;
        default : require_once("home.php");
     }
?>