<?php 
require_once("./Models/bookingModel.php");
    class BookingController {

        var $book_model;
        public function __construct()
        {
             $this->book_model = new bookingModel();
        }
        function show(){
            $dataCate = $this->book_model->danhmuc();
            require_once('./Views/indexview.php');  
        }
    }
?>