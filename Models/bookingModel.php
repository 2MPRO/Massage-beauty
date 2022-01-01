<?php
    require_once("model.php");
    class bookingModel extends model{
        var $table = "hoadon";
        var $contens = "MaHD";
        
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
        
        if($this->table == "chitiethoadon")
        {
            $MaHD = $data['MaHD'];
            $this->table = "bill&act=detail&idBill=$MaHD";
        }
        if($this->table == "hoadon"){
            $this->table = "bill&act=bill";
        }
        if ($status == true) {
            //setcookie('msg',$query, time() + 2);
           setcookie('msg', 'Thêm mới thành công', time() + 2);
                header('Location: ?mod=' . $this->table);
        } else {
            setcookie('msg',$query, time() + 2);
           // setcookie('msg',"Đã tồn tại dịch vụ; vui lòng tăng số lượng.", time() + 2);
            header('Location: ?mod=' . $this->table );
        }
    }
    }
?>