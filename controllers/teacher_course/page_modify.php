<?php
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/shopbook/Shopbook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
require_once 'models/book/Book.php';
$c_id = Router::resource(2);
$b_id = Router::resource(1);

$cb = [
    'id' => NULL,
    'name' => NULL,
    'version' => NULL,
    'isbn' => NULL,
    'author' => NULL,
    'publisher_id' => NULL,
    'remark' => NULL,
    'sample' => ''
];

$arr = []; //避免重複的arr
$historybooks = [];
$teacher_id = $_SESSION['user_id'];
$courses = Course::find(['teacher_user_id' => $teacher_id]);

foreach ($courses as $course) {
    $course_books = CourseBook::findCourse($course);
    foreach($course_books as $course_book){
        if(!in_array($course_book->book()->id(), $arr)){
            $arr[] = $course_book->book()->id();
            $historybooks[] = $course_book;
        }
    }
}

$course = Course::from($c_id);


if ($b_id !== 'new') {
    $book = Book::from($b_id);
    $CBobj = CourseBook::from($course, $book);
    foreach($cb as $k => $v){

        if ($k === 'sample') {
            $sample = $CBobj->$k();
            $value = ($sample) ? 'checked' : '';
        } else if ($k === 'publisher_id'){
            $value = $CBobj->book()->publisher()->id();
        } else {
            $value = $CBobj->book()->$k();
        }

        $cb[$k] = $value;
    }
}
