<?php
require_once 'models/database/Database.php';
require_once 'models/studentorder/StudentOrder.php';
Database::initialise('localhost', 'root', '123456', 'ncut');

$studentorder = StudentOrder::from($_POST['cancel_id']);
$studentorder->status('cancel');
$studentorder->update();

$url = Router::toUrl('views/student_order/listing.php');
Router::redirect($url);