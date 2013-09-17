<?php
require_once 'models/book/Book.php';
require_once 'models/publisher/Publisher.php';
$book = Book::from($_POST['id']);
$publisher = Publisher::from($_POST['publisher']);
$book->publisher($publisher);
$book->marketPrice($_POST['market_price']);
$book->price($_POST['price']);
$book->remark($_POST['remark']);
$book->update();

$url = Router::toUrl("home/book/{$_POST['id']}");
Router::redirect($url);
