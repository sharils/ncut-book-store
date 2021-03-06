<?php
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
require_once 'models/book/Book.php';

if (isset($_POST['remove_book'])) {
    $course = Course::from($_POST['course']);
    $book = Book::from($_POST['remove_book']);
    $coursebook = CourseBook::from($course,$book);
    $coursebook->delete();
    $url = Router::toUrl("home/course/{$_POST['course']}");
    Router::redirect($url);
}
