
<?php
if (isset($_POST['idcate'])) {
  //echo "<script>alert('ngu ngo')</script>";  
  $idcate = $_POST['idcate'];
  $idDV = "";
  if (isset($_POST['idDV'])) {
    $idDV = $_POST['idDV'];
  }
  include("../serviceModel.php");
  $controller_obj = new serviceModel();
  $array = $controller_obj->getServiceById($idcate);
  foreach ($array as $row) {
?>
    <option <?= ($row['MaSP'] == $idDV) ? 'selected' : '' ?> value="<?= $row['MaSP'] ?>"><?= $row['TenSP'] ?></option>
  <?php  }
}

if (isset($_POST['num']) && !isset($_POST['action'])) {
  $quantity = $_POST['num'];
  $MaHD = $_POST['MaHD'];
  $MaSP = $_POST['MaSP'];
  $ThanhTien = $_POST['ThanhTien'];
  $TongTien =  $_POST['TongTien'];
  echo "<script>alert(' $quantity + $MaHD +  $MaSP ')</script>";
  include("../serviceModel.php");
  $controller_obj = new serviceModel();
  $controller_obj->Total($MaHD, $TongTien);
  $array = $controller_obj->Quantity($quantity, $MaHD, $MaSP, $ThanhTien, $TongTien);

  ?>
  <input class="input-num" type="text" value=" <?php $quantity ?>">

<?php   } ?>

<?php
if (isset($_POST['action']) && $_POST['action'] == "flus") {
  $quantity = $_POST['num'];
  $MaHD = $_POST['MaHD'];
  $MaSP = $_POST['MaSP'];
  $ThanhTien = $_POST['ThanhTien'];
  $TongTien =  $_POST['TongTien'];
  echo "<script>alert(' $quantity + $MaHD +  $MaSP ')</script>";
  include("../serviceModel.php");
  $controller_obj = new serviceModel();
  $controller_obj->Total($MaHD, $TongTien);
  $array = $controller_obj->Quantity($quantity, $MaHD, $MaSP, $ThanhTien, $TongTien);

?>
  <input class="input-num" type="text" value=" <?php $quantity ?>">

  <?php   }

if (isset($_POST['action']) && $_POST['action'] == "addnew") {
  
  $quantity = $_POST['num'];
  $MaHD = $_POST['MaHD'];
  $MaSP = $_POST['MaSP'];
  /* $ThanhTien = $_POST['ThanhTien'];
  $TongTien =  $_POST['TongTien']; */

  include("../serviceModel.php");
  $controller_obj = new serviceModel();
  $array = $controller_obj->getPrice($MaSP);
  $DonGia = $array[0]['DonGia'];
  $ThanhTien = $DonGia * $quantity;
  $controller_obj->InsertNewDetailBill($MaHD, $MaSP, $quantity, $ThanhTien);
  $dataBillDetail = $controller_obj->ChitietHoaDon($MaHD);

 ?>
    <?php
            $tongtien  = 0;
            foreach ($dataBillDetail as $row) {
                $tongtien += $row['tongTien'];
            ?>
                <tr>
                    <td><?= $row['Ten'] ?></td>
                    <td class="donGia"><?= number_format($row['DonGia']) . "VNĐ" ?></td>
                    <td>
                        <input class="MaSP" type="hidden" value="<?= $row['MaSP'] ?>" name="a">
                        <i class="NEWminus fas fa-minus"></i>
                        <input class="input-num" type="text" value="<?= $row['soLan'] ?>">
                        <i class="NEWflus-quantity fas fa-plus"></i>

                    </td>
                    <td class="thanhTien"><?= number_format($row['tongTien']) ?>VNĐ</td>
                    <th><a href="" class="btn-action btn-booking">Xóa</a></th>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td></td>
                <td><label style="font-weight: bold;" for="">Tổng Tiền : </label></td>
                <td>
                    <label style="font-weight: bold;" id="TongTien"> <?= number_format($tongtien) ?> VNĐ </label>
                </td>
                <td></td>
            </tr>

<?php } ?>








<!-- -->