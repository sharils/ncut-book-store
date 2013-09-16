<?php
require_once 'models/book/Book.php';
require_once 'models/user/User.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderdetail.php';


$book = Book::from($_POST['book_id']);
$user = User::from($_SESSION['user_id']);
$student = $user->toRole();
$student_order = StudentOrder::findCart($student);


if ($student_order !== NULL) {
    StudentOrderDetail::create($student_order, $book);
} else {
    $student_order = StudentOrder::create($student);
    StudentOrderDetail::create($student_order, $book);
}

$url = Router::toUrl("home/{$_POST['page']}/search");
Router::redirect($url);
