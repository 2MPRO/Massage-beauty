
<?php if($dataBillDetail == null){?>
    <a href="?mod=bill&act=addDetail" class="btn-booking btn-add-new">Thêm mới</a>
<?php }
    else if($dataBillDetail[0]['TrangThai']==0 ){
?>
              <a href="?mod=bill&act=addDetail" class="btn-booking btn-add-new">Thêm mới</a>
                <a href="?mod=bill&act=confirm&id=<?= $dataBillDetail[0]['MaHD'] ?>" class="btn-booking btn-add-new">Duyệt hóa đơn</a>
<?php }?>
<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong class= "msg-box">Thông báo : <?= $_COOKIE['msg'] ?></strong> 
    </div>
<?php } ?>
<hr>
<div class="body-content">
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
            <?php foreach($dataBillDetail as $row) {?>
                <tr> 
                    <td><?=$row['Ten'] ?></td>
                    <td><?=$row['DonGia'] ?></td>
                    <td><a href=""><i class="fas fa-minus"></i></a> <?=$row['soLan'] ?> <a href=""> <i class="fas fa-plus"></i></a></td>
                    <td><?= number_format($row['tongTien']) ?> VNĐ</td>
                    <th><a href="" class = "btn-action btn-booking">Xóa</a></th>
                </tr>
                <?php }?>
        </tbody>
    </table>
    <script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
</div>
