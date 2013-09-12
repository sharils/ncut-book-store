<?php
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
require_once 'models/book/Book.php';
$id = Router::resource(1);
$course = Course::from($id);
$coursebooks = CourseBook::find($course);

