<?php 
require_once("./Models/registerModel.php");
    class registerController {
        var $select_model;
        function __construct()
        {
            $this->select_model = new RegisterModel();
        }

        public function show(){
            $data_danhmuc = $this->select_model->danhmuc();
            require_once('./Views/indexview.php');  
        }
        

        function register_action()
        {
            $data_danhmuc = $this->select_model->danhmuc();

            $data1 = 0;
            $data2 = 0;
            $data_check = $this->select_model->check_account();
            foreach ($data_check as $value) {
                if ($value['SDT'] == $_POST['SDT'] || $value['MatKhau'] == $_POST['MatKhau']) {
                    $data1 = 1;
                }
            }

            if ($_POST['MatKhau'] != $_POST['check_password']) {
                $data2 = 1;
            }

            $data = array(
                'SDT' => $_POST['SDT'],
                'MatKhau' =>    $_POST['MatKhau'],
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }    
            $this->select_model->register_action($data, $data1, $data2);
        }

        function account()
        {
            $data_danhmuc = $this->login_model->danhmuc();

            $data_chitietDM = array();

            for ($i = 1; $i <= count($data_danhmuc); $i++) {
                $data_chitietDM[$i] = $this->login_model->chitietdanhmuc($i);
            }
            $data = $this->select_model->account();

            require_once('Views/index.php');
        }

    }
?>