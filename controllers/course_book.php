<?php
require_once 'models/Database.php';
require_once 'models/Course.php';
require_once 'models/Teacher.php';
require_once 'models/User.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$args = $_POST;

if (in_array('', $args)){
echo 'Have null value';
} else {
$teacher = Teacher::from(User::from($args['teacher_id']));
Course::create($teacher, $args['sn'], $args['type'], $args['name'], $args['year']);
}
