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

          case 'product':
            require_once('Controllers/ProductController.php');
            $controller_obj = new ProductController();
            switch ($act) {
                case 'list':
                    $controller_obj->list();
                    break;
               case 'add':
                    $controller_obj->add();
                    break;
               case 'store':
                    $controller_obj->store();
                    break;
                 case 'delete':
                    $controller_obj->delete();
                    break;
                case 'edit':
                    $controller_obj->callUpdate();
                    break;
                case 'update':
                    $controller_obj->update(); 
                    break;
                default:
                    $controller_obj->list();
                    break;
            }
            break;

    }
?>