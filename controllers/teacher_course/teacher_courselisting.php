<?php
require_once '../models/database/Database.php';
require_once '../models/course/Course.php';
require_once '../models/coursebook/CourseBook.php';
require_once '../models/teacher/Teacher.php';
require_once '../models/user/User.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$post = $_POST;
$post["ID"] = "123";
if (in_array('', $post)){
	echo 'Have null value';
} else {
	$teacher = Teacher::from(User::from($post["ID"]));
	$courses = Course::find($teacher);
}