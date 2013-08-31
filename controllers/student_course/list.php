<?php
require_once '../../models/database/Database.php';
require_once '../../models/student/Student.php';
require_once '../../models/studentcourse/StudentCourse.php';
require_once '../../models/user/User.php';
session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');
$student_courses = StudentCourse::from(Student::from(User::from($_SESSION['user_id'])));
