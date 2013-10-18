<?php
require_once 'models/shopbook/ShopBook.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
$id = Router::resource(2);
$order = studentorder::from($id);
$clerks = Clerk::find();
$orderdetails = StudentOrderDetail::find($order);
$save_valu = $order->status();
$total = 0;
foreach( $orderdetails as $orderdetail )
{
    $price = $orderdetail->book()->price();
    $number = $orderdetail->number();
    $total += ($price * $number);
}

$shopbook = [];
foreach ($orderdetails as $k => $orderdetail) {
    $shopbook[$k] = ShopBook::from($orderdetail->book());
}

$clerkArgs = Contro_Method::selectList('Clerk');
