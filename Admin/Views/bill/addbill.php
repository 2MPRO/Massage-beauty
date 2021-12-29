<div class="body-content">
    <form class ="form-add" method="POST" action="?mod=bill&act=addDetailAction" >
        <h1 class="form-title">Thêm Hóa Đơn</h1>
        
        <fieldset class = "form-field">
            <label for="">Danh mục</label>
            <select id="MaDM" class="form-control" name="MaDM">
            <?php foreach ($data_dm as $row){ ?>
                <option value="<?= $row['MaDM'] ?>"><?= $row['TenDM'] ?></option>
            <?php }?>
            </select>
        </fieldset>
        <fieldset class = "form-field">
            <label for="">Dịch vụ</label>
            <select id="MaSP" class="form-control" name="MaSP">
            <?php foreach ($data_service as $row){ ?>
                <option value="<?= $row['MaSP'] ?>"><?= $row['TenSP'] ?></option>
            <?php }?>
            </select>
        </fieldset>
        <fieldset class = "form-field">
            <label for="">Số lượng</label>
           <input name="SoLuong" type="number" name="" id="" min=1 required  >
        </fieldset>
        <input type="hidden" name="MaHD" value="<?= $_GET['MaHD']?>">
        <input type="hidden" name="DonGia" value="<?= $row['DonGia']?>">
        <fieldset>
            <button class = "btn-booking"> Thêm </button>
        </fieldset>
    </form>
</div>