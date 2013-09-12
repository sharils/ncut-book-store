<?php
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';

$id = Router::resource(1);
$student_order_details = StudentOrderDetail::find(StudentOrder::from($id));
