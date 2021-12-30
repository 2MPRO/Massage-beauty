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
        case 'bill':
            require_once('Controllers/billController.php');
            $controller_obj = new billController();
            switch($act){
                case 'bill':    
                    $controller_obj->show();
                    break;
                case 'addBill':    
               
                    $controller_obj->showAddBill();
                    break; 
                case 'detail':
                    $controller_obj->detail();
                    break;
                case 'confirm':
                   $controller_obj->confirm();
                    break;
                case 'addDetail':
                   
                    $controller_obj->showAddDetail();
                    break;
                case 'addDetailAction':
                    require_once('Controllers/detailBillController.php');
                    $controller_obj = new detailBillController();
                    $controller_obj->InsertdetailBill();
                    break;
                default : 
                $controller_obj->show();
                    break;
            }
          break;     
    }
?>