<?php 
    require_once("Models/detailBillModel.php");
    class detailBillController {
        var $bill_model;
        public function __construct()
        {
            $this->bill_model = new detailBillModel();
        }
        public function show(){
            $dataBill = $this->bill_model->All();
            require_once("Views/indexviewAD.php");
          
        }
            
   
  
        function InsertdetailBill(){

            if(isset($_POST['MaHD'])){
                $data_detailBill =  array(
                'MaHD' => $_POST['MaHD'],
                'MaSP' => $_POST['MaSP'],
                'soLan' => $_POST['SoLuong'],
                'tongTien' => $_POST['DonGia'] * $_POST['SoLuong']
                );
            }
            $this->bill_model->store($data_detailBill);
        }
    }
?>