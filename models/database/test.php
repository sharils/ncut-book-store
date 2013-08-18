<?php
require_once 'Database.php';
Database::initialise('localhost', 'root', '123456', 'test');
$users = Database::execute('SELECT * FROM `user` ');
print_r($users);
