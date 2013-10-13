<?php
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';

$id = $_POST['remove_course'];
$course = Course::from($id);

$coursebook = CourseBook::findCourse($course);
if ($coursebook == NULL){
    $course->delete();
    $url = Router::toUrl("home/course/list");
} else {
    $redirect_url = Notice::addTo('刪除失敗：此課程已開立書單！','home/course/list');
    $url = Router::toUrl($redirect_url);
}
Router::redirect($url);

