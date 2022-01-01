<?php
    require_once("./Models/homeModel.php");
    class homeController {

        var $home_model;
        public function __construct()
        {
             $this->home_model = new homeModel();
        }
        function show(){
            $dataCate = $this->home_model->danhmuc();
           
            require_once('./Views/indexview.php');  
        }
    }
?>