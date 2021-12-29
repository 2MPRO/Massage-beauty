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
        function showAddDetail()
        {
           // $data_lsp = $this->bill_model-> service_category();
            $data_dm = $this->bill_model->danhmuc();
            $data_service = $this->bill_model->service();
            require_once("Views/indexviewAD.php");
        }
       
    }
?>