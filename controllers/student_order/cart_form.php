<?php
require_once 'models/database/Database.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
Database::initialise('localhost', 'root', '123456', 'ncut');

if (empty($_POST['delete'])) {
	foreach ($_POST['number'] as $key => $value) {
		$detail = StudentOrderDetail::from($key);
		$detail->number($value);
		$detail->update();
	}
	$id = $detail->student_order()->id();
	$url = Router::toUrl("home/order/ok/$id");
	Router::redirect($url);
} else {
	$detail = StudentOrderDetail::from($_POST['delete'][0]);
	$detail->delete();
	$url = Router::toUrl('home/order/cart');
	Router::redirect($url);
}
