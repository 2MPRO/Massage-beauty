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
   
</head>
<body>
  <section class="grid">
      <div class="row">
        <div class="col l-2">
            <?php require_once("navleft.php"); ?>
        </div>
        <div class="col l-10">
          <div class="table-responsive">
            <?php
                if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) {
                  $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
                  $act = isset($_GET['act']) ? $_GET['act'] : "admin"; 
                  switch ($mod) {
                    case 'login':
                      require_once('statistical.php');
    
                      break;
                    case 'sanpham':
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
                      case 'nguoidung':
                        switch ($act) {
                          case 'list':         
                            require_once('user/list.php');
                            break;
                          case 'add':
                            require_once('user/add.php');
                            break;
                          case 'detail':
                            require_once('user/detail.php');
                            break;
                          case 'edit':
                            require_once('user/edit.php');
                            break;
                          default:
                            require_once('user/list.php');
                            break;
                        }
                        break;
                        case 'loaisanpham':
                        switch ($act) {
                          case 'list':
                            require_once('typeproduct/list.php');
                            break;
                          case 'add':
                            require_once('typeproduct/add.php');
                            break;
                          case 'detail':
                            require_once('typeproduct/detail.php');
                            break;
                          case 'edit':
                            require_once('typeproduct/edit.php');
                            break;
                          default:
                            require_once('typeproduct/list.php');
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
                          case 'bill':
                            switch ($act) {
                              case 'list':
                                require_once('bill/list.php');
                                break;
                              case 'chitiet':
                                require_once('bill/detail.php');
                                break;
                              default:
                                require_once('bill/list.php');
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
                        }
   
              }
              else {
                  if (isset($_SESSION['isLogin_Nhanvien']) && $_SESSION['isLogin_Nhanvien'] == true) {
                    $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
                    $act = isset($_GET['act']) ? $_GET['act'] : "admin";
                    switch ($mod) {
                      
                      case 'loaisanpham':
                        switch ($act) {
                          case 'list':
                            require_once('typeproduct/list.php');
                            break;
                          case 'add':
                            require_once('typeproduct/add.php');
                            break;
                          case 'detail':
                            require_once('typeproduct/detail.php');
                            break;
                          case 'edit':
                            require_once('typeproduct/edit.php');
                            break;
                          default:
                            require_once('typeproduct/list.php');
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
                          case 'sanpham':
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
                            case 'bill':
                              switch ($act) {
                                case 'list':
                                  require_once('bill/list.php');
                                  break;
                                case 'chitiet':
                                  require_once('bill/detail.php');
                                  break;
                                default:
                                  require_once('bill/list.php');
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
                     }
                     
                  }
              
              }
            ?>
          </div>
        </div>
      </div>
  </section>
</body>
</html>