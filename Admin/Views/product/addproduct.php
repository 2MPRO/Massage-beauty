<?php 
    ?>
    <form id ="table"c lass="add-product-form"action="?mod=product&act=store" method="POST" enctype="multipart/form-data">
    <?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-warning">
      <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
  <?php } ?>
    <h3>Thêm sản phẩm mới : </h3>
    <fieldset class="form-field">
        <label>Danh mục</label>
        <select id="MaDM" class="form-control" name="MaDM">
       <?php foreach ($data_dm as $row){ ?>
        <option value="<?= $row['MaDM'] ?>"><?= $row['TenDM'] ?></option>
            <?php }?>
        </select>
    </fieldset>
  
    <fieldset class="form-field">
        <label>Tên sản phẩm</label>
        <input class="form-control" type="text" name="TenSP" id="">
    </fieldset>
    <fieldset class="form-field">
        <label>Đơn giá</label>
        <input  class="form-control" type="text" name="DonGia" id="">
    </fieldset>
    <fieldset class="form-field">
        <label>Khoảng thời gian</label>
        <input class="form-control" type="text" name="KhoangThoiGian" id="">
    </fieldset>
    <fieldset class="form-field">
        <label>Hình ảnh chính</label>
        <input type="file" class="form-control" id="" placeholder="" name="hinhAnhChinh">
    </fieldset>
    <fieldset class="form-field">
        <label>Hình ảnh 2</label>
        <input type="file" class="form-control" id="" placeholder="" name="hinhAnh1">
    </fieldset>
    <fieldset class="form-field">
        <label>Hình ảnh 3</label>
        <input type="file" class="form-control" id="" placeholder="" name="hinhAnh2">
    </fieldset>
    <fieldset class="form-field">
        <label>Mã khuyến mãi</label>
        <select id="" name="MaKM" class="form-control">
        <?php foreach ($data_km as $row) { ?>
          <option value="<?= $row['MaKM'] ?>"><?= $row['TenKM'] ?></option>
        <?php } ?>
      </select>
    </fieldset>
    <fieldset class="form-field">
        <label>Trạng thái</label>
        <input type="checkbox" id="" checked="true" placeholder="" value="1" name="TrangThai"><em>(Check cho phép hiện thị sản phẩm)</em>
    </fieldset>
    <fieldset class="form-field">
        <label>Mô tả</label>
        <input class="form-control" type="text" name="Mota" id="">
    </fieldset>
    <button  class ="btn-addproduct"> Thêm </button>
    
   
</form>