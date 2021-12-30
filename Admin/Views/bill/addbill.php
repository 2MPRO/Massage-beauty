

<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong class="msg-box">Thông báo : <?= $_COOKIE['msg'] ?></strong>
    </div>
    <hr>
<?php } ?>
<h1 class="form-title">Thêm hóa đơn mới : </h1>
<div class="body-content">

    <form method="POST" class="form-add" action="?mod=">
        
        <a href="" class="btn-booking btn-add-new">Lưu</a> 
        <fieldset class="form-field">
            <label for="">Khách hàng : </label>
            <select id="MaND" class="form-control" name="MaND">
                <?php foreach ($data_User as $row) {
                ?>
                    <option value="<?= $row['Ho'] . " " . $row['Ten'] ?>"><?= $row['Ho'] . " " . $row['Ten'] ?></option>
                <?php } ?>
            </select>
        </fieldset>


        <hr>
    </form>
    <div class="form-add">
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
        <input class="MaHD" type="hidden" value="<?= $MaHD ?>">
        <fieldset>
            <button class="btn-booking btn-action-newService"> Thêm </button>
        </fieldset>
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

        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>