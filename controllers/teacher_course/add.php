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
    $historybooks = [];
    $teacher_id = $_SESSION['user_id'];
    $courses = Course::find(['teacher_user_id' => $teacher_id]);
    foreach ($courses as $course) {
        $course_books = CourseBook::findCourse($course);

        foreach($course_books as $course_book){

            $historybooks[] = $course_book;
        }
    }
    $course = Course::from($id);
}

if (isset($_POST['course'])) {
    $course = Course::from($_POST['course']);
    $sample ='';

    //按下新增扭
    if (isset($_POST['add_book'])){
        unset($_POST['add_book']);
        $_POST['remark'] = ' ';
        if (in_array('', $_POST)) {
            $url = Notice::addTo('新增失敗：不允許空值存入！',"home/course_book/new/{$_POST['course']}");
            $redirect_url = Router::toUrl($url);
            Router::redirect($redirect_url);
            exit;
        }

        if (Book::findIsbn($_POST['isbn']) !== FALSE) {
            $book = Book::findIsbn($_POST['isbn']);
            Coursebook::create($course, $book, $sample);
            $url = Router::toUrl("home/course/{$_POST['course']}");
            Router::redirect($url);
            exit;
        }

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

    } elseif(isset($_POST['history'])) {

        $book = Book::from($_POST['history']);

    }

    Coursebook::create($course, $book, $sample);

    if (Book::findIsbn($book->isbn()) === FALSE) {
        Shopbook::create($book, 0, '');
    }

    $url = Router::toUrl("home/course/{$_POST['course']}");
    Router::redirect($url);
}
