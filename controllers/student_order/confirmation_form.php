<?php
require_once 'models/studentorder/StudentOrder.php';

$order = StudentOrder::from($_POST['id']);
$order->date($_POST['date']);
$order->status('submitted');
$order->update();

$url = Router::toUrl('home/order');
Router::redirect($url);
