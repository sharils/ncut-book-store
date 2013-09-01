<?php
require_once 'models/database/Database.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
Database::initialise('localhost', 'root', '123456', 'ncut');

$order = StudentOrder::from($_GET['id']);
$order_details = StudentOrderDetail::find($order);

$total = 0;
foreach ($order_details as $detail) {
	$price = $detail->book()->price();
	$number = $detail->number();
	$total += ($price * $number);
}