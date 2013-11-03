<?php
require_once 'models/student/Student.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/user/User.php';
$stu_orders = StudentOrder::find(Student::from(User::from($_SESSION['user_id'])));

$student_orders = array();
foreach ($stu_orders as $stu_order) {
    if ($stu_order->status() !== 'shopping') {
        $student_orders[] = $stu_order;
    }
}
$student_orders = Page::getLimit($student_orders);
