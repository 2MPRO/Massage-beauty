<?php
   require_once("./Models/selectsql.php");
    class loginController{
        
        var $select_model;
        function __construct()
        {
            $select_model = new selectsql();
        }
        public function show(){
            require_once('./Views/indexview.php');  
        }

        public function login_action(){
            
            if(isset($_POST['SDT']) && ($_POST['SDT'] != "") && $_POST['MatKhau'] !=""  ){
                $numPhone = $_POST['SDT'];
                $pass = md5($_POST['MatKhau']); 
                $data = array(
                    'SDT'=>$numPhone,
                    'MatKhau'=>$pass
                ); 
                $this->select_model->login_action($data);
               
            }
            else
                setcookie('msg',"Vui lòng kiểm tra lại thông tin", time()+4);
            echo" <script>alert('Khong tim thay SDT ')</script>";
        
        }
    }
?>