
    <?php 
      
    ?>
    <form class="add-product-form"action="?mod=product&act=update" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="MaSP" value="<?= $data['MaSP'] ?>">
    <?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-warning">
      <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
  <?php } ?>
    <h3>Thêm sản phẩm mới : </h3>
    <fieldset class="form-field">
        <label>Danh mục</label>
        <select id="MaDM" class="form-control" name="MaDM" id="add-cate">
       <?php foreach ($data_dm as $row){ ?>
        <option <?= ($row['MaDM'] == $data['MaDM'])?'selected':''?> value="<?= $row['MaDM'] ?>"> <?= $row['TenDM'] ?>  </option>
            <?php }?>
        </select>
    </fieldset>

    <fieldset class="form-field">
        <label>Tên sản phẩm</label>
        <input class="form-control" type="text" name="TenSP" id="" value="<?=$data['TenSP']?>">
    </fieldset>

    <fieldset class="form-field">
        <label>Đơn giá</label>
        <input  class="form-control" type="text" name="DonGia" id="" value="<?=$data['DonGia']?>">
    </fieldset>

    <fieldset class="form-field">
        <label>Mô tả</label>
        <input  class="form-control" type="text" name="DonGia" id="" value="<?=$data['moTa']?>">
    </fieldset>

    <fieldset class="form-field">
        <label>Khoảng thời gian</label>
        <input class="form-control" type="text" name="SoLuong" id="" value="<?=$data['KhoangThoiGian']?>">
    </fieldset>

    <fieldset class="form-field">
        <label>Trạng thái</label>
        <input class="form-control" type="text" name="SoLuong" id="" value="<?=$data['TrangThai']?>">
    </fieldset>
    
    <?php 
    for($i=1 ; $i<=3;$i++)
        {
           if(isset($dataImg[$i-1])) {
            $imgrow = $dataImg[$i-1];
           }
                
        if(isset($dataImg[$i-1])){?>
        <fieldset class="form-field">
            <label>Hình ảnh <?=$i?> </label>
            <img src="../public/imgs/img_service/<?=$imgrow['hinhanh']?>" height="200px" width="200px">
            <input type="file" class="form-control" id="" placeholder="" name="<?=$imgrow['tenhinh']?>" value="<?=$imgrow['hinhanh']?>">
            
        </fieldset>
    <?php }else{ ?>
        <fieldset class="form-field">
            <label>Hình ảnh <?=$i?> </label>
            <input type="file" class="form-control" id="" placeholder="" name="hinhanh<?=$i?>" value="">
        </fieldset>
    <?php }?>
    <?php }?>
    
   
   
    <fieldset class="form-field">
        <label>Mã khuyến mãi</label>
        <select id="" name="MaKM" class="form-control">
        <?php foreach ($data_km as $row) { ?>
          <option value="<?= $row['MaKM'] ?>"><?= $row['TenKM'] ?></option>
        <?php } ?>
      </select>
      
    </fieldset>

    <button  class ="btn-booking"> Cập nhật </button>
    
   
</form>
<script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
</script>

