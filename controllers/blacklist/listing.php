<?php
require_once '../../models/Database.php';
require_once '../../models/Message.php';
require_once '../../models/User.php';
require_once '../../models/Blacklist.php';
session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');

// $rows = Blacklist::find(User::from($_SESSION['user_id']));
$blacklist = Blacklist::from(User::from('1377323782'));
$blackusers = $blacklist->blackUsers();
$usersn = array();
$username = array();

foreach ($blackusers as $blackuser) {
	$user = User::find($blackuser->id());
	$role = $user->toRole();
	$usersn[$role->id()] = $role->sn();
	$username[$role->id()] = $role->name();
}