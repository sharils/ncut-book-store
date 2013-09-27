<?php
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
if (isset($_POST['update'])) {
    $order = studentorder::from($_POST['update']);
    $orderdetail = studentorderdetail::from($_POST['update']);
    $order->status($_POST['status']);
    $order->update();
    $url = Router::toUrl("home/order/{$order->status()}/{$order->id()}");
    Router::redirect($url);
}
