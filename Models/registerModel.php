<?php
    require_once("./Models/connection.php");
    class RegisterModel {
        var $conn;
        function __construct()
        {
            $connection = new connection();
            $this->conn = $connection->conn; 
        }

        function danhmuc()
        {
            $query =  "SELECT * from danhmuc";
            require("result.php");
            return $data;
        }

        function chitietdanhmuc($id)
        {
            $query =  "SELECT d.TenDM as Ten, l.* FROM danhmuc as d, dichvu as l WHERE d.MaDM = l.MaDM and d.MaDM = $id";
    
            require("result.php");
            
            return $data;
        }

        function check_account()
        {
            $query =  "SELECT * from nguoidung";    
            require("result.php");
            return $data;
        }

        function register_action($data, $data1, $data2) {
            if ($data1 == 0) {
                if ($data2 == 0) {
                    $f = "";
                    $v = "";
                    foreach ($data as $key => $value) {
                        $f .= $key . ",";
                        $v .= "'" . $value . "',";
                    }
                    $f = trim($f, ",");
                    $v = trim($v, ",");
                    $query = "INSERT INTO nguoidung($f) VALUES ($v);";
    
                    $status = $this->conn->query($query);
                    if ($status == true) {
                        setcookie('msg', 'Đăng ký thành công', time() + 2);
                    } else {
                        setcookie('msg', 'Đăng ký không thành công', time() + 2);
                    }
                } else {
                    setcookie('msg', 'Mật khẩu không trùng nhau', time() + 2); 
                }
            } 
            else {
                setcookie('msg', 'SĐT khoản hoặc Mật khẩu  đã tồn tại', time() + 2);
            }

            header('Location: ?act=register');

        }

        function account()
        {
            $id = $_SESSION['login']['MaND'];
            return $this->conn->query("SELECT * from nguoidung where MaND = $id")->fetch_assoc();
            
        }

    }
?>