<?php
require_once '../../models/Database.php';
require_once '../../models/Message.php';
require_once '../../models/User.php';
require_once '../../models/Blacklist.php';
session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');

//$rows = Message::find(User::from($_SESSION['user_id']));
$messages = Message::find(User::from('1377323782'));
// 取得轉換id成sn的陣列

$badlist = array();
$list = array();
$userdata = array();
foreach ($messages as $message) {
	$user = User::find($message->sender()->id());
	$role = $user->toRole();
	$userdata[$role->id()] = $role->sn();
}