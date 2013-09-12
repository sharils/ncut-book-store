<?php
require_once 'models/student/Student.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/user/User.php';
$student_order = StudentOrder::create(Student::from(User::from($_SESSION['user_id'])));
