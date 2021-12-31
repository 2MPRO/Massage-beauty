<a href="?mod=book&act=addBook" class="btn-booking btn-add-new">Đặt lịch</a>

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
                <th scope="col">Ngày Hẹn</th>
                <th scope="col">Giờ Hẹn</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">SĐT</th>
                <th scope="col">Trạng thái</th>
                
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dataBook as $row) {?>
                <tr> 
                    <td><?=$row['NguoiDung'] ?></td>
                    <td><?=$row['NgayHen'] ?></td>
                    <td><?=$row['Gio']  ?></td>
                    <td><?= number_format($row['TongTien']) ?> VNĐ</td>
                    <td><?=$row['SDT'] ?></td>
                    <td><?php if(($row['TrangThai']==3)){
                        echo "Khách chưa đến";
                        
                    }else 
                        echo "Chưa duyệt";
                    ?> </td>
                    <th>
                        <a href="?mod=book&act=editBook&idBill=<?= $row['MaHD'] ?>" class = "btn-action btn-booking">Chỉnh sửa</a>
                        <input class="MaBooking" type="hidden" value="<?= $row['MaHD'] ?>">
                        <a  class = "btn-action btn-booking delete-booking">Xóa </a>
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
