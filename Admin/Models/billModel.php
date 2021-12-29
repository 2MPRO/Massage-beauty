<?php
    require_once("model.php");
    class billModel extends model{
        var $table = "hoadon";
        var $contens = "MaHD";
    

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
        function insertDetailBill(){
            $query ="INSERT into chitiethoadon VALUES()";
        }


}
?>