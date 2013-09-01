<?php
require_once 'models/database/Database.php';
require_once 'models/studentorder/StudentOrder.php';
Database::initialise('localhost', 'root', '123456', 'ncut');

$order = StudentOrder::from($_POST['id']);
$order->date($_POST['date']);
$order->status('submitted');
$order->update();

Router::rediect('../../views/student_order/listing.php');