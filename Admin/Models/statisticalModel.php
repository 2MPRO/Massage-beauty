<?php
    require_once("model.php");
    class statisticalModel extends model{
        var $table = "hoadon";
        var $contens = "MaHD";
    
        function getSales($subdays,$now){
            $query = "select NgayHen as date,count(MaND) as customers, Sum(TongTien) as sales from hoadon where trangthai <> 3 and ngayhen between '$subdays' and '$now' GROUP BY NgayHen order by ngayhen ASC";

            require("result.php");
            
            return $data;
        }
}
    ?>