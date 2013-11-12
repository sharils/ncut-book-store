<?php
require_once 'models/user/User.php';
require_once 'controllers/clerk/send_message.php';
require_once 'models/shopbook/ShopBook.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';


if (isset($_POST['update'])) {
    $user = User::from($_POST['clerk_id']);
    $clerk = $user->toRole();
    $order = studentorder::from($_POST['update']);
    $order->status($_POST['status']);

    if($_POST['status'] === 'arrived'){
        $sendMsg = Sendmessage::getStudentOrder($clerk, $order);
        $sendMsg->email();
        $sendMsg->message();
    }
    if($_POST['status'] === 'finished'){
        $details = studentOrderDetail::find($order);
        foreach ($details as $detail) {
            $shopbook = shopbook::from($detail->book());
            $num = $shopbook->number();
            $num = $num - $detail->number();
            $shopbook->number($num);
            $shopbook->update();
        }
    }

    $order->clerk($clerk);
    $order->update();
    $url = Router::toUrl("home/order/{$order->status()}");
}

if (isset($_POST['return'])) {
    $user = User::from($_POST['clerk_id']);
    $clerk = $user->toRole();
    $order = studentorder::from($_POST['return']);

    $sendMsg = Sendmessage::getStudentOrder($clerk, $order);
    $sendMsg->email();
    $sendMsg->message();

    $url = Router::toUrl("home/order/return/{$order->id()}");
}

Router::redirect($url);
