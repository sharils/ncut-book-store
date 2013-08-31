<?php
require_once 'models/database/Database.php';
Database::initialise('localhost', 'root', '123456', 'test');
$users = Database::execute('SELECT * FROM `user` ');
print_r($users);
