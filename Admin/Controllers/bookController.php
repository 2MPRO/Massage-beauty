<?php 
    require_once("Models/BookModel.php");
    class bookController {
        var $book_model;
        public function __construct()
        {
            $this->book_model = new bookModel();
        }
        public function show(){
            $dataBook = $this->book_model->All();
            require_once("Views/indexviewAD.php");
          
        }
        function showAddBook(){
            $data = $this->book_model->getMaxidBill();
            $MaHD = $data[0]['MaHD'] + 1;
            $dataBillDetail =  $this->book_model->ChitietHoaDon($MaHD);
            $data_dm = $this->book_model->danhmuc();
            $data_service = $this->book_model->service();
            $data_User = $this->book_model->getUser();
            require_once("Views/indexviewAD.php");
        }
        function AddBookAction(){
            if(isset($_POST['MaND'])){
                $MaND = $_POST['MaND'];
                $MaHD = $_POST['MaHD'];
                $Tien = $_POST['TongTien'];
                $time = $_POST['timepicker'];
                $date = $_POST['datepicker'];
                $Tien = intval(preg_replace('/[^\d.]/', '', $Tien));
                $User = $this->book_model->getUserByID($MaND);
                $NguoiDung = $User[0]['Ho']." ".$User[0]['Ten'];
                $SDT = $User[0]['SDT'];
                $DiaChi =  $User[0]['DiaChi'];
               
                $data_Bill =  array(
                    'MaHD' => $MaHD,
                    'MaND' => $MaND,
                    'SDT' => $SDT,
                    'DiaChi' => $DiaChi,
                    'NguoiDung' => $NguoiDung,
                    'TrangThai' =>'3',
                    'tongTien' => $Tien,
                    'Gio' => $time,
                    'NgayHen' => $date
                    );

                $this->book_model->store($data_Bill);
                
            }
        }
        function showEditBook()
        {
            $id = isset($_GET['idBill']) ? $_GET['idBill'] : 1;
            $dataBillDetail = $this->book_model->detail($id);
            $databillselt = $this->book_model->billSelt($id);
            $data_User  = $this->book_model->getUser($id);
            $data_dm = $this->book_model->danhmuc();
            $data_service = $this->book_model->service();
            require_once("Views/indexviewAD.php");
        }
        function showsaveEdit(){
            if(isset($_POST['MaND'])){
                $MaND = $_POST['MaND'];
                $MaHD = $_POST['MaHD'];
                $Tien = $_POST['TongTien'];
                $time = $_POST['timepicker'];
                $date = $_POST['datepicker'];
                $Tien = intval(preg_replace('/[^\d.]/', '', $Tien));
                $User = $this->book_model->getUserByID($MaND);
                $NguoiDung = $User[0]['Ho']." ".$User[0]['Ten'];
                $SDT = $User[0]['SDT'];
                $DiaChi =  $User[0]['DiaChi'];
               
                $data_Bill =  array(
                    'MaHD' => $MaHD,
                    'MaND' => $MaND,
                    'SDT' => $SDT,
                    'DiaChi' => $DiaChi,
                    'NguoiDung' => $NguoiDung,
                    'TrangThai' =>'3',
                    'tongTien' => $Tien,
                    'Gio' => $time,
                    'NgayHen' => $date
                    );

                $this->book_model->update($data_Bill);
                
            }
        }
  
        
    }
?>