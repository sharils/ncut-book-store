<?php
require_once 'models/book/Book.php';
require_once 'models/shopbook/ShopBook.php';
$shopbook = ShopBook::from(Book::from($_POST['id']));
$shopbook->shelf(!$shopbook->shelf());
$shopbook->update();

$url = Router::toUrl('home/shop_book');
Router::redirect($url);
