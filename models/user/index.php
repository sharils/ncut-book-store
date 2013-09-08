<?php

require_once 'models/database/Database.php';
require_once 'models/database/User.php';

Database::initialise('localhost', 'root', '123456', 'ncut');

try {
    $user = User::authenticate('t001', 'teacher', '00200');
} catch (Exception $e) {
    echo $e->getMessage();
}

var_dump($user);
