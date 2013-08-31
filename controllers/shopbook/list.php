<?php
require_once 'models/database/Database.php';
require_once 'models/shopbook/ShopBook.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$shopbooks = ShopBook::find();
