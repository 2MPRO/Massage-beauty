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
        public function getServiceById($idcate)
        {
            $query = "select * from dichvu where madm = $idcate";
            require("result.php");
            return $data;
        }

        function Quantity($quantity,$MaHD,$MaSP,$ThanhTien,$TongTien){
            $query = "UPDATE `chitiethoadon` SET `soLan` = '$quantity' , TongTien = '$ThanhTien'  WHERE `chitiethoadon`.`MaHD` = '$MaHD' AND `chitiethoadon`.`MaSP` = '$MaSP';";
            require("result.php");
            return $data;

            
        }
         function Total($MaHD,$TongTien)
         {
            $query = "UPDATE `hoadon` SET `TongTien` = '$TongTien' WHERE `hoadon`.`MaHD` = '$MaHD';";
            $result = $this->conn->query($query);
        
        if ($result == true) {
            setcookie('msg', 'Cập nhật thành công', time() + 2);
           
        } else {
            setcookie('msg', $query, time() + 2);
          
        }
         }
    }
?>
