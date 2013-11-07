<?php
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
$id = $_SESSION['user_id'];
$teacher = Teacher::from(User::from($id));
$courses = Course::find(['teacher_user_id' => $teacher->id()]);
if($courses === FALSE){
    $courses = [];
}
