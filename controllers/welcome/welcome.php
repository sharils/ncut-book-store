<?php
require_once 'models/database/Database.php';
require_once 'models/user/User.php';
session_start();

Database::initialise('localhost', 'root', '123456', 'ncut');
$user = User::from($_SESSION['user_id']);
Welcome::newSelf($user->role());
