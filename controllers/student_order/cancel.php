<?php
require_once 'models/studentorder/StudentOrder.php';

$studentorder = StudentOrder::from($_POST['cancel_id']);
$studentorder->status('cancel');
$studentorder->update();

$url = Router::toUrl('home/order');
Router::redirect($url);
