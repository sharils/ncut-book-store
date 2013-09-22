<?php
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
if (isset($_POST['update'])) {
    $order = studentorder::from($_POST['update']);
    $orderdetail = studentorderdetail::from($_POST['update']);
    switch ($order->status()) {
        case 'submitted':
            $status = $order->status('ordered');
            break;
        case 'ordered':
            $status = $order->status('arrived');
            break;
        default:
            break;
    }
    $order->update();
    $url = Router::toUrl("home/order/{$order->status()}");
    Router::redirect($url);
}
