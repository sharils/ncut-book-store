<?php
require_once 'models/book/Book.php';
require_once 'models/publisher/Publisher.php';
require_once 'models/shopbook/Shopbook.php';

$book = Book::from($_POST['id']);
$shopbook = Shopbook::from($book);
$publisher = Publisher::from($_POST['publisher']);

if(isset($_POST['delete'])){
    $shopbook->delete();
    $book->delete();
    $url = Router::toUrl('home/shop_book');
} else {
    if (isset($_POST['shelf'])) {
        $shopbook->shelf(!$shopbook->shelf());
    } else {
        $book->publisher($publisher);
        $book->marketPrice($_POST['market_price']);
        $book->price($_POST['price']);
        $book->remark($_POST['remark']);
        $shopbook->number($_POST['number']);
    }
    $book->update();
    $shopbook->update();
    $url = Router::toUrl("home/book/{$_POST['id']}");
}
Router::redirect($url);
