<div class="service grid wide">
        <div class="row">
                <div class="col l-2">

                </div>
                <div class="col l-10">
                        <div class="row">
                             <?php    if(isset($dataService)) {
                                        foreach($dataService as $row){
                             ?>
                                <div class="col l-3 service-item ">
                                        <div class="img-wrap"><img src="Public/imgs/img_service/<?=$row['hinhanh'] ?>" alt="<?=$row['hinhanh'] ?>" class="service-item__img"></div>
                                        <h3 class="service-item__title"><?=$row['TenSP'] ?></h3>
                                        <h3 class="service-item__title">Thời gian :  <?=$row['KhoangThoiGian'] ?> Phút </h3>
                                        <p class="service-item__descr"><?=$row['moTa'] ?></p>
                                       
                                        <a href="#" class="service-item--booking  btn-booking">ĐẶT LỊCH NGAY</a>
                                </div>
                                <?php } }?>
                        </div>
                </div>

        </div>



</div>