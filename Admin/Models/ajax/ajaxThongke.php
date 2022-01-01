<?php
require_once("../Carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;
if (0==0) {
    $subdays = $_POST['subdays'];
    $now = $_POST['now'];
    include("../statisticalModel.php");
    $controller_obj = new statisticalModel();
    $array = array();
    $array = $controller_obj->getSales($subdays,$now);
    echo $data = json_encode($array);
}
?>