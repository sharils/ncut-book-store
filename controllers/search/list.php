<?php
require_once 'models/book/Book.php';
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';

$page = Router::resource('0');
$active = [
    'book' => '',
    'class' => '',
    'course' => ''
];
$active[$page] = 'active';
$coursebooks = [];
$selected = TRUE;

function removeEmpty($search_factor) {
    return trim($search_factor) !== '';
}
$search_factor = array_filter($_GET, "removeEmpty");

//判斷是不是有按下SEARCH
if (!empty($search_factor)){
    switch ($page){
        case 'book':
            $find = 'findBook';
            $selected = Book::find($search_factor);
            break;
        case 'class':
        case 'course':
            $find = 'findCourse';
            $selected = Course::find($search_factor);
            break;
    }

    if ($selected !== FALSE) {
        foreach ($selected as $v) {
            $rows = Coursebook::$find($v);
            foreach ($rows as $row ) {
                $coursebooks[] = $row;
            }
        }
    } else {
        $msg = '查無相關課程和書籍！';
    }
} else {
    $coursebooks = Coursebook::findAll();
}


