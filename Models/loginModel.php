<?php 
    require_once("./Models/connection.php");
    class LoginModel{
        var $conn;
        function __construct()
        {
            $connection = new connection();
            $this->conn = $connection->conn; 
        }

        function login_action($data){
           
            $querry = "SELECT *from nguoidung where SDT = '".$data['SDT']."' and MatKhau = '".$data['MatKhau']."'";
            $result = $this->conn->query($querry)->fetch_assoc();
            if($result !== NULL){
                $_SESSION['login']  = $result;
                if($result['MaQuyen']==2){
                    $_SESSION['isAdmin'] = true;
                }
                else if($result['MaQuyen']==3){
                    $_SESSION['isStaff'] = true;
                }
                if(isset($_SESSION['login'])){
                    header('Location: ?act=home');
                }
               
            }
            else{
                setcookie('msg','Sai tài khoản hoặc mật khẩu',time()+5);
                header('Location: ?act=login');
            } 
        }
    }
?>