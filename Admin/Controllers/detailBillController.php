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
            $data_DonGia =  $this->bill_model->getServiceById($_POST['MaSP']);
            $donGia =  $data_DonGia[0]['DonGia'];
            if(isset($_POST['MaHD'])){
                $data_detailBill =  array(
                'MaHD' => $_POST['MaHD'],
                'MaSP' => $_POST['MaSP'],
                'soLan' => $_POST['SoLuong'],
                'tongTien' => $donGia * $_POST['SoLuong']
                );
            
                $MaHD =  $_POST['MaHD'];
                $TongTien =   $donGia * $_POST['SoLuong'];
               
                if(isset($_GET['note'])){
                    $this->bill_model->storefake($data_detailBill);
                    header('Location: ?mod=bill&act=addBill');
                }
                else{
                    $this->bill_model->store($data_detailBill);
                    $this->bill_model->updateBill($MaHD,$TongTien);
                }
                
            }

        }
    }
?>