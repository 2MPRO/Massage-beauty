<?php
    require_once("model.php");
   
    class serviceModel extends model{
       
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
    }
?>
