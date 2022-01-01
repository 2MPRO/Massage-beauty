    <div class="add-product-form">
    <a class ="btn-addproduct btn-booking" href="?mod=product&act=add"> Thêm mới</a>
    <?php if (isset($_COOKIE['msg'])) { ?>
    <div style="margin: 20px;" class="alert alert-warning alert-warning_productlist">
      <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
    <?php } ?>
    <hr>
    <table class="table table-bordered" id="dataTable" width="100%"cellspacing="0">
        <thead >
            <th  scope="col" width="8%">Mã sản phẩm</th>
            <th  scope="col" width="14%">Tên sản phẩm</th>
            <th  scope="col" width="8%">Giá thành</th>
            <th  scope="col" width="11%">Khoảng thời gian (phút)</th>
            <th  scope="col" width="8%">Trạng thái</th>
            <th  scope="col" width="10%">Thao tác</th>
        </thead>
       <?php foreach($data_product as $value){ ?>
                <tr>
                <th><?= $value['MaSP']?></th>
                <td><?= $value['TenSP'] ?></td>
                <td><?= $value['DonGia'] ?></td>
               
                <td><?= $value['KhoangThoiGian'] ?></td>
                <td><?= $value['TrangThai'] ?></td>
                <td>
                    <div class="">                 
                        <a href="?mod=product&act=edit&idsp=<?= $value['MaSP']?>" class="btn-action btn-booking">Chỉnh Sửa</a>
                        <a href="?mod=product&act=delete&idsp=<?= $value['MaSP']?>"  onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn-action btn-booking">Xóa</a>
                    </div>
                </td>
            </tr>
        <?php   }?> 
        
    </table>
    </div>
    <script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
