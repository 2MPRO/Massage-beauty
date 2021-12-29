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
<?php } ?>
<hr>
<div class="body-content">

    <form method="POST" class="form-add" action="?mod=">
        <h1 class="form-title">Chi tiết hóa đơn : <?= $databillselt[0]['MaHD'] ?> </h1>
        <input type="hidden" id="idbill" value=" <?= $databillselt[0]['MaHD'] ?>">
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
            <label for="">Tổng Tiền : </label>
            <label id ="TongTien">  <?= $databillselt[0]['TongTien'] ?></label>
            </select>
        </fieldset>

    </form>
</div>

<?php if ($dataBillDetail == null || $dataBillDetail[0]['TrangThai'] == 0) { ?>
    <a href="?mod=bill&act=addDetail&MaHD=<?= $MaHD ?>" class="btn-booking btn-add-new-detail">Thêm Dịch Vụ</a>
<?php } ?>
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
    <tbody>
        <?php foreach ($dataBillDetail as $row) { ?>
            <tr>

                <td><?= $row['Ten'] ?></td>
                <td class = "donGia"><?= $row['DonGia'] ?></td>
                <td> <input type="hidden" value="<?= $row['MaSP'] ?>" name="a"> 
                    <i class="sdjfsdjf fas fa-minus"></i> 
                    <input class="input-num" type="text" value="<?= $row['soLan'] ?>">

                     <i class="flus-quantity fas fa-plus"></i> 

                     <input type="hidden" value="<?= $row['MaSP'] ?>">
                </td>
                <td class="thanhTien" ><?= number_format($row['tongTien']) ?> VNĐ</td>
                <th><a href="" style=" display: <?= ($dataBillDetail == null || $dataBillDetail[0]['TrangThai'] == 0) ? '' : 'none' ?>" class="btn-action btn-booking">Xóa</a></th>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
</div>