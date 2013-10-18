<?php
require_once 'models/studentorderdetail/StudentOrderDetail.php';

$remarks =$_POST['remark'];
foreach($remarks as $key => $remark) {
    if(!empty($remark)){
        $detail = StudentOrderDetail::from($key);
        $detail->remark($remark);
        $detail->update();
        echo $detail->remark();
        exit;
    }
}

$url = Router::toUrl('home/order');
Router::redirect($url);
