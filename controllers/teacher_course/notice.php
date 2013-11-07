<?php
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';

$teacher = Teacher::from(User::from($_SESSION['user_id']));
$courses = Course::find(['teacher_user_id' => $teacher->id()]);
$flag = 0;
if($courses !== FALSE){

    foreach ($courses as $course) {
    $coursebooks = Coursebook::findCourse($course);
    if (empty($coursebooks)) {
        $flag++;
        }
    }

}
