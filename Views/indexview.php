<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/css/reset.css">
    <link rel="stylesheet" href="Public/css/style.css">
    <link rel="stylesheet" href="Public/css/main.css">
    <link rel="stylesheet" href="Public/css/contact.css">
    <link rel="stylesheet" href="Public/css/grid.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="Public/js/jquery.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="Public/font/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Beauty Massage</title>
</head>
<body>
    <div id="wrapper grid wide">
        <?php require_once("header-footer/header.php") ?>

        <section>
            <?php require_once("content.php")?>
        </section>
        
        <?php  
        require_once("header-footer/footer.php")
        ?>
    </div>
</body>
</html>