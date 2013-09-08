<?php
require_once 'models/database/Database.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';

Database::initialise('localhost', 'root', '123456', 'ncut');
$id = Router::resource(1);
$student_order_details = StudentOrderDetail::find(StudentOrder::from($id));
