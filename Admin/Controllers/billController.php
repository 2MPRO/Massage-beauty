<?php 
    require_once("Models/billModel.php");
    class billController {
        var $bill_model;
        public function __construct()
        {
            $this->bill_model = new billModel();
        }
        public function show(){
            $dataBill = $this->bill_model->All();
            require_once("Views/indexviewAD.php");
          
        }
        function detail()
        {
            $id = isset($_GET['idBill']) ? $_GET['idBill'] : 1;
            $dataBillDetail = $this->bill_model->detail($id);
            $databillselt = $this->bill_model->billSelt($id);
            $data_User  = $this->bill_model->getUser($id);
            require_once("Views/indexviewAD.php");
        }
        function confirm()
        {
            $data = array(
                'MaHD' => $_GET['MaHD'],
                'TrangThai' => 1,
            );
            $this->bill_model->update($data);
            require_once("Views/indexviewAD.php");
        }

       /*  function showAddBillInsert(){
            $data = $this->bill_model->insertBill();
           
        } */
        function showAddBill(){
            $data = $this->bill_model->getMaxidBill();
            $MaHD = $data[0]['MaHD'] + 1;
            $dataBillDetail =  $this->bill_model->ChitietHoaDon($MaHD);
            $data_dm = $this->bill_model->danhmuc();
            $data_service = $this->bill_model->service();
            $data_User = $this->bill_model->getUser();
            require_once("Views/indexviewAD.php");
        }
        function showEditBill()
        {
            $id = isset($_GET['idBill']) ? $_GET['idBill'] : 1;
            $dataBillDetail = $this->bill_model->detail($id);
            $databillselt = $this->bill_model->billSelt($id);
            $data_User  = $this->bill_model->getUser($id);
            $data_dm = $this->bill_model->danhmuc();
            $data_service = $this->bill_model->service();
            require_once("Views/indexviewAD.php");
        }

        function showAddDetail()
        {
           // $data_lsp = $this->bill_model-> service_category();
            $data_dm = $this->bill_model->danhmuc();
            $data_service = $this->bill_model->service();
            require_once("Views/indexviewAD.php");
        }

        function AddBillAction(){
            if(isset($_POST['MaND'])){
                $MaND = $_POST['MaND'];
                $MaHD = $_POST['MaHD'];
                $Tien = $_POST['TongTien'];
                $Tien = intval(preg_replace('/[^\d.]/', '', $Tien));
                $User = $this->bill_model->getUserByID($MaND);
                $NguoiDung = $User[0]['Ho']." ".$User[0]['Ten'];
                $SDT = $User[0]['SDT'];
                $DiaChi =  $User[0]['DiaChi'];
               
                $data_Bill =  array(
                    'MaHD' => $MaHD,
                    'MaND' => $MaND,
                    'SDT' => $SDT,
                    'DiaChi' => $DiaChi,
                    'NguoiDung' => $NguoiDung,
                    'TrangThai' =>'0',
                    'tongTien' => $Tien
                    );

                $this->bill_model->store($data_Bill);
                
            }
        }
       
    }
?>