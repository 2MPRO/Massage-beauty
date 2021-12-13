<?php 
    require_once("./Models/connection.php");
  
    class selectsql{
        var $conn;
        function __construct()
        {
            $connection = new connection();
            $this->conn = $connection->conn; 
        }

        function login_action($data){
            echo" <script>alert('ácđ')</script>";
            $querry = "SELECT *from nguoidung where SDT = '".$data['SDT']."' and MatKhau = '".$data['MatKhau']."'";
            $result = $this->conn->query($querry)->fetch_assoc();
            
            if($result!=NULL){
                $user = new user($result['MaND'],$result['Ho'],$result['Ten'],$result['GioiTinh'],$result['SDT'],$result['Email'],$result['DiaChi'],$result['MatKhau'],$result['MaQuyen'],$result['TrangThai']);
                $_SESSION['login'] = $user;
                if($user->getMaQuyen()==2){
                    $_SESSION['isAdmin'] = true;
                }
                else if($user->getMaQuyen()==3){
                    $_SESSION['isStaff'] = true;
                }
                header('Location: ?act=home');
            }
            else{
                setcookie('msg','Đăng nhập không thành công',time()+5);
                header('Location: ?act=login');
            } 
        }
    }
?>