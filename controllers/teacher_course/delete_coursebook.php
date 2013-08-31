<?php
require_once 'models/database/Database.php';
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
require_once 'models/book/Book.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$get = $_GET;
if (in_array('', $get)){
	echo 'Have null value';
} else {
	$course = Course::from($get['course-id']);
	$book = Book::from($get['book-id']);
	$coursebook = CourseBook::from($course,$book);
	$coursebook->delete();
}
