<?php 
    require_once("Models/statisticalModel.php");
    class statisticalController {
        var $statistical_model;
        public function __construct()
        {
            $this->statistical_model = new statisticalModel();
        }
        public function show(){
           // $dataBook = $this->statistical->All();
            require_once("Views/indexviewAD.php");
        }
    }