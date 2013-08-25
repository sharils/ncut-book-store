<?php
require_once '../../models/blacklist/Blacklist.php';
require_once '../../models/database/Database.php';
require_once '../../models/user/User.php';
session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');

$blacklist = Blacklist::from(User::from($_SESSION['user_id']));
$black_users = $blacklist->blackUsers();
$black_araay = array();

foreach ($black_users as $black_user) {
	$black_araay[] = $black_user->id();
}