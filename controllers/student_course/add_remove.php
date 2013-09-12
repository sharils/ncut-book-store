<?php
require_once 'models/course/Course.php';
require_once 'models/student/Student.php';
require_once 'models/studentcourse/StudentCourse.php';
require_once 'models/user/User.php';
$student_courses = StudentCourse::from(Student::from(User::from($_SESSION['user_id'])));

if(!empty($_POST['add_course'])) {
    $student_courses[0]->add(Course::findCourse($_POST['add_course']));
}
if(!empty($_POST['remove_course'])) {
    $student_courses[0]->remove(Course::findCourse($_POST['remove_course']));
}
