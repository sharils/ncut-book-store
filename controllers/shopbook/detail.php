<?php
require_once 'models/book/Book.php';
require_once 'models/coursebook/CourseBook.php';
require_once 'models/publisher/Publisher.php';
require_once 'models/shopbook/Shopbook.php';

$id = Router::resource(1);

$args = array();
$book = Book::from($id);
$coursebooks = CourseBook::findBook($book);
$shopbook = Shopbook::from($book);
$publishers = Publisher::find();

foreach ($publishers as $value) {
    $args[$value->id()] = $value->name();
}
