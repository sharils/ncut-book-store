<?php
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';

$id = Router::resource(1);
$studentorder = StudentOrder::from($id);
$student_order_details = StudentOrderDetail::find($studentorder);
$total = 0;
foreach( $student_order_details as $orderdetail )
{
    $price = $orderdetail->book()->price();
    $number = $orderdetail->number();
    $total += ($price * $number);
}
