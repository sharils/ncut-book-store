<?php
require_once 'models/course/Course.php';

$courses = Course::find();
$courses = Page::getLimit($courses);
