<?php
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';

$id = Router::resource(2);
$order = studentorder::from($id);
$clerk = ($order->clerk() == NULL) ? '' : $order->clerk()->id();
$orderdetails = StudentOrderDetail::find($order);
$save_valu = $order->status();
$total = 0;
foreach( $orderdetails as $orderdetail )
{
    $price = $orderdetail->book()->price();
    $number = $orderdetail->number();
    $total += ($price * $number);
}
