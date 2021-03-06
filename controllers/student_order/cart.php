<?php
require_once 'models/student/Student.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
require_once 'models/user/User.php';

$student_order = StudentOrder::findCart(Student::from(User::from($_SESSION['user_id'])));

if ($student_order !== NULL) {
    $student_order_details = StudentOrderDetail::find($student_order);
}
