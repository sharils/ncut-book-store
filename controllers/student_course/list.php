<?php
require_once 'models/student/Student.php';
require_once 'models/studentcourse/StudentCourse.php';
require_once 'models/user/User.php';

$student_courses = StudentCourse::from(Student::from(User::from($_SESSION['user_id'])));
