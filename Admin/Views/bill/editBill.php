
<?php $MaHD = $_GET['idBill'];
if ($dataBillDetail == null) { ?>

<?php } else if ($dataBillDetail[0]['TrangThai'] == 0) {
?>

    <a href="?mod=bill&act=confirm&MaHD=<?= $MaHD ?>" class="btn-booking btn-add-new">Duyệt hóa đơn</a>
<?php } ?>

<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong class="msg-box">Thông báo : <?= $_COOKIE['msg'] ?></strong>
    </div>
    <hr>
<?php } ?>



<div class="body-content">

<form method="POST" class="form-add" action="?mod=">
        <h1 class="form-title">Chỉnh sửa hóa đơn : <?= $databillselt[0]['MaHD'] ?></h1>
        <input type="hidden" class="MaHD" value=" <?= $databillselt[0]['MaHD'] ?>">
       
        <fieldset class="form-field">
            <label for="">Người dùng</label>
            <select id="MaND" class="form-control" name="MaND">
                <?php foreach ($data_User as $row) {
                ?>
                    <option value="<?= $row['MaND'] ?>" <?= $row['MaND'] == $databillselt[0]['MaND'] ? 'selected' : '' ?>><?= $row['Ho'] . " " . $row['Ten'] ?></option>
                <?php } ?>
            </select>
        </fieldset>
        <fieldset class="form-field">
            <label for="">Thời gian : </label>
            <label id ="">  <?= $databillselt[0]['NgayHen'] ?></label>
          
        </fieldset>
      
                    <hr>


   <div>
        <h1 class="form-title">Thêm dịch vụ khác</h1>
        <fieldset class="form-field">
            <label for="">Danh mục</label>
            <select id="MaDM" class="form-control" name="MaDM">
                <?php foreach ($data_dm as $row) { ?>
                    <option value="<?= $row['MaDM'] ?>"><?= $row['TenDM'] ?></option>
                <?php } ?>
            </select>
        </fieldset>
        <fieldset class="form-field">
            <label for="">Dịch vụ</label>
            <select id="MaSP" class="form-control" name="MaSP">
                <!-- Ajax vào chổ này -->
            </select>
        </fieldset>
        <fieldset class="form-field">
            <label for="">Số lượng</label>
            <input class="SoLuong" name="SoLuong" type="number" name="" id="" min=1 required>
        </fieldset>
       
        <fieldset>
            <a class="btn-booking btn-action-newService"> <i class="fas fa-plus-square"></i></a>
        </fieldset>
        <hr/>
                </div>

    <!--  -->

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Tên Dịch vụ</th>
                <th scope="col">Đơn Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành Tiền</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody id="data-table-body">

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
                        <th><a  class="btn-action btn-booking btn-delete-billService">Xóa</a></th>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><label style="font-weight: bold;" for="">Tổng Tiền : </label></td>
                    <td>
                   <span style="margin: 0; padding:0"> <input  id="TongTien" style="width: min-content;
    box-sizing: content-box; margin: 0; padding:0; text-align:center; font-weight: bold; border:none;" type="text" name="TongTien"  value="<?= number_format($tongtien) ?> ">VNĐ</span>
                    </td>
                    <td></td>
                </tr>
        </tbody>
    </table>
</form>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>