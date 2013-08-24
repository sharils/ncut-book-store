<?php
require_once '../../models/Database.php';
require_once '../../models/Message.php';
require_once '../../models/User.php';
session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');
// $Sender = User::from($_SESSION['user_id']);
$Sender = User::from('3273891391');
$Receiver = User::find($_POST['receiver']);
Message::create($Sender, $Receiver, $_POST['content']);