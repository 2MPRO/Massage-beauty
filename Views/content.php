<?php
     $act  = isset($_GET['act']) ? $_GET['act'] :"home";
     switch ($act){
        case "home":
            require_once("home.php");
            break;
        default : require_once("home.php");
     }
?>