<?php
require_once 'models/database/Database.php';
require_once 'models/studentorder/StudentOrder.php';
Database::initialise('localhost', 'root', '123456', 'ncut');

$studentorder = StudentOrder::from($_GET['id']);
$studentorder->status('shopping');
$studentorder->update();
