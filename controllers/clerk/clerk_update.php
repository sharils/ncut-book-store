<?php
require_once 'models/user/User.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
if (isset($_POST['update'])) {
    $user = User::from($_POST['clerk_id']);
    $clerk = $user->toRole();
    $order = studentorder::from($_POST['update']);
    $orderdetail = studentorderdetail::from($_POST['update']);
    $order->status($_POST['status']);
    $order->clerk($clerk);
    $order->update();
    $url = Router::toUrl("home/order/{$order->status()}");
    Router::redirect($url);
}
