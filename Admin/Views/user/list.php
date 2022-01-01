<?php if (1==1) { ?>
<a href="?mod=nguoidung&act=add" type="button" class="btn btn-booking">Thêm mới</a>
<?php } ?>
<?php if (isset($_COOKIE['msg'])) { ?>
  <div class="alert alert-success">
    <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
  </div>
<?php } ?>
<hr>
<table class="table table-bordered acountTable" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th class="th-firt" scope="col">MaND</th>
      <th scope="col">Tài khoản</th>
      <th scope="col">Họ</th>
      <th scope="col">Tên</th>
      <th scope="col">SDT</th>
      <th scope="col">Email</th>
      <th class="th-firt" scope="col">Giới tính</th>
      <th scope="col">Quyền hạn</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($data as $row) { ?>
      <tr>
        <th class="th-firt" scope="row"><?= $row['MaND'] ?></th>
        <td><?= $row['TaiKhoan'] ?></td>
        <td><?= $row['Ho'] ?></td>
        <td><?= $row['Ten'] ?></td>
        <td><?= $row['SDT'] ?></td>
        <td><?= $row['Email'] ?></td>
        <td class="th-firt"><?= $row['GioiTinh'] ?></td>
        <td>
          <?php
          if ($row['MaQuyen'] == 2) {
            echo 'Quản trị viên';
          } else {
            if ($row['MaQuyen'] == 1) {
              echo 'Khách hàng';
            } else {
                if ($row['MaQuyen'] == 3) {
                  echo 'Nhân viên';
                }
                else {
                    if ($row['MaQuyen'] == 4) {
                      echo 'Giao hàng';
                  }
                }
            }
          }
          ?>
        </td>
        <td>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=nguoidung&act=edit&id=<?= $row['MaND'] ?>" type="button" class="btn-action btn-booking">Chỉnh Sửa</a>
          <a href="?mod=nguoidung&act=delete&id=<?= $row['MaND'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn-action btn-booking">Xóa</a>
          <?php }?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>