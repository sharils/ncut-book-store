<?php
require_once '../models/Database.php';
require_once '../models/Teacher.php';

Database::initialise('localhost', 'root', '123456', 'ncut');
$args = array();
$teachers = Teacher::find();

foreach ($teachers as $value) {
	$args[$value->id()] = $value->sn().'：'.$value->name();
}