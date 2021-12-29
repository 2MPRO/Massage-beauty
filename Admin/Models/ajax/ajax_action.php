<?php 

    if(isset($_POST['idcate'])){   
      //echo "<script>alert('ngu ngo')</script>";  
        $idcate = $_POST['idcate']; 
        $idDV ="";
        if(isset($_POST['idDV'])){
          $idDV =$_POST['idDV'];
          
        }
        include("../serviceModel.php");
        $controller_obj = new serviceModel();
        $array = $controller_obj->getServiceById($idcate);
        foreach($array as $row){    
            ?>
              <option <?= ($row['MaSP'] == $idDV)?'selected':'' ?> value="<?= $row['MaSP'] ?>"><?= $row['TenSP'] ?></option>
     <?php  }
    }

    if(isset($_POST['num'])&&!isset($_POST['action'])){
      $quantity = $_POST['num'];
      $MaHD = $_POST['MaHD'];
      $MaSP = $_POST['MaSP'];
      $ThanhTien = $_POST['ThanhTien'];
      $TongTien =  $_POST['TongTien'];
      echo "<script>alert(' $quantity + $MaHD +  $MaSP ')</script>"; 
      include("../serviceModel.php");
      $controller_obj = new serviceModel();
      $controller_obj->Total($MaHD,$TongTien);
      $array = $controller_obj->Quantity($quantity,$MaHD,$MaSP,$ThanhTien,$TongTien);
     
      ?>
      <input class = "input-num" type="text" value=" <?php $quantity ?>"> 

 <?php   } ?>

 <?php 
 if(isset($_POST['action']) && $_POST['action']="flus" ){
    $quantity = $_POST['num'];
    $MaHD = $_POST['MaHD'];
    $MaSP = $_POST['MaSP'];
    $ThanhTien = $_POST['ThanhTien'];
    $TongTien =  $_POST['TongTien'];
    echo "<script>alert(' $quantity + $MaHD +  $MaSP ')</script>"; 
    include("../serviceModel.php");
    $controller_obj = new serviceModel();
    $controller_obj->Total($MaHD,$TongTien); 
    $array = $controller_obj->Quantity($quantity,$MaHD,$MaSP,$ThanhTien,$TongTien);
 
    ?>
    <input class = "input-num" type="text" value=" <?php $quantity ?>"> 

<?php   } ?>
<!-- -->