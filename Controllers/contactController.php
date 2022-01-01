<?php 
require_once("./Models/ServiceModel.php");
    class contactController {
        var $contact_model;
        public function __construct()
        {
             $this->contact_model = new serviceModel();
        }
        function show(){
            $dataCate = $this->contact_model->danhmuc();
            require_once('./Views/indexview.php');  
        }
    }
?>