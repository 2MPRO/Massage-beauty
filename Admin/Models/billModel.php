<?php
    require_once("model.php");
    class billModel extends model{
        var $table = "hoadon";
        var $contens = "MaHD";
    

        function All()
        {
            $query = "select MaHD,MaND, DATE_FORMAT(NgayHen, '%d-%m-%Y') as NgayHen,Gio,NguoiDung,SDT,DiaChi,TongTien,TrangThai from $this->table where trangthai <> '3'";
    
            require("result.php");
    
            return $data;     
        }
    public function ChitietHoaDon($id)
    {
        $query = "select ct.*, s.TenSP as Ten, s.DonGia as DonGia from chitiethoadon as ct,dichvu as s where ct.MaSP = s.MaSP and ct.MaHD = '$id'";

        require("result.php");
        
        return $data;
    }
    function  detail($id){
        $query = "select ct.*, s.TenSP as Ten,Hoadon.TrangThai, s.DonGia as DonGia from chitiethoadon as ct,hoadon ,dichvu as s where ct.MaSP = s.MaSP and ct.MaHD = '$id' and hoadon.MaHD = ct.MaHD ";

        require("result.php");
        
        return $data;
    }
    function getUser(){
        $query = "select * from nguoiDung";

        require("result.php");
        
        return $data;
    }
    function getUserByID($id){
        $query = "select * from nguoiDung where MaND = '$id'";
        
        require("result.php");
        
        return $data;
    }
    function   billSelt($id){
        $query = "select *  from hoaDon where MaHD = '$id'";
        require("result.php"); 
        return $data;
    }
   
    function service_category($a,$b,$danhmuc)
        {  
            $query ="SELECT * from dichvu, danhmuc, hinhanh,khuyenmai
            WHERE dichvu.trangThai = 1 
                   and khuyenmai.MaKM = dichvu.MaKM 
                    and dichvu.MaDM = danhmuc.MaDM
                    and danhmuc.MaDM = '$danhmuc' 
                    AND dichvu.MaSP = hinhanh.masp
                    GROUP by dichvu.MaSP
                    ORDER BY ThoiGian DESC limit $a,$b";
                echo "<script>
                alert($query);
            </script>";
            require("result.php");
            return $data;  
        }
        function service()
        {  
            $query ="SELECT * from dichvu";
            require("result.php");
            return $data;  
        }
        function getMaxidBill(){
            $query = "SELECT MAX(MaHD) as MaHD FROM `hoadon` ";
            require("result.php");
            return $data;  
        }
        function insertBill(){
            $query = "INSERT INTO `hoadon` (`MaHD`, `MaND`, `NgayHen`, `NguoiDung`, `SDT`, `DiaChi`, `TongTien`, `TrangThai`) VALUES (NULL, NULL, '2021-12-30 07:38:52.000000', NULL, NULL, NULL, NULL, '0');";
            $result = $this->conn->query($query);     
        }
       
       
}
?>