<?php
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/shopbook/Shopbook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
require_once 'models/book/Book.php';
$id = Router::resource(2);

//Load顯示時
if (isset($id)) {
    $course = Course::from($id);
}

//按下新增扭
if (isset($_POST['add_book'])) {

    unset($_POST['add_book']);
    $_POST['remark'] = ' ';
    if (in_array('', $_POST)) {
        $url = Notice::addTo('新增失敗：不允許空值存入！',"home/course_book/new/{$_POST['course']}");
        $redirect_url = Router::toUrl($url);
        Router::redirect($redirect_url);
        exit;
    }

    if (Book::findIsbn($_POST['isbn']) !== FALSE) {
        $url = Notice::addTo('新增失敗：ISBN碼重複！',"home/course_book/new/{$_POST['course']}");
        $redirect_url = Router::toUrl($url);
        Router::redirect($redirect_url);
        exit;
    }

    $course = Course::from($_POST['course']);
    $publisher = Publisher::from($_POST['publisher']);


    $book = Book::create(
        $publisher,
        $_POST['auther'],
        $_POST['isbn'],
        '',
        $_POST['name'],
        '',
        $_POST['remark'],
        '',
        $_POST['version']
    );

    $sample = ($_POST['sample']) ? '1' : '';
    Coursebook::create($course, $book, $sample);
    Shopbook::create($book, 0, '');
    $url = Router::toUrl("home/course/{$_POST['course']}");
    Router::redirect($url);
}
