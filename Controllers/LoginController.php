<?php
   require_once("./Models/loginModel.php");
    class loginController {
        var $select_model;
        function __construct()
        {
            $this->select_model = new LoginModel();
        }
        public function show(){
            $dataCate = $this->select_model->danhmuc();
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

        }
        public function logout(){
            
            if(isset($_SESSION['login'])){
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['isAdmin'] )){
                unset($_SESSION['isAdmin'] );
            }
            if(isset($_SESSION['isStaff'])){
                unset($_SESSION['isStaff']);
            }
            header('Location: ?act=home');
        }

    }
?>