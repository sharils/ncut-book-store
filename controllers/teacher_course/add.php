<?php
require_once 'models/database/Database.php';
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
require_once 'models/book/Book.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
if (in_array('', $_GET)){
	echo 'Have null value';
} 
if (isset($_GET['course-id'])) {
	$course = Course::from($_GET['course-id']);
}
if (isset($_POST['add_book'])) {
	$publisher = Publisher::from($_POST['publisher']);
	$book = Book::create($publisher, $_POST['auther'], $_POST['isbn'], '', $_POST['name'], '', $_POST['remark'],
				 '', $_POST['version']);
	$url = Router::toUrl("home/course/{$_POST['course']}");
	Router::redirect($url);
}
