<?php
require_once 'models/teacher/Teacher.php';

$args = array();
$teachers = Teacher::find();

foreach ($teachers as $value) {
    $args[$value->id()] = $value->sn().'：'.$value->name();
}
