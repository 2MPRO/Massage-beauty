<?php
    require_once("model.php");
    class homeModel extends model{
        function dichvu_danhmuc($a,$b)
        {  
            $query ="SELECT * from dichvu , hinhanh
             WHERE dichvu.trangThai = 1 
             		and loaidichvu.MaDM = danhmuc.MaDM 
                    and khuyenmai.MaKM = dichvu.MaKM 
                    AND dichvu.MaSP = hinhanh.masp
                    GROUP by dichvu.MaSP
         		    ORDER BY ThoiGian DESC limit $a,$b";
            require("result.php");
            return $data;  
        }
    }
?>