<?php
require_once 'models/coursebook/Coursebook.php';
require_once 'models/student/Student.php';
require_once 'models/user/User.php';

$student = Student::from(User::from($_SESSION['user_id']));
$courses = $student->getCourses();
$course_books = [];
foreach ($courses as $v) {
    $rows = Coursebook::findCourse($v);
    foreach ($rows as $row ) {
        $course_books[] = $row;
    }
}
