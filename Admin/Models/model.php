<?php
require_once("connection.php");
class Model
{
    var $conn;
    var $table;
    var $contens;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function danhmuc()
        {
            $query =  "SELECT * from DanhMuc";
            require("result.php");
            return $data;
        }

    function All()
    {
        $query = "select * from $this->table ORDER BY $this->contens DESC ";

        require("result.php");

        return $data;
        
    }
    function find($id)
    {
        $query = "select * from $this->table where $this->contens =$id";
        return $this->conn->query($query)->fetch_assoc();
    }
    function delete($id)
    {
        $query = "DELETE from $this->table where $this->contens=$id";
        
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
        }
        header('Location: ?mod=' . $this->table);
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
            
            header('Location: ?mod=' . $this->table);
        } else {
            setcookie('msg', $query , time() + 2);
            header('Location: ?mod=' . $this->table . '&act=edit&id=' . $data['id']['id']);
        }
    }
}
