    <div class="add-product-form">
    <a class ="btn-booking" href="?mod=sanpham&act=add"> Thêm dịch vụ</a>
    <?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-warning alert-warning_productlist">
      <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
    <?php } ?>
    <hr>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead >
            <th  scope="col">Mã sản phẩm</th>
            <th  scope="col">Tên sản phẩm</th>
            <th  scope="col">Giá thành</th>
           
            <th  scope="col">Khoảng thời gian (phút)</th>
            <th  scope="col">Trạng thái</th>
            <th  scope="col">Thao tác</th>
        </thead>
       <?php foreach($data_product as $value){ ?>
                <tr>
                <th><?= $value['MaSP']?></th>
                <td><?= $value['TenSP'] ?></td>
                <td><?= $value['DonGia'] ?></td>
               
                <td><?= $value['KhoangThoiGian'] ?></td>
                <td><?= $value['TrangThai'] ?></td>
                <th>
                
                <a href="?mod=product&act=edit&idsp=<?= $value['MaSP']?>" class="btn-action btn-booking">Sửa</a>
                
                <a href="?mod=product&act=delete&idsp=<?= $value['MaSP']?>"  onclick="return confirm('Bạn có thật sự muốn xóa ?');"  class="btn-action btn-booking">Xóa</a>
                </th>
            </tr>
        <?php   }?> 
        
    </table>
    </div>
    <script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
