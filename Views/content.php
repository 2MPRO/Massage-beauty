<?php
     $act  = isset($_GET['act']) ? $_GET['act'] :"home";
     switch ($act){
        case "home":
            require_once("home.php");
            break;
        case "contact":
            require_once("contact.php");
            break;
        default : require_once("home.php");
     }
?>