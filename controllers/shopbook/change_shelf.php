<?php
require_once '../../models/book/Book.php';
require_once '../../models/database/Database.php';
require_once '../../models/shopbook/ShopBook.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$shopbook = ShopBook::from(Book::from($_GET['id']));
$shopbook->shelf(!$shopbook->shelf());
$shopbook->update();
