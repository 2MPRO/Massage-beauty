<?php
    require_once("model.php");
    class detailBillModel extends model{
        var $table = "chitiethoadon";
        var $contens = "MaHD";
    

        function updateBill($MaHD,$TongTien){
            $query ="UPDATE `hoadon` SET `TongTien` = `TongTien`+'$TongTien' WHERE `hoadon`.`MaHD` = '$MaHD'";
            $result = $this->conn->query($query);
        }
        function deleteBillDetail($MaHD, $MaSP)
        {
            $query = "DELETE from chitiethoadon where MaHD = '$MaHD' and MaSP = '$MaSP'";
            $status = $this->conn->query($query);
        }
        public function ChitietHoaDon($id)
        {
            $query = "select ct.*, s.TenSP as Ten, s.DonGia as DonGia from chitiethoadon as ct,dichvu as s where ct.MaSP = s.MaSP and ct.MaHD = '$id'";
    
            require("result.php");
            
            return $data;
        }
        public function getServiceById($MaSP)
        {
            $query = "select * from dichvu where MaSP = '$MaSP'";
            require("result.php");
            return $data;
        }
        function storefake($data)
    {
        $f = "";
        $v = "";
       
        foreach ($data as $key => $value) {
            
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO $this->table($f) VALUES ($v);";

        $status = $this->conn->query($query);
        
        if($this->table == "chitiethoadon")
        {
            $MaHD = $data['MaHD'];
            $this->table = "bill&act=detail&idBill=$MaHD";
        }
        if(isset($_GET['note'])){
            header('Location: ?mod=bill&act=addBill');
        }
        if ($status == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 2);
            header('Location: ?mod=' . $this->table);
        } else {
            setcookie('msg',"Đã tồn tại dịch vụ; vui lòng tăng số lượng.", time() + 2);
            header('Location: ?mod=' . $this->table );
        }
    }



}
?>