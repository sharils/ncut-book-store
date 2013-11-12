<?php
require_once 'models/course/Course.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/shopbook/Shopbook.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
require_once 'models/book/Book.php';

if (isset($_POST['course'])) {
    $course = Course::from($_POST['course']);
    $sample = (isset($_POST['sample'])) ? '1' : '';
    $url = Router::toUrl("home/course/{$_POST['course']}");
    //按下新增扭
    if(isset($_POST['history'])) {

        $book = Book::from($_POST['history']);
        Coursebook::create($course, $book, $sample);

    } else if (isset($_POST['delete'])) {

        $b_id = $_POST['delete'];
        $c_id = $_POST[$b_id];
        $book = Book::from($b_id);
        $course = Course::from($c_id);
        $del_cb = Coursebook::from($course, $book);
        $del_cb->delete();
        $url = Router::toUrl("home/course/{$c_id}");

    }else {

        $_POST['book'] = (empty($_POST['book'])) ? '　' : $_POST['book'];
        $_POST['remark'] = (empty($_POST['remark'])) ? '　' : $_POST['remark'];
        $status = ($_POST['book'] === '') ? '新增' : '修改';
        $publisher = Publisher::from($_POST['publisher']);

        if (in_array('', $_POST)) {
            $url = Notice::addTo("{$status}失敗：不允許空值存入！","home/course_book/new/{$_POST['course']}");
            $redirect_url = Router::toUrl($url);
            Router::redirect($redirect_url);
            exit;
        }else if ($_POST['book'] === '　'){

            $isbn = $_POST['isbn'];
            if(Book::findIsbn($isbn) === FALSE){
                $book = Book::create(
                    $publisher,
                    $_POST['author'],
                    $isbn,
                    '',
                    $_POST['name'],
                    '',
                    $_POST['remark'],
                    '',
                    $_POST['version']
                );
            } else {
                $book = Book::findIsbn($isbn);
                Shopbook::create($book, 0, '');
            }

            Coursebook::create($course, $book, $sample);
        } else {

            $book = Book::from($_POST['book']);
            $book->name($_POST['name']);
            $book->version($_POST['version']);
            $book->isbn($_POST['isbn']);
            $book->author($_POST['author']);
            $book->publisher($publisher);
            $book->remark($_POST['remark']);
            $book->update();

            $CB = Coursebook::from($course, $book);
            $CB->sample($sample);
            $CB->update();
            $url = Router::toUrl("home/course_book/{$_POST['book']}/{$_POST['course']}");
        }
    }
    Router::redirect($url);
}
