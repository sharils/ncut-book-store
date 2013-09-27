<?php
require_once 'models/book/Book.php';
require_once 'models/student/Student.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
require_once 'models/user/User.php';

$id = Router::resource(2);
$order = studentorder::from($id);
$clerk = clerk::from($order->clerk());
$orderdetails = StudentOrderDetail::find($order);
$save_valu = $order->status();
$total = 0;
foreach( $orderdetails as $orderdetail )
{
    $price = $orderdetail->book()->price();
    $number = $orderdetail->number();
    $total += ($price * $number);
}
