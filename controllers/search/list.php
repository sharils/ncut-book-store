<?php
require_once 'models/book/Book.php';
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/shopbook/Shopbook.php';
require_once 'models/user/User.php';

$user = User::from($_SESSION['user_id']);
$role = $user->role();
$page = Router::resource('0');
$active = [
    'book' => '',
    'class' => '',
    'course' => ''
];
$active[$page] = 'active';
$button = ($role === 'clerk') ? ['book', '修改書籍', NULL] : ['cart', '放入購物車', '1'];
$course_books = [];
$coursebooks = [];
$selected = TRUE;
function removeEmpty($search_factor) {
    return trim($search_factor) !== '';
}
$search_factor = array_filter($_GET, "removeEmpty");

//判斷是不是有按下SEARCH
if (!empty($search_factor)){
    unset($search_factor['p']);
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
            $rows = Coursebook::$find($v, $button[2]);
            foreach ($rows as $row ) {
                $course_books[] = $row;
            }
        }
        $selected = TRUE;
    } else {
        $msg = '查無相關課程和書籍！';
    }
} else {
    $course_books = Coursebook::findAll();
}

//腳色為學生則只取得上架的書
if ($selected === TRUE && $role === 'student') {
    foreach ($course_books as $coursebook) {
        $shopbook = Shopbook::from($coursebook->book());
        if ($shopbook->shelf()){
            $coursebooks[] = $coursebook;
        }
    }
} else {
    $coursebooks = $course_books;
}
$coursebooks = Page::getLimit($coursebooks);
