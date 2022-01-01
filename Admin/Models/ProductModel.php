<?php 
    require_once("model.php");
    class product extends model{
        var $table = "dichvu";
        var $contens = "MaSP";
    function khuyenmai(){
            $query = "select * from khuyenmai ";
            require("result.php");
            return $data;
        }
  
    function danhmuc(){
        $query = "select * from danhmuc";
        require("result.php");
        return $data;
    }
    function getImgById($idsp){
         $query = "select *from hinhanh where MaSP = $idsp";
        require("result.php");
        return $data; 
    }
    function getdichvuById($idsp){
        $query = "select dichvu.*, danhmuc.MaDM  from dichvu, danhmuc where dichvu.masp = $idsp and dichvu.madm = danhmuc.madm " ;
        require("result.php");
        return $data;
    }
    function getSanPhamById($idsp){
        $query = "select dichvu.*, danhmuc.MaDM from dichvu, danhmuc where dichvu.masp = $idsp and dichvu.MaDM = danhmuc.MaDM " ;
        return $this->conn->query($query)->fetch_assoc();
    }
    function getIdProductnew(){
        $query = "select MaSP from dichvu
        ORDER BY ThoiGian DESC limit 1";
        $result = $this->conn->query($query);
        $row = mysqli_fetch_assoc($result);
      
        $id =$row['MaSP'];
      //  setcookie('idsp', 'Lấy id thành công'.$id, time() + 2);
       
        return $id;

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

        if ($status == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 2);
          header('Location: ?mod=' ."product" . '&act=add');
        } else {
            setcookie('msg', $query, time() + 2);
        header('Location: ?mod=' ."product" . '&act=add');
        }
    }

    function updateProduct($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE $this->table SET  $v   WHERE $this->contens = ".$data['MASP'];
        $result = $this->conn->query($query);
        
        if ($result == true) {
            setcookie('msg', "Cập nhật thành công !", time() + 2);
            header('Location: ?mod=' . "product");
        } else {
            setcookie('msg', $query, time() + 2);
            header('Location: ?mod=' .  "product");
        }
    }
    function issetImgName($idsp, $imgName){
        $query = "select *from hinhanh where masp = $idsp and tenhinh ='$imgName'";
        $result = $this->conn->query($query);
        $row = mysqli_fetch_assoc($result);
        if($row != null){
            return true;
        }
        else return false;
    }

    function updateImg($data_img, $idsp){
        $query ="";
        $result ="";
        foreach($data_img as $key => $value){
            if($this->issetImgName($idsp, $key)){ // nếu tên hình đã có thì update với tên hình
              $query = "UPDATE hinhanh set hinhanh = '$value' where masp = $idsp and tenhinh = '$key';";
              $result = $this->conn->query($query);
            }
            else { // nếu tên hình chưa có thì chèn lại
                $query = "INSERT into  hinhanh values ('null',  '$idsp' ,'$value' ,'$key')";
                $result = $this->conn->query($query);
            }
        }
        if ($result == true) {
            setcookie('msg', 'Cập nhật thành công', time() + 2);
            header('Location: ?mod=' . $this->table);
        } else {
            setcookie('msg', $query, time() + 2);
        }

        }
  
    function insertImg($data_img){
        $dat ="";
        $i =0;
        foreach($data_img as $key => $value){
            $i +=1;
            $key = rtrim($key, " ".$i);
            $dat .= "('null','$key','$value','hinhanh$i'),";
        }
        $dat = trim($dat, ",");
        $query = "INSERT INTO hinhanh VALUES $dat;";
        $result = $this->conn->query($query);
        if ($result == true) {
            setcookie('msg', 'Duyệt thành công', time() + 2);
            header('Location: ?mod=' . "product");
        } else {
            setcookie('msg', $query, time() + 2);
        }
        //setcookie('idsp', 'chèn hình ảnh : '.$query, time() + 2);
    }

    function deleteImg($id)
    {
        $query = "DELETE from hinhanh where masp=$id";    
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
        }
        header('Location: ?mod=' . "product");
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
        header('Location: ?mod=' . "product");
    }
    
}
 
?>