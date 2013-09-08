<?php
require_once 'models/database/Database.php';
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
require_once 'models/book/Book.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$id = Router::resource(2);
if (in_array('', $_GET)){
	echo 'Have null value';
}
if (isset($id)) {
	$course = Course::from($id);
}
if (isset($_POST['add_book'])) {
	$publisher = Publisher::from($_POST['publisher']);
    $book = Book::create(
        $publisher,
        $_POST['auther'],
        $_POST['isbn'],
        '',
        $_POST['name'],
        '',
        $_POST['remark'],
		'',
        $_POST['version']);
    $course = Course::from($_POST['course']);
    if ($_POST['sample']){
       $sample = '1';
    } else {
        $sample = '';
    }
    Coursebook::create($course,$book,$sample);
	$url = Router::toUrl("home/course/{$_POST['course']}");
	Router::redirect($url);
}
