<?php
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';

$id = $_POST['id'];
$remarks = $_POST['remark'];
foreach($remarks as $key => $remark) {
    if(!empty($remark)){
        $detail = StudentOrderDetail::from($key);
        $detail->remark($remark);
        $detail->update();
    }
}

$student_order = StudentOrder::from($id);
$student_order->status('return');
$student_order->update();
$url = Router::toUrl('home/order');
Router::redirect($url);
