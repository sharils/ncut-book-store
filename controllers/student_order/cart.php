<?php
require_once 'models/database/Database.php';
require_once 'models/student/Student.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
require_once 'models/user/User.php';
session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');

// $studentorder = StudentOrder::from(Student::from(User::from($_SESSION['user_id'])));
$student_order = StudentOrder::findcart(Student::from(User::from('1377323833')));

if ($student_order !== NULL) {
	$student_order_details = StudentOrderDetail::find($student_order);
}