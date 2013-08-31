<?php
require_once '../../models/database/Database.php';
require_once '../../models/message/Message.php';
require_once '../../models/user/User.php';
require_once '../../controllers/blacklist/listing.php';
Database::initialise('localhost', 'root', '123456', 'ncut');

if ($_GET['page'] === 'send') {
	$messageslist = Message::find(User::from($_SESSION['user_id']), 'sender_user_id');
} else {
	$messages = Message::find(User::from($_SESSION['user_id']));
	$badlist = array();
	$list = array();
	$userdata = array();

	//區分一般和垃圾筒
	foreach ($messages as $message) {
		if(in_array($message->sender()->toRole()->id(), $black_araay)) {
			$badlist[] = $message;
		} else {
			$list[] = $message;
		}
	}

	if ($_GET['page'] === 'receive') {
		$messageslist = $list;
	} else {
		$messageslist = $badlist;
	}
}