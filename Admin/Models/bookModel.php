<?php
    require_once("model.php");
    class bookModel extends model{
        var $table = "hoadon";
        var $contens = "MaHD";

        function All()
        {
            $query = "select MaHD,MaND, DATE_FORMAT(NgayHen, '%d-%m-%Y') as NgayHen,Gio,NguoiDung,SDT,DiaChi,TongTien,TrangThai from $this->table where trangthai = '3'";
    
            require("result.php");
    
            return $data;     
        }
        function getMaxidBill(){
            $query = "SELECT MAX(MaHD) as MaHD FROM `hoadon` ";
            require("result.php");
            return $data;  
        }


        function getUserByID($id){
            $query = "select * from nguoiDung where MaND = '$id'";
            
            require("result.php");
            
            return $data;
        }
        public function ChitietHoaDon($id)
    {
        $query = "select ct.*, s.TenSP as Ten, s.DonGia as DonGia from chitiethoadon as ct,dichvu as s where ct.MaSP = s.MaSP and ct.MaHD = '$id'";

        require("result.php");
        
        return $data;
    }
    function service()
    {  
        $query ="SELECT * from dichvu";
        require("result.php");
        return $data;  
    }
    function getUser(){
        $query = "select * from nguoiDung";

        require("result.php");
        
        return $data;
    }
    function   billSelt($id){
        $query = "select *  from hoaDon where MaHD = '$id'";
        require("result.php"); 
        return $data;
    }

    function store($data)
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
        
       
        if ($status == true) {
            //setcookie('msg',$query, time() + 2);
           setcookie('msg', 'Thêm mới thành công', time() + 2);
                header('Location: ?mod=' . "book");
        } else {
            setcookie('msg',$query, time() + 2);
           // setcookie('msg',"Đã tồn tại dịch vụ; vui lòng tăng số lượng.", time() + 2);
            header('Location: ?mod=' . "book" );
        }
    }
    function update($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");


        $query = "UPDATE $this->table SET  $v   WHERE $this->contens = " . $data[$this->contens];

        $result = $this->conn->query($query);
        if($this->table == "hoadon"){
            $this->table= "bill";
        }
        if ($result == true) {
            setcookie('msg', 'Cập nhật thành công', time() + 2);
            
            header('Location: ?mod=' . "book");
        } else {
            setcookie('msg', $query , time() + 2);
            header('Location: ?mod=' . $this->table . '&act=edit&id=' . $data['id']['id']);
        }
    }
    function  detail($id){
        $query = "select ct.*, s.TenSP as Ten,Hoadon.TrangThai, s.DonGia as DonGia from chitiethoadon as ct,hoadon ,dichvu as s where ct.MaSP = s.MaSP and ct.MaHD = '$id' and hoadon.MaHD = ct.MaHD ";

        require("result.php");
        
        return $data;
    }
}
?>