<?php 
require_once("./Models/serviceModel.php");
    class serviceController {
        var $service_model;
        public function __construct()
        {
             $this->service_model = new serviceModel();
        }

        function show(){
            if(isset($_GET['cate'])){
                $idcate = $_GET['cate'];
                $dataService = $this->service_model->service_category(1,40,$idcate);
                require_once('./Views/indexview.php');  
            }
            
        }
    }
?>