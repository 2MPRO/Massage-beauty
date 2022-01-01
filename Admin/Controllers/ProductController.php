<?php
require_once("./Models/ProductModel.php");
class ProductController
{
    var $product_model;

    public function __construct()
    {
        $this->product_model = new product();
    }
    public function list()
    {
        $data_product = $this->product_model->all();
        require_once("Views/indexviewAD.php");
    }
    public function add()
    {
        $data_product = $this->product_model->all();
        $data_km = $this->product_model->khuyenmai();
      
        $data_dm = $this->product_model->danhmuc();

        require_once("Views/indexviewAD.php");
    }
    public function delete()
    {

        $id = $_GET['idsp'];
        $this->product_model->deleteImg($id);
        $this->product_model->delete($id);
    }
    public function store()
    {
        $target_dir = "../public/images/";
        $hinhAnhChinh = "";
        $target_file = $target_dir . basename($_FILES["hinhAnhChinh"]["name"]);
        $status_upload = move_uploaded_file($_FILES["hinhAnhChinh"]["tmp_name"], $target_file);
        if ($status_upload) { // up k lỗi
            $hinhAnhChinh = basename($_FILES['hinhAnhChinh']['name']);
        }

        $hinhAnh1 = "";
        $target_file = $target_dir . basename($_FILES['hinhAnh1']["name"]);
        $status_upload = move_uploaded_file($_FILES['hinhAnh1']['tmp_name'], $target_file);
        if ($status_upload) { // up k lỗi
            $hinhAnh1 = basename($_FILES['hinhAnh1']['name']);
        }

        $hinhAnh2 = "";
        $target_file = $target_dir . basename($_FILES['hinhAnh2']["name"]);
        $status_upload = move_uploaded_file($_FILES['hinhAnh2']['tmp_name'], $target_file);
        if ($status_upload) { // up k lỗi
            $hinhAnh2 = basename($_FILES['hinhAnh2']['name']);
        }

        $trangThai = 0;
        if (isset($_POST['TrangThai'])) {
            $trangThai = $_POST['TrangThai'];
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $giaCu =  $_POST['DonGia']+30000;
        $data_sanpham = array(
            'MASP' => 'null',
            'MaLSP' =>    $_POST['MaLSP'],
            'TenSP'  =>   $_POST['TenSP'],
            'DonGia' => $_POST['DonGia'],
            'SoLuong' => $_POST['SoLuong'],
            'MaKM' =>  $_POST['MaKM'],
            'SoSao' =>  0,
            'SoDanhGia' => 0,
            'TrangThai' => $trangThai,
            'ThoiGian' => $ThoiGian,
            'giaCu'=> $giaCu
        );
        $this->product_model->store($data_sanpham);



        $idsp = $this->product_model->getIdProductnew(); // lấy id sản phẩm mới chèn ;
        $data_img = array(
            $idsp . " 1" => $hinhAnhChinh,
            $idsp . " 2"  => $hinhAnh1,
            $idsp . " 3"  => $hinhAnh2
        );

        $this->product_model->insertImg($data_img);
    }
    public function callUpdate()
    {
        $id = isset($_GET['idsp']) ? $_GET['idsp'] : 1;
        $data_km = $this->product_model->khuyenmai();
      
        $data_dm = $this->product_model->danhmuc();
        $data = $this->product_model->getdichvuById($id);
        $dataImg = $this->product_model->getImgById($id);
        require_once("Views/indexviewAD.php");
    }
    public function update()
    {
        if(!empty($_POST)){
            $target_dir = "../public/images/";
            $hinhAnh1 = "";
            $target_file = $target_dir . basename($_FILES["hinhanh1"]["name"]);
            $status_upload = move_uploaded_file($_FILES["hinhanh1"]["tmp_name"], $target_file);
            if ($status_upload) { // up k lỗi
                $hinhAnh1 = basename($_FILES['hinhanh1']['name']);
            }
    
            $hinhAnh2 = "";
            $target_file = $target_dir . basename($_FILES['hinhanh2']["name"]);
            $status_upload = move_uploaded_file($_FILES['hinhanh2']['tmp_name'], $target_file);
            if ($status_upload) { // up k lỗi
                $hinhAnh2 = basename($_FILES['hinhanh2']['name']);
            }
    
            $hinhAnh3 = "";
            $target_file = $target_dir . basename($_FILES['hinhanh3']["name"]);
            $status_upload = move_uploaded_file($_FILES['hinhanh3']['tmp_name'], $target_file);
            if ($status_upload) { // up k lỗi
                $hinhAnh3 = basename($_FILES['hinhanh3']['name']);
            }
    
            $trangThai = 0;
           
                $trangThai = $_POST['TrangThai']; 
            
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ThoiGian =  date('Y-m-d H:i:s');
            $giaCu =  $_POST['DonGia']+30000;
            $data_sanpham = array(
                'MASP' => $_POST['MaSP'],
                'MaLSP' =>  $_POST['MaLSP'],
                'TenSP'  =>   $_POST['TenSP'],
                'DonGia' => $_POST['DonGia'],
                'SoLuong' => $_POST['SoLuong'],
                'MaKM' =>  $_POST['MaKM'],
                'SoSao' =>  0,
                'SoDanhGia' => 0,
                'TrangThai' => $trangThai,
                'ThoiGian' => $ThoiGian,
                'giaCu'=> $giaCu
            );
            $masp = $_POST['MaSP'];
            $this->product_model->updateProduct($data_sanpham);
    
            //echo "<script>console.log($this->idsp)</script>";
    
            $data_img = array(
                "hinhanh1" => $hinhAnh1,
                "hinhanh2"  => $hinhAnh2,
                "hinhanh3"  => $hinhAnh3
            );
            if ($hinhAnh1 == "") {
                unset($data_img['hinhanh1']);
            }
            if ($hinhAnh2 == "") {
                unset($data_img['hinhanh2']);
            }
            if ($hinhAnh3 == "") {
                unset($data_img['hinhanh3']);
            }
            $this->product_model->updateImg($data_img, $masp);
        }   
    }
  
}
