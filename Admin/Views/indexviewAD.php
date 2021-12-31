<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fruity Fresh</title>

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="../Public/css/grid.css">
  <link rel="stylesheet" href="../Public/css/reset.css">
  <link rel="stylesheet" href="../Public/css/style.css">
  <link rel="stylesheet" href="Public/main.css">
  <link rel="stylesheet" href="../Public/css/contact.css">
  <link rel="stylesheet" href="../Public/font/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
  <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="Public/js/jquery.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

</head>

<body>
  <section class="grid wide">
    <div class="row">
      <div class="col l-2">
        <?php require_once("navleft.php"); ?>
      </div>
      <div class="col l-10 body-content">
        <div class="head-content">
          
        </div>
        <div class="table-responsive">
          <?php
          if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
            $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
            $act = isset($_GET['act']) ? $_GET['act'] : "admin";
            switch ($mod) {
              case 'login':
                require_once('statistical.php');
                break;
              case 'bill':
                switch ($act) {
                  case 'bill':
                    require_once('bill/bill.php');
                    break;
                  case 'addBill':
                    require_once('bill/addbill.php');
                    break;
                  case 'detail':
                    require_once('bill/billDetail.php');
                    break;
                  case 'confirm':
                    require_once('bill/bill.php');
                    break;
                  case 'addDetail':
                      require_once('bill/addDetailBill.php');
                      break;
                  default:
                    require_once('bill/bill.php');
                    break;
                }
                break;
              case 'category':
                switch ($act) {
                  case 'list':
                    require_once('category/list.php');
                    break;
                  case 'add':
                    require_once('category/add.php');
                    break;
                  case 'detail':
                    require_once('category/detail.php');
                    break;
                  case 'edit':
                    require_once('category/edit.php');
                    break;
                  default:
                    require_once('category/list.php');
                    break;
                }
                break;


              case 'khuyenmai':
                switch ($act) {
                  case 'list':
                    require_once('Views/khuyenmai/list.php');
                    break;
                  case 'add':
                    require_once('Views/khuyenmai/add.php');
                    break;
                  case 'detail':
                    require_once('Views/khuyenmai/detail.php');
                    break;
                  case 'edit':
                    require_once('Views/khuyenmai/edit.php');
                    break;
                  default:
                    require_once('Views/khuyenmai/list.php');
                    break;
                }
                break;
              case 'banner':
                switch ($act) {
                  case 'list':
                    require_once('Views/banner/list.php');
                    break;
                  case 'add':
                    require_once('Views/banner/add.php');
                    break;
                  case 'detail':
                    require_once('Views/banner/detail.php');
                    break;
                  case 'edit':
                    require_once('Views/banner/edit.php');
                    break;
                  default:
                    require_once('Views/banner/list.php');
                    break;
                }
                break;

                case 'product':
                  switch ($act) {
                    case 'list':
                      require_once('product/sanpham/list.php');
                      break;
                    case 'add':
                      require_once('product/addproduct.php');
                      break;
                    case 'edit':
                      require_once('product/updateProduct.php');
                      break;
                    default:
                      require_once('product/productad.php');
                      break;
                    }
                    break;

            }

          } else {
            if (isset($_SESSION['isStaff']) && $_SESSION['isStaff'] == true) {
              $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
              $act = isset($_GET['act']) ? $_GET['act'] : "admin";
              
              
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>
</body>

</html>