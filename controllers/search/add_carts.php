<?php
require_once 'models/book/Book.php';
require_once 'models/user/User.php';
require_once 'models/studentorder/StudentOrder.php';
require_once 'models/studentorderdetail/StudentOrderdetail.php';


$books = $_POST['book_id'];
$user = User::from($_SESSION['user_id']);
$student = $user->toRole();
$student_order = StudentOrder::findCart($student);

foreach($books as $book) {
    $Obj_book = Book::from($book);
    if ($student_order !== NULL) {
        StudentOrderDetail::create($student_order, $Obj_book);
    } else {
        $student_order = StudentOrder::create($student);
        StudentOrderDetail::create($student_order, $Obj_book);
        $student_order = NULL;
    }
}
$url = Router::toUrl("home");
Router::redirect($url);
