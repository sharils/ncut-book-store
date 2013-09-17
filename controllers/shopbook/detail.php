<?php
require_once 'models/book/Book.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/publisher/Publisher.php';

$id = Router::resource(1);

$args = array();
$book = Book::from($id);
$coursebooks = CourseBook::findBook($book);
$publishers = Publisher::find();

foreach ($publishers as $value) {
    $args[$value->id()] = $value->name();
}
