<?php
require_once 'models/book/Book.php';
require_once 'models/student/Student.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
require_once 'models/user/User.php';

$status = Router::resource('1');
$orders = StudentOrder::getStatus($status);
$active[$status] = 'active';
$order_details = array();
foreach( $orders as $order )
{
    $order_details[] = StudentOrderDetail::from($order->id());
}

