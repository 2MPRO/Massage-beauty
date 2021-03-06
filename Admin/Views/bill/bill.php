<a href="?mod=bill&act=addBill" class="btn-booking btn-add-new">Thêm mới</a>
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
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Ngày</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">SĐT</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dataBill as $row) {?>
                <tr> 
                    <td><?=$row['NguoiDung'] ?></td>
                    <td><?=$row['NgayHen'] ?></td>
                    <td><?= number_format($row['TongTien']) ?> VNĐ</td>
                    <td><?=$row['SDT'] ?></td>
                    <td><?php if(($row['TrangThai']==1)){
                        echo "Đã Duyệt";
                        
                    }else 
                        echo "Chưa duyệt";
                    ?> </td>
                    <th>
                        <?php 
                            if($row['TrangThai']==0){ ?>
                                <a href="?mod=bill&act=editBill&idBill=<?= $row['MaHD'] ?>" class = "btn-action btn-booking">Chỉnh sửa</a>
                            <?php } else {?>
                                 <a href="?mod=bill&act=detail&idBill=<?= $row['MaHD'] ?>" class = "btn-action btn-booking">Xem chi tiết</a>
                            <?php }?>
                    </th>
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
