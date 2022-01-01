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
        function bookingaction(){
            $MaND = $_POST['MaND'];
            $datepicker = $_POST['datepicker'];
            $timepicker = $_POST['timepicker'];
            $NguoiDung = $_POST['NguoiDung'];
            $DiaChi = $_POST['DiaChi'];
            $SDT = $_POST['SDT'];
            $data = array(
                "NgayHen" => $datepicker,
                "Gio" =>  $timepicker,
                "MaND" => $MaND ,
                "NguoiDung" => $NguoiDung,
                "TrangThai" =>"3",
                "DiaChi" =>$DiaChi,
                "SDT" =>$SDT
            );

            $this->book_model->store($data);
            require_once('./Views/indexview.php');  
        }
    }
?>