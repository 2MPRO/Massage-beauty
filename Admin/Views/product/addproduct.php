
    <?php 
    ?>
    <form id ="table"c lass="add-product-form"action="?mod=sanpham&act=store" method="POST" enctype="multipart/form-data">
    <?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-warning">
      <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
  <?php } ?>
    <h3>Thêm sản phẩm mới : </h3>
    <fieldset class="add-product-item">
        <label>Danh mục</label>
        <select id="MaDM" class="form-control" name="MaDM">
       <?php foreach ($data_dm as $row){ ?>
        <option value="<?= $row['MaDM'] ?>"><?= $row['TenDM'] ?></option>
            <?php }?>
        </select>
    </fieldset>
    <fieldset class="add-product-item">
        <label>Loại sản phẩm</label>
        <select id="MaLSP" class="form-control" name="MaLSP">
        <!-- <?php foreach ($data_lsp as $row) { ?>
          <option value="<?= $row['MaLSP'] ?>"><?= $row['TenLSP'] ?></option>
        <?php } ?> -->
        </select>
    </fieldset>
    <fieldset class="add-product-item">
        <label>Tên sản phẩm</label>
        <input class="form-control" type="text" name="TenSP" id="">
    </fieldset>
    <fieldset class="add-product-item">
        <label>Đơn giá</label>
        <input  class="form-control" type="text" name="DonGia" id="">
    </fieldset>
    <fieldset class="add-product-item">
        <label>Số lượng</label>
        <input class="form-control" type="text" name="SoLuong" id="">
    </fieldset>
    <fieldset class="add-product-item">
        <label>Hình ảnh chính</label>
        <input type="file" class="form-control" id="" placeholder="" name="hinhAnhChinh">
    </fieldset>
    <fieldset class="add-product-item">
        <label>Hình ảnh 2</label>
        <input type="file" class="form-control" id="" placeholder="" name="hinhAnh1">
    </fieldset>
    <fieldset class="add-product-item">
        <label>Hình ảnh 3</label>
        <input type="file" class="form-control" id="" placeholder="" name="hinhAnh2">
    </fieldset>
    <fieldset class="add-product-item">
        <label>Mã khuyến mãi</label>
        <select id="" name="MaKM" class="form-control">
        <?php foreach ($data_km as $row) { ?>
          <option value="<?= $row['MaKM'] ?>"><?= $row['TenKM'] ?></option>
        <?php } ?>
      </select>
    </fieldset>
    <fieldset class="add-product-item">
        <label>Trạng thái</label>
        <input type="checkbox" id="" checked="true" placeholder="" value="1" name="TrangThai"><em>(Check cho phép hiện thị sản phẩm)</em>
    </fieldset>
    <fieldset class="add-product-item">
        <label>Mô tả</label>
        <input class="form-control" type="text" name="" id="">
    </fieldset>
    <button  class ="btn-addproduct"> Thêm </button>
    
   
</form>

