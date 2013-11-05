<?php
require_once 'models/course/Course.php';
$url = Router::resource();
$id = Router::resource(1);


$course = [
    'id' => null,
    'sn' => null,
    'teacher' => null,
    'type' => null,
    'department' => null,
    'grade' => null,
    'group' => null,
    'name' => null,
    'system' => null,
    'semester' => null,
    'year' => null
];

if ($url !== 'course') {
    $c = Course::from($id);
    foreach ($course as $k => $v) {
        $course[$k] = $c->$k();
    }
    $course['teacher'] = $c->teacher()->id();
}

