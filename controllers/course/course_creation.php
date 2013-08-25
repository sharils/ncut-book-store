<?php
require_once '../../models/course/Course.php';
require_once '../../models/database/Database.php';
require_once '../../models/teacher/Teacher.php';
require_once '../../models/user/User.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$args = $_POST;

if (in_array('', $args)) {
	echo 'Have null value';
} else {
	$teacher = Teacher::from(User::from($args['teacher_id']));
	Course::create($teacher, $args['sn'], $args['type'], $args['name'], $args['year']);
}