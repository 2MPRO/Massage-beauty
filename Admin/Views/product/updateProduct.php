
    <?php 
      
    ?>
    <form class="add-product-form"action="?mod=sanpham&act=update" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="MaSP" value="<?= $data['MaSP'] ?>">
    <input type="hidden" id="idtype" value="<?= $data['MaLSP'] ?>">
    <?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-warning">
      <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
  <?php } ?>
    <h3>Thêm sản phẩm mới : </h3>
    <fieldset class="add-product-item">
        <label>Danh mục</label>
        <select id="MaDM" class="form-control" name="MaDM" id="add-cate">
       <?php foreach ($data_dm as $row){ ?>
        <option <?= ($row['MaDM'] == $data['MaDM'])?'selected':''?> value="<?= $row['MaDM'] ?>"> <?= $row['TenDM'] ?>  </option>
            <?php }?>
        </select>
    </fieldset>
    <fieldset class="add-product-item">
        <label>Loại sản phẩm</label>
        <select class="form-control" name="MaLSP" id="MaLSP">
        <?php foreach ($data_lsp as $row) { ?>
          <option <?= ($row['MaLSP'] == $data['MaLSP'])?'selected':''?> value="<?= $row['MaLSP'] ?>"><?= $row['TenLSP'] ?></option>
        <?php } ?>
        </select>
    </fieldset>
    <fieldset class="add-product-item">
        <label>Tên sản phẩm</label>
        <input class="form-control" type="text" name="TenSP" id="" value="<?=$data['TenSP']?>">
    </fieldset>
    <fieldset class="add-product-item">
        <label>Đơn giá</label>
        <input  class="form-control" type="text" name="DonGia" id="" value="<?=$data['DonGia']?>">
    </fieldset>
    <fieldset class="add-product-item">
        <label>Số lượng</label>
        <input class="form-control" type="text" name="SoLuong" id="" value="<?=$data['SoLuong']?>">
    </fieldset>
    
    <?php 
    for($i=1 ; $i<=3;$i++)
        {
           if(isset($dataImg[$i-1])) {
            $imgrow = $dataImg[$i-1];
           }
                
        if(isset($dataImg[$i-1])){?>
        <fieldset class="add-product-item">
            <label>Hình ảnh <?=$i?> </label>
            <img src="../public/images/<?=$imgrow['hinhanh']?>" height="200px" width="200px">
            <input type="file" class="form-control" id="" placeholder="" name="<?=$imgrow['tenhinh']?>" value="<?=$imgrow['hinhanh']?>">
            
        </fieldset>
    <?php }else{ ?>
        <fieldset class="add-product-item">
            <label>Hình ảnh <?=$i?> </label>
            <input type="file" class="form-control" id="" placeholder="" name="hinhanh<?=$i?>" value="">
        </fieldset>
    <?php }?>
    <?php }?>
    
   
   
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
<script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
</script>

