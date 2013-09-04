<?php
require_once 'models/book/Book.php';
require_once 'models/database/Database.php';
require_once 'models/shopbook/ShopBook.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$shopbook = ShopBook::from(Book::from($_POST['id']));
$shopbook->shelf(!$shopbook->shelf());
$shopbook->update();

$url = Router::toUrl('views/shopbook/list.php');
Router::redirect($url);